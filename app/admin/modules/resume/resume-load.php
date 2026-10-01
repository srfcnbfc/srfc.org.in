<?php
include_once '../../../config/config.php';
include_once '../../session.php';
// DB table to use
$table = 'job_resume';

// Table's primary key
$primaryKey = 'resume_id';

$columns = array(
    array('db' => 'resume_id', 'dt' => 0),
    array('db' => 'submit_time', 'dt' => 1,
        'formatter' => function ($d, $row) {
            return date_format(date_create($d),"d/m/Y | H:i:s");;
        }),
    array('db' => 'candidate_name', 'dt' => 2,
        'formatter' => function ($d, $row) {
            return strtoupper($d);
        }),
    array('db' => 'candidate_mobile', 'dt' => 3),
    array('db' => 'candidate_email', 'dt' => 4),
    array('db' => 'candidate_address', 'dt' => 5),
    array('db' => 'vacancy_id', 'dt' => 6),
    array('db' => 'candidate_resume', 'dt' => 7,
        'formatter' => function ($d, $row) {
            $show_button = '<a href="../../upload/resume/' . $d . '" target="_blank" class="btn btn-success" type="button"  title="Resume" download ><i class="fa fa-download"></i></a> ';
            return $show_button;
        }),
    
    array('db' => 'resume_id', 'dt' => 8,
        'formatter' => function ($d, $row) {
            $show_button = '<button class="btn btn-danger btn-xs delete_data" type="button" title="Delete Now"  id="' . $d . '" ><i class="fa fa-trash"></i></button> ';
            return $show_button;
        },
    )
);

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( '../../ssp.class.php' );
echo json_encode(
        SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
?>
