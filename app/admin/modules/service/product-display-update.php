<?php

if (!empty($_POST['product_code'])) {
    include_once '../../../config/config.php';
    include_once '../../session.php';
    $product_code = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'product_code', FILTER_DEFAULT));
    $pr_disp_1 = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'pr_disp1', FILTER_DEFAULT));
    $pr_disp1 = (!empty($pr_disp_1)) ? '1' : '0';
    $pr_disp_2 = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'pr_disp2', FILTER_DEFAULT));
    $pr_disp2 = (!empty($pr_disp_2)) ? '1' : '0';
    $pr_disp_3 = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'pr_disp3', FILTER_DEFAULT));
    $pr_disp3 = (!empty($pr_disp_3)) ? '1' : '0';

    $search_query = "SELECT product_code FROM product_disp WHERE product_code='$product_code'";
    $result = mysqli_query($conn, $search_query)or die(mysqli_error());
    $num_row = mysqli_num_rows($result);
    if ($num_row > 0) {
        $sql = "UPDATE product_disp SET best_seller='$pr_disp1', trending='$pr_disp2', top_rated='$pr_disp3' WHERE product_code='$product_code' ";
    } else {
        $sql = "INSERT INTO product_disp(product_code, best_seller, trending, top_rated) VALUES ('$product_code','$pr_disp1','$pr_disp2','$pr_disp3')";
    }
    if ($conn->query($sql) === TRUE) {
        $out_stauts = "success";
        $message = "Product is Succesfully Show";
    } else {
        $out_stauts = "warning";
        $message = "Product  Not Show";
    }

    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>