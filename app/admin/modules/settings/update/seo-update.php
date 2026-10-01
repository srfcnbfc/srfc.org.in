<?php
if (!empty($_POST['website_header']) || !empty($_POST['website_footer']) ) {
    include_once '../../../../config/config.php';
    $header_data = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'website_header', FILTER_DEFAULT));
    $footer_data = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'website_footer', FILTER_DEFAULT));
    
    ///////////////////////////////////////////////////////////////////

    $sql = "UPDATE website_seo SET web_header='$header_data', web_footer='$footer_data' WHERE 1";

    if ($conn->query($sql) === TRUE) {
        $out_stauts = "success";
        $message = "SEO is Succesfully Update";
    } else {
        $out_stauts = "warning";
        $message = "SEO Not Update";
    }

    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>