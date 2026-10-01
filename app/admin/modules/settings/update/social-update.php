<?php
if (!empty($_POST['facebook_link']) || !empty($_POST['instagram_link']) || !empty($_POST['twitter_link']) || !empty($_POST['whatsapp_link']) || !empty($_POST['pinterest_link']) ) {
    include_once '../../../../config/config.php';
    $facebook_link = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'facebook_link', FILTER_DEFAULT));
    $instagram_link = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'instagram_link', FILTER_DEFAULT));
    $twitter_link = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'twitter_link', FILTER_DEFAULT));
    $whatsapp_link = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'whatsapp_link', FILTER_DEFAULT));
    $linkedin_link= mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'linkedin_link', FILTER_DEFAULT));
    ///////////////////////////////////////////////////////////////////

    $sql = "UPDATE social_links SET facebook='$facebook_link', instagram='$instagram_link', twitter='$twitter_link', whatsapp='$whatsapp_link', linkedin='$linkedin_link' WHERE 1";

    if ($conn->query($sql) === TRUE) {
        $out_stauts = "success";
        $message = "Social Media is Succesfully Update";
    } else {
        $out_stauts = "warning";
        $message = "Social Media  Not Update";
    }

    $conn->close();

    $response[] = array('status' => $out_stauts, 'msg' => $message);
    echo json_encode($response);
}
?>