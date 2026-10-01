<?php

include_once '../../../config/config.php';
include_once '../../session.php';
// DB table to use
$table = 'employee';
// Table's primary key
$primaryKey = 'emp_id';

$columns = array(
array('db' => 'emp_id', 'dt' => 0),
 array('db' => 'emp_name', 'dt' => 1,
 'formatter' => function ($d, $row) {
return ucwords($d);
}),
 array('db' => 'emp_code', 'dt' => 2),
 array('db' => 'emp_department', 'dt' => 3),
 array('db' => 'emp_designation', 'dt' => 4),
 array('db' => 'emp_job_type', 'dt' => 5),
 array('db' => 'emp_location', 'dt' => 6),
 array('db' => 'emp_mobile', 'dt' => 7),
 array('db' => 'emp_status', 'dt' => 8,
     'formatter' => function ($d, $row) {
    $emp_check = ($d == 'ACTIVE') ? 'CHECKED' : '';
    $stauts_button = ' <div class="media-body icon-state ">
                                    <label class="switch">
                                        <input type="checkbox"'.$emp_check.' value="'.$d.'" class="changestatus" id="'.$row[2].'"><span class="switch-state"></span>
                                    </label>
                                </div>';
    return $stauts_button;
     }),
 array('db' => 'emp_code', 'dt' => 9,
 'formatter' => function ($d, $row) {
$show_button = '<button class="btn btn-primary btn-xs edit_data" id="' . $d . '"><i class="fa fa-edit"></i></button> ';
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
