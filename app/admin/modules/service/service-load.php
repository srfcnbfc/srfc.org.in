<?php
include_once '../../../config/config.php';
include_once '../../session.php';
// DB table to use
$table = 'service';
// Table's primary key
$primaryKey = 'service_id';

$columns = array(
    array('db' => 'service_id', 'dt' => 0),
    array('db' => 'service_img', 'dt' => 1,
        'formatter' => function ($d, $row) {
            return '<img src="../../upload/services/' . $d . '" >';
        }),
    array('db' => 'service_name', 'dt' => 2,
        'formatter' => function ($d, $row) {
            return strtoupper($d);
        }),
    array('db' => 'service_headline', 'dt' => 3,
        'formatter' => function ($d, $row) {
            return ucwords($d);
        }),
   
    array('db' => 'service_status', 'dt' => 4),
    array('db' => 'service_code', 'dt' => 5,
        'formatter' => function ($d, $row) {

            $show_button = '<a href="service_view.php?id=' . $d . '" class="btn btn-primary btn-xs" type="button" title="View" >View</a> ';
            $show_button .= '<a href="faq-service.php?service=' . $d . '" class="btn btn-success btn-xs" type="button" title="Add Faq" >FAQ</a> ';
            $show_button .= '<button class="btn btn-danger btn-xs delete_data" type="button" title="Delete Service"  id="' . $d . '" >Delete</button> ';
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
