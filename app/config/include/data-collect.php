<?php

function getData($sqlQuery) {
    $result = mysqli_query($GLOBALS['conn'], $sqlQuery);
    if (!$result) {
        die('Error in query: ' . mysqli_error());
    }
    $data = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $data[] = $row;
    }
    return $data;
}

function getsingleData($sqlQuery) {
    $row = "";
    $result = mysqli_query($GLOBALS['conn'], $sqlQuery);
    if (!$result) {
        die('Error in query: ' . mysqli_error());
    }
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    return $row;
}

function getNumRows($sqlQuery) {
    $result = mysqli_query($GLOBALS['conn'], $sqlQuery);
    if (!$result) {
        die('Error in query: ' . mysqli_error());
    }
    $numRows = mysqli_num_rows($result);
    return $numRows;
}

?>