<?php
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([['status' => 'warning', 'msg' => 'Invalid request method.']]);
    exit;
}

$investor_name = isset($_POST['investor_name']) ? trim(htmlspecialchars($_POST['investor_name'], ENT_QUOTES, 'UTF-8')) : '';
$isin          = isset($_POST['isin']) ? strtoupper(trim($_POST['isin'])) : '';
$email         = isset($_POST['email']) ? trim($_POST['email']) : '';
$mobile        = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';

// Basic required field validation
if (empty($investor_name) || empty($isin) || empty($email) || empty($mobile)) {
    echo json_encode([['status' => 'warning', 'msg' => 'Please fill in all mandatory fields.']]);
    exit;
}

// ISIN validation (standard 12-character alphanumeric code)
if (!preg_match('/^[A-Z0-9]{12}$/', $isin)) {
    echo json_encode([['status' => 'warning', 'msg' => 'Please provide a valid 12-character ISIN.']]);
    exit;
}

// Email validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([['status' => 'warning', 'msg' => 'Please provide a valid email address.']]);
    exit;
}

// Mobile validation (10-digit Indian mobile)
if (!preg_match('/^[6-9][0-9]{9}$/', $mobile)) {
    echo json_encode([['status' => 'warning', 'msg' => 'Please provide a valid 10-digit mobile number.']]);
    exit;
}

// File upload validation
if (!isset($_FILES['form_file']) || $_FILES['form_file']['error'] !== UPLOAD_ERR_OK) {
    echo json_encode([['status' => 'warning', 'msg' => 'Please upload your Form 121 document.']]);
    exit;
}

$file = $_FILES['form_file'];
$max_size = 5 * 1024 * 1024; // 5 MB

if ($file['size'] > $max_size) {
    echo json_encode([['status' => 'warning', 'msg' => 'File size exceeds maximum allowed limit (5MB).']]);
    exit;
}

$allowed_exts = ['pdf', 'jpg', 'jpeg', 'png'];
$file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

if (!in_array($file_ext, $allowed_exts, true)) {
    echo json_encode([['status' => 'warning', 'msg' => 'Invalid file format. Only PDF, JPG, JPEG, and PNG files are accepted.']]);
    exit;
}

// Verify MIME type
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime_type = finfo_file($finfo, $file['tmp_name']);
finfo_close($finfo);

$allowed_mimes = [
    'application/pdf',
    'image/jpeg',
    'image/pjpeg',
    'image/png'
];

if (!in_array($mime_type, $allowed_mimes, true)) {
    echo json_encode([['status' => 'warning', 'msg' => 'Uploaded file is not a valid PDF or image document.']]);
    exit;
}

require_once '../../app/config/config.php';

$upload_dir = '../../upload/tds/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

$safe_filename = 'form121_' . date('Ymd_His') . '_' . bin2hex(random_bytes(6)) . '.' . $file_ext;
$target_path = $upload_dir . $safe_filename;

if (!move_uploaded_file($file['tmp_name'], $target_path)) {
    echo json_encode([['status' => 'warning', 'msg' => 'Failed to save uploaded file. Please try again.']]);
    exit;
}

$ip_address = $_SERVER['REMOTE_ADDR'] ?? '';

$stmt = $conn->prepare("INSERT INTO tds_declaration_121 (investor_name, isin, email, mobile, form_file, ip_address) VALUES (?, ?, ?, ?, ?, ?)");
if ($stmt) {
    $stmt->bind_param("ssssss", $investor_name, $isin, $email, $mobile, $safe_filename, $ip_address);
    if ($stmt->execute()) {
        $response = [['status' => 'success', 'msg' => 'Your TDS Declaration Form 121 has been successfully submitted!']];
    } else {
        $response = [['status' => 'warning', 'msg' => 'Failed to record your submission. Please try again.']];
    }
    $stmt->close();
} else {
    $response = [['status' => 'warning', 'msg' => 'Database error: ' . $conn->error]];
}

$conn->close();
echo json_encode($response);
