<?php
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../session.php';
check_page_access(['SUPER_ADMIN', 'CS', 'ACCOUNTS']);

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=TDS_Form_121_Submissions_' . date('Y-m-d_His') . '.csv');

$output = fopen('php://output', 'w');

// Output CSV Header line
fputcsv($output, ['ID', 'Submission Date', 'Investor Name', 'ISIN', 'Email', 'Mobile', 'Document File', 'Status', 'IP Address']);

$query = "SELECT id, created_at, investor_name, isin, email, mobile, form_file, status, ip_address FROM tds_declaration_121 ORDER BY id DESC";
$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, [
            $row['id'],
            $row['created_at'],
            $row['investor_name'],
            $row['isin'],
            $row['email'],
            $row['mobile'],
            $row['form_file'],
            $row['status'],
            $row['ip_address']
        ]);
    }
}

fclose($output);
$conn->close();
exit;
