<?php
require 'session.php';
include_once 'config/config.php';

$emp_details_sql = "SELECT  * FROM employee WHERE emp_code ='$login_emp_code'";
$emp_details = getsingleData($emp_details_sql);
$emp_name = $emp_details['emp_name'];
$emp_mobile = $emp_details['emp_mobile'];
$emp_location = $emp_details['emp_location'];
$emp_department = $emp_details['emp_department'];
$emp_designation = $emp_details['emp_designation'];
$emp_job_type = $emp_details['emp_job_type'];
$emp_img = $emp_details['emp_img'];
$emp_code = $emp_details['emp_code'];
?>
<head>
<base href="https://employee.srfc.org.in/">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="img/logo.svg" type="image/png">
<title>Employee Dashboard</title>
<link rel="stylesheet" href="vender/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="vender/slick/slick/slick.css" />
<link rel="stylesheet" href="vender/slick/slick/slick-theme.css" />
<link rel="stylesheet" href="vender/sidebar/demo.css">
<link rel="stylesheet" href="vender/materialdesign/css/materialdesignicons.min.css">
<link rel="stylesheet" href="css/style.css">
</head>