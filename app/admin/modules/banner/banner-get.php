<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../session.php';
global $conn;

$banner_id = intval($_GET['id'] ?? ($_POST['id'] ?? 0));

if ($banner_id <= 0) {
    echo json_encode(['status' => 'warning', 'msg' => 'Invalid banner ID specified.']);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM banner WHERE banner_id = ? LIMIT 1");
if ($stmt) {
    $stmt->bind_param("i", $banner_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($banner = $result->fetch_assoc()) {
        echo json_encode([
            'status' => 'success',
            'data' => [
                'banner_id'          => $banner['banner_id'],
                'banner_top_msg'     => $banner['banner_top_msg'],
                'banner_headline'    => $banner['banner_headline'],
                'banner_btm_msg'     => $banner['banner_btm_msg'],
                'banner_button'      => $banner['banner_button'],
                'banner_button_link' => $banner['banner_button_link'],
                'banner_img'         => $banner['banner_img'],
                'img_url'            => '../../upload/slider/' . $banner['banner_img']
            ]
        ]);
    } else {
        echo json_encode(['status' => 'warning', 'msg' => 'Banner not found.']);
    }
    $stmt->close();
} else {
    echo json_encode(['status' => 'warning', 'msg' => 'Database error: ' . $conn->error]);
}

$conn->close();
