<?php
include_once '../../../config/config.php';
include_once '../../session.php';
// DB table to use
$table = 'enquiry';

// Table's primary key
$primaryKey = 'enq_id';

$columns = array(
    array('db' => 'enq_id', 'dt' => 0),
    array('db' => 'enq_time', 'dt' => 1),
    array('db' => 'enq_name', 'dt' => 2,
        'formatter' => function ($d, $row) {
            return strtoupper($d);
        }),
    array('db' => 'enq_mobile', 'dt' => 3),
    array('db' => 'enq_email', 'dt' => 4),
    array('db' => 'enq_msg', 'dt' => 5),
    array('db' => 'enq_id', 'dt' => 6,
        'formatter' => function ($d, $row) {
            $show_button = '<a href="tel:'.$row[3].'" target="_blank" class="btn btn-success  send_whatsapp" type="button"  title="Whatsapp Now"  ><i class="fa fa-phone"></i></a> ';
            $show_button .= '<a href="https://api.whatsapp.com/send/?phone=91'.$row[3].'&text=Hi%20'.$row[2].'" target="_blank" class="btn btn-success send_whatsapp" type="button"  title="Whatsapp Now"  ><i class="fa fa-whatsapp"></i></a> ';
            $show_button .= '<button class="btn btn-danger btn-xs delete_data" type="button" title="Delete Now"  id="' . $d . '" ><i class="fa fa-trash"></i></button> ';
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
