<?php
include_once '../../../config/config.php';
include_once '../../session.php';
// DB table to use
$table = 'blog';
// Table's primary key
$primaryKey = 'blog_id';

$columns = array(
    array('db' => 'blog_id', 'dt' => 0),
    array('db' => 'blog_img', 'dt' => 1,
        'formatter' => function ($d, $row) {
            return '<img src="../../upload/blog/' . $d . '" >';
        }),
    array('db' => 'blog_title', 'dt' => 2,
        'formatter' => function ($d, $row) {
            return ucwords($d);
        }),
  
    array('db' => 'blog_slug', 'dt' => 3,
        'formatter' => function ($d, $row) {

            $show_button = '<a href="../../blog/' . $d . '" class="btn btn-primary btn-xs" type="button" title="" >View</a> ';
            $show_button .= '<a href="edit-blog?blog=' . $row[0] . '" class="btn btn-primary btn-xs" type="button" title="" >Edit</a> ';
            $show_button .= '<button class="btn btn-danger btn-xs delete_data" type="button" title="Delete Service"  id="' . $row[0] . '" >Delete</button> ';
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
