<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../session.php';
global $conn;

// Only Super Admin can create admin users
if (!has_access(['SUPER_ADMIN'])) {
    echo json_encode(['status' => 'warning', 'msg' => 'Unauthorized action.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_name     = trim($_POST['admin_name'] ?? '');
    $admin_email    = trim($_POST['admin_email'] ?? '');
    $admin_password = trim($_POST['admin_password'] ?? '');
    $admin_role     = trim($_POST['admin_role'] ?? 'SUPER_ADMIN');
    $admin_status   = trim($_POST['admin_status'] ?? 'ACTIVE');

    if (empty($admin_name) || empty($admin_email) || empty($admin_password)) {
        echo json_encode(['status' => 'warning', 'msg' => 'Please fill in Name, Email, and Password.']);
        exit;
    }

    if (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'warning', 'msg' => 'Please provide a valid email address.']);
        exit;
    }

    $valid_roles = ['SUPER_ADMIN', 'HR', 'CS', 'ACCOUNTS'];
    if (!in_array($admin_role, $valid_roles, true)) {
        echo json_encode(['status' => 'warning', 'msg' => 'Invalid role selected.']);
        exit;
    }

    // Check duplicate email
    $check_stmt = $conn->prepare("SELECT admin_id FROM siteadmin WHERE admin_email = ? LIMIT 1");
    if ($check_stmt) {
        $check_stmt->bind_param("s", $admin_email);
        $check_stmt->execute();
        $check_stmt->store_result();
        if ($check_stmt->num_rows > 0) {
            echo json_encode(['status' => 'warning', 'msg' => 'An admin user with this email already exists.']);
            $check_stmt->close();
            exit;
        }
        $check_stmt->close();
    }

    // Hash password securely
    $hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $admin_code = 'ADM_' . strtoupper(bin2hex(random_bytes(4)));

    $stmt = $conn->prepare("INSERT INTO siteadmin (admin_name, admin_role, admin_email, admin_password, admin_status, admin_code, admin_sec_que) VALUES (?, ?, ?, ?, ?, ?, 1)");
    if ($stmt) {
        $stmt->bind_param("ssssss", $admin_name, $admin_role, $admin_email, $hashed_password, $admin_status, $admin_code);
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'msg' => 'New admin user successfully created!']);
        } else {
            echo json_encode(['status' => 'warning', 'msg' => 'Failed to create admin user: ' . $conn->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['status' => 'warning', 'msg' => 'Database error: ' . $conn->error]);
    }
} else {
    echo json_encode(['status' => 'warning', 'msg' => 'Invalid request method.']);
}

$conn->close();
