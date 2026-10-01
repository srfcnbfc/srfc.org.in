<?php
@ob_start();
session_start();
//Start session


//Check whether the session variable SESS_MEMBER_ID is present or not
if ((!isset($_SESSION['EmpSessionID']) || (trim($_SESSION['EmpSessionID']) == ''))) 
{
    header("location: index.php");
    exit();
}
else{
    $login_emp_code=$_SESSION['EmpSessionID'];
}
$duration = (60 * 60);
if(isset($_SESSION['started']))
{
    $time = ($duration - (time() - $_SESSION['started']));
    if($time <= 0)
    {
        unset($_SESSION['EmpSessionID']);
        session_destroy();
        header("location: index.php");
        exit();
    }
}
else
{
  $_SESSION['started'] = time();
  $login_emp_code=$_SESSION['EmpSessionID'];
}
?>