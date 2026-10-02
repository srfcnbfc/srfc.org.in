<?php
require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../session.php';
check_page_access(['SUPER_ADMIN', 'CS', 'ACCOUNTS']);

// DB table to use
$table = 'tds_declaration_121';

// Table's primary key
$primaryKey = 'id';

$columns = array(
    array('db' => 'id', 'dt' => 0),
    array(
        'db' => 'created_at',
        'dt' => 1,
        'formatter' => function ($d, $row) {
            return !empty($d) ? date_format(date_create($d), "d/m/Y | H:i") : '-';
        }
    ),
    array(
        'db' => 'investor_name',
        'dt' => 2,
        'formatter' => function ($d, $row) {
            return '<strong>' . htmlspecialchars(strtoupper($d), ENT_QUOTES, 'UTF-8') . '</strong>';
        }
    ),
    array(
        'db' => 'isin',
        'dt' => 3,
        'formatter' => function ($d, $row) {
            return '<span class="badge badge-light-primary text-primary" style="font-family: monospace; font-size: 13px;">' . htmlspecialchars($d, ENT_QUOTES, 'UTF-8') . '</span>';
        }
    ),
    array('db' => 'mobile', 'dt' => 4),
    array('db' => 'email', 'dt' => 5),
    array(
        'db' => 'form_file',
        'dt' => 6,
        'formatter' => function ($d, $row) {
            if (empty($d)) {
                return '<span class="text-muted">No File</span>';
            }
            $file_url = '../../upload/tds/' . htmlspecialchars($d, ENT_QUOTES, 'UTF-8');
            return '<a href="' . $file_url . '" target="_blank" class="btn btn-primary btn-xs" download title="Download Form 121"><i class="fa fa-download"></i> View / Download</a>';
        }
    ),
    array(
        'db' => 'status',
        'dt' => 7,
        'formatter' => function ($d, $row) {
            $select = '<select class="form-select form-select-sm change-status" data-id="' . $row['id'] . '" style="min-width: 120px;">
                <option value="PENDING"' . ($d === 'PENDING' ? ' selected' : '') . '>Pending</option>
                <option value="VERIFIED"' . ($d === 'VERIFIED' ? ' selected' : '') . '>Verified</option>
                <option value="PROCESSED"' . ($d === 'PROCESSED' ? ' selected' : '') . '>Processed</option>
                <option value="REJECTED"' . ($d === 'REJECTED' ? ' selected' : '') . '>Rejected</option>
            </select>';
            return $select;
        }
    ),
    array(
        'db' => 'id',
        'dt' => 8,
        'formatter' => function ($d, $row) {
            return '<button class="btn btn-danger btn-xs delete_data" type="button" title="Delete Record" id="' . $d . '"><i class="fa fa-trash"></i></button>';
        }
    )
);

require(__DIR__ . '/../../ssp.class.php');
echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
