<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../session.php';
global $conn;

// Only Super Admin can update admin users
if (!has_access(['SUPER_ADMIN'])) {
    echo json_encode(['status' => 'warning', 'msg' => 'Unauthorized action.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_id       = intval($_POST['admin_id'] ?? 0);
    $admin_name     = trim($_POST['admin_name'] ?? '');
    $admin_email    = trim($_POST['admin_email'] ?? '');
    $admin_password = trim($_POST['admin_password'] ?? '');
    $admin_role     = trim($_POST['admin_role'] ?? 'SUPER_ADMIN');
    $admin_status   = trim($_POST['admin_status'] ?? 'ACTIVE');

    if ($admin_id <= 0 || empty($admin_name) || empty($admin_email)) {
        echo json_encode(['status' => 'warning', 'msg' => 'Please provide valid Name and Email.']);
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

    // Check duplicate email for another user
    $check_stmt = $conn->prepare("SELECT admin_id FROM siteadmin WHERE admin_email = ? AND admin_id != ? LIMIT 1");
    if ($check_stmt) {
        $check_stmt->bind_param("si", $admin_email, $admin_id);
        $check_stmt->execute();
        $check_stmt->store_result();
        if ($check_stmt->num_rows > 0) {
            echo json_encode(['status' => 'warning', 'msg' => 'Another admin user already uses this email.']);
            $check_stmt->close();
            exit;
        }
        $check_stmt->close();
    }

    if (!empty($admin_password)) {
        // Password update included
        $hashed = password_hash($admin_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE siteadmin SET admin_name = ?, admin_email = ?, admin_role = ?, admin_status = ?, admin_password = ? WHERE admin_id = ?");
        $stmt->bind_param("sssssi", $admin_name, $admin_email, $admin_role, $admin_status, $hashed, $admin_id);
    } else {
        // Password untouched
        $stmt = $conn->prepare("UPDATE siteadmin SET admin_name = ?, admin_email = ?, admin_role = ?, admin_status = ? WHERE admin_id = ?");
        $stmt->bind_param("ssssi", $admin_name, $admin_email, $admin_role, $admin_status, $admin_id);
    }

    if ($stmt) {
        if ($stmt->execute()) {
            // If current user updated their own info, update session
            if (isset($_SESSION['admin_id']) && $_SESSION['admin_id'] == $admin_id) {
                $_SESSION['admin_name'] = $admin_name;
                $_SESSION['adminemail'] = $admin_email;
                $_SESSION['admin_role'] = $admin_role;
            }
            echo json_encode(['status' => 'success', 'msg' => 'Admin user successfully updated!']);
        } else {
            echo json_encode(['status' => 'warning', 'msg' => 'Failed to update user: ' . $conn->error]);
        }
        $stmt->close();
    } else {
        echo json_encode(['status' => 'warning', 'msg' => 'Database error: ' . $conn->error]);
    }
} else {
    echo json_encode(['status' => 'warning', 'msg' => 'Invalid request method.']);
}

$conn->close();
