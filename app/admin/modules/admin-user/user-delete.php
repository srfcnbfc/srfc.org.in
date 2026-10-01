<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../session.php';
global $conn;

// Only Super Admin can delete admin users
if (!has_access(['SUPER_ADMIN'])) {
    echo json_encode(['status' => 'warning', 'msg' => 'Unauthorized action.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['code'])) {
    $admin_id = intval($_POST['code']);

    // Prevent deleting oneself
    if (isset($_SESSION['admin_id']) && $_SESSION['admin_id'] == $admin_id) {
        echo json_encode(['status' => 'warning', 'msg' => 'You cannot delete your own account while logged in.']);
        exit;
    }

    // Ensure at least one SUPER_ADMIN remains
    $count_res = $conn->query("SELECT COUNT(*) as total FROM siteadmin WHERE admin_role = 'SUPER_ADMIN'");
    $count_row = $count_res->fetch_assoc();
    
    $check_user = $conn->query("SELECT admin_role FROM siteadmin WHERE admin_id = $admin_id");
    $target_user = $check_user->fetch_assoc();

    if ($target_user && $target_user['admin_role'] === 'SUPER_ADMIN' && $count_row['total'] <= 1) {
        echo json_encode(['status' => 'warning', 'msg' => 'Cannot delete the only remaining Super Admin.']);
        exit;
    }

    $stmt = $conn->prepare("DELETE FROM siteadmin WHERE admin_id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $admin_id);
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'msg' => 'Admin user successfully deleted.']);
        } else {
            echo json_encode(['status' => 'warning', 'msg' => 'Failed to delete user.']);
        }
        $stmt->close();
    } else {
        echo json_encode(['status' => 'warning', 'msg' => 'Database error: ' . $conn->error]);
    }
} else {
    echo json_encode(['status' => 'warning', 'msg' => 'Invalid parameters.']);
}

$conn->close();
