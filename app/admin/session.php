<?php
@ob_start();
session_start();
//Start session
$admin_code=$_SESSION['adminemail'];

//Check whether the session variable SESS_MEMBER_ID is present or not
if ((!isset($_SESSION['adminemail']) || (trim($_SESSION['adminemail']) == ''))) 
{
    header("location: index.php");
    exit();
}

$duration = (60 * 60);
if(isset($_SESSION['started']))
{
    $time = ($duration - (time() - $_SESSION['started']));
    if($time <= 0)
    {
        unset($_SESSION['adminemail']);
        session_destroy();
        header("location: index.php");
        exit();
    }
}
else
{
  $_SESSION['started'] = time();
}
?>