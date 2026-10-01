<?php
error_reporting(0);
require_once '../config/data-connect.php';
include_once 'session.php';
include 'backups/backup_function.php';
backDb(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
?>