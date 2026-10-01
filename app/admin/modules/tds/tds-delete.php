<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['code'])) {
    $id = intval($_POST['code']);

    // Retrieve file name first to remove from disk
    $stmt = $conn->prepare("SELECT form_file FROM tds_declaration_121 WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($row = $res->fetch_assoc()) {
            $file_to_delete = __DIR__ . '/../../../../upload/tds/' . $row['form_file'];
            if (!empty($row['form_file']) && file_exists($file_to_delete)) {
                @unlink($file_to_delete);
            }
        }
        $stmt->close();
    }

    // Delete record from database
    $del_stmt = $conn->prepare("DELETE FROM tds_declaration_121 WHERE id = ?");
    if ($del_stmt) {
        $del_stmt->bind_param("i", $id);
        if ($del_stmt->execute()) {
            echo json_encode(['status' => 'success', 'msg' => 'Record successfully deleted.']);
        } else {
            echo json_encode(['status' => 'warning', 'msg' => 'Failed to delete record.']);
        }
        $del_stmt->close();
    } else {
        echo json_encode(['status' => 'warning', 'msg' => 'Database error: ' . $conn->error]);
    }
} else {
    echo json_encode(['status' => 'warning', 'msg' => 'Invalid parameters.']);
}

$conn->close();
