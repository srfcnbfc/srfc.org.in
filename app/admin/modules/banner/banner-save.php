<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../session.php';
global $conn;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([['status' => 'warning', 'msg' => 'Invalid request method.']]);
    exit;
}

$banner_id       = intval($_POST['banner_id'] ?? 0);
$banner_top_msg  = trim($_POST['banner_top_msg'] ?? '');
$banner_headline = trim($_POST['banner_headline'] ?? '');
$banner_btm_msg  = trim($_POST['banner_btm_msg'] ?? '');
$banner_button   = trim($_POST['banner_button'] ?? '');
$banner_button_link = trim($_POST['banner_button_link'] ?? '');

if (empty($banner_headline)) {
    echo json_encode([['status' => 'warning', 'msg' => 'Please provide the Banner Headline.']]);
    exit;
}

$upload_dir = __DIR__ . '/../../../../upload/slider/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

$new_image_name = null;

// Handle file upload if provided
if (isset($_FILES['banner_img']) && $_FILES['banner_img']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['banner_img'];
    $allowed_exts = ['png', 'jpg', 'jpeg', 'webp'];
    $file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($file_ext, $allowed_exts, true)) {
        echo json_encode([['status' => 'warning', 'msg' => 'Invalid image format. Allowed: JPG, PNG, WEBP.']]);
        exit;
    }

    $new_image_name = 'banner-' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $file_ext;
    $destination = $upload_dir . $new_image_name;

    // Use compressedImage if available or move_uploaded_file
    if (function_exists('compressedImage') && in_array($file_ext, ['jpg', 'jpeg', 'png'])) {
        compressedImage($file['tmp_name'], $destination, 70);
    } else {
        if (!move_uploaded_file($file['tmp_name'], $destination)) {
            echo json_encode([['status' => 'warning', 'msg' => 'Failed to save uploaded image.']]);
            exit;
        }
    }
}

if ($banner_id > 0) {
    // UPDATE MODE
    // Check if banner exists
    $check_stmt = $conn->prepare("SELECT banner_img FROM banner WHERE banner_id = ? LIMIT 1");
    $check_stmt->bind_param("i", $banner_id);
    $check_stmt->execute();
    $res = $check_stmt->get_result();
    $existing = $res->fetch_assoc();
    $check_stmt->close();

    if (!$existing) {
        echo json_encode([['status' => 'warning', 'msg' => 'Banner record not found.']]);
        exit;
    }

    if ($new_image_name !== null) {
        // Update with new image and unlink old image
        if (!empty($existing['banner_img'])) {
            $old_path = $upload_dir . $existing['banner_img'];
            if (file_exists($old_path)) {
                @unlink($old_path);
            }
        }

        $stmt = $conn->prepare("UPDATE banner SET banner_img = ?, banner_top_msg = ?, banner_headline = ?, banner_btm_msg = ?, banner_button = ?, banner_button_link = ? WHERE banner_id = ?");
        $stmt->bind_param("ssssssi", $new_image_name, $banner_top_msg, $banner_headline, $banner_btm_msg, $banner_button, $banner_button_link, $banner_id);
    } else {
        // Update without changing image
        $stmt = $conn->prepare("UPDATE banner SET banner_top_msg = ?, banner_headline = ?, banner_btm_msg = ?, banner_button = ?, banner_button_link = ? WHERE banner_id = ?");
        $stmt->bind_param("sssssi", $banner_top_msg, $banner_headline, $banner_btm_msg, $banner_button, $banner_button_link, $banner_id);
    }

    if ($stmt->execute()) {
        $response = [['status' => 'success', 'msg' => 'Banner successfully updated!']];
    } else {
        $response = [['status' => 'warning', 'msg' => 'Failed to update banner: ' . $conn->error]];
    }
    $stmt->close();

} else {
    // INSERT MODE
    if ($new_image_name === null) {
        echo json_encode([['status' => 'warning', 'msg' => 'Please select a banner image (1920x936px recommended).']]);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO banner (banner_img, banner_top_msg, banner_headline, banner_btm_msg, banner_button, banner_button_link) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $new_image_name, $banner_top_msg, $banner_headline, $banner_btm_msg, $banner_button, $banner_button_link);

    if ($stmt->execute()) {
        $response = [['status' => 'success', 'msg' => 'Banner successfully created!']];
    } else {
        $response = [['status' => 'warning', 'msg' => 'Failed to add banner: ' . $conn->error]];
    }
    $stmt->close();
}

$conn->close();
echo json_encode($response);
