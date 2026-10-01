<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id']) && !empty($_POST['status'])) {
    $id = intval($_POST['id']);
    $status = trim($_POST['status']);

    $allowed = ['PENDING', 'VERIFIED', 'PROCESSED', 'REJECTED'];
    if (!in_array($status, $allowed, true)) {
        echo json_encode(['status' => 'warning', 'msg' => 'Invalid status specified.']);
        exit;
    }

    $stmt = $conn->prepare("UPDATE tds_declaration_121 SET status = ? WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("si", $status, $id);
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'msg' => 'Status updated successfully.']);
        } else {
            echo json_encode(['status' => 'warning', 'msg' => 'Failed to update status.']);
        }
        $stmt->close();
    } else {
        echo json_encode(['status' => 'warning', 'msg' => 'Database error: ' . $conn->error]);
    }
} else {
    echo json_encode(['status' => 'warning', 'msg' => 'Missing required parameters.']);
}

$conn->close();
