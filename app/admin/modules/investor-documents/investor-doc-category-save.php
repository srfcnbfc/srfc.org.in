<?php

if (!empty($_POST['investor_category_name']) && !empty($_POST['investor_doc_type'])) {
    include_once '../../../config/config.php';
    $investor_doc_type = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'investor_doc_type', FILTER_DEFAULT));
    $investor_category_name = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'investor_category_name', FILTER_DEFAULT));
    
        $search_query = "SELECT * FROM investor_doc_category WHERE investor_category_name='$investor_category_name' and investor_doc_type ='$investor_doc_type'";
        $result = mysqli_query($conn, $search_query)or die(mysqli_error());
        $num_row = mysqli_num_rows($result);
        if ($num_row > 0) {
            $out_stauts = "warning";
            $message = "Investor Document is Already Exist.";
        } else {
            $sql = "INSERT INTO investor_doc_category (investor_category_name, investor_doc_type)"
                    . "VALUES ('$investor_category_name', '$investor_doc_type')";

            if ($conn->query($sql) === TRUE) {
                $out_stauts = "success";
                $message = "Investor is Succesfully Added";
            } else {
                $out_stauts = "warning";
                $message = "Investor  Not Added";
            }
        }
        $conn->close();
   
    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>