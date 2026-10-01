<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../session.php';
global $conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['code'])) {
    $banner_id = intval($_POST['code']);

    // Fetch image filename to remove from disk
    $stmt = $conn->prepare("SELECT banner_img FROM banner WHERE banner_id = ? LIMIT 1");
    if ($stmt) {
        $stmt->bind_param("i", $banner_id);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($row = $res->fetch_assoc()) {
            $img_path = __DIR__ . '/../../../../upload/slider/' . $row['banner_img'];
            if (!empty($row['banner_img']) && file_exists($img_path)) {
                @unlink($img_path);
            }
        }
        $stmt->close();
    }

    $del_stmt = $conn->prepare("DELETE FROM banner WHERE banner_id = ?");
    if ($del_stmt) {
        $del_stmt->bind_param("i", $banner_id);
        if ($del_stmt->execute()) {
            $response = [['status' => 'success', 'msg' => 'Banner successfully deleted!']];
        } else {
            $response = [['status' => 'warning', 'msg' => 'Failed to delete banner.']];
        }
        $del_stmt->close();
    } else {
        $response = [['status' => 'warning', 'msg' => 'Database error: ' . $conn->error]];
    }
} else {
    $response = [['status' => 'warning', 'msg' => 'Invalid banner ID specified.']];
}

$conn->close();
echo json_encode($response);