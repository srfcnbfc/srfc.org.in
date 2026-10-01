<?php

// function sendsms($mobile, $otp) {
//     $username = "SRFCTRANS";
//     $password = "Dipu@143";
//     $type = "0";
//     $dlr = "1";
//     $entityid = "1001314966537007000";
//     $tempid = "1007300327269863411";
//     $destination = '91' . $mobile;
//     $source = "SRFCPL";
//     $message = $otp . "  is your OTP(One Time Password) for Mobile Verification. Please don't share with anyone (Shri Ram Finance Corporation Pvt. Ltd.)";
//     $url1 = "http://sms6.rmlconnect.net:8080/bulksms/bulksms?username=$username&password=$password&source=$source&type=$type&dlr=$dlr&destination=$destination&entityid=$entityid&tempid=$tempid&message=$message";
//     $url = str_replace(" ", '%20', $url1);
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     $result = curl_exec($ch);
//     curl_close($ch);
// //print_r($result);
//     return $result;
// }

// function sendsms($mobile, $otp) {
//     //NEW API
//     $username = "srfcnbfc.com";
//     $password = "67441701";
//     $type = "0";
//     $dlr = "1";
//     $entityid = "1001314966537007000";
//     $tempid = "1007300327269863411";
//     $destination = '91' . $mobile;
//     $source = "SRFCPL";
//     $message = $otp . "  is your OTP(One Time Password) for Mobile Verification. Please don't share with anyone (Shri Ram Finance Corporation Pvt. Ltd.)";
//     $url1 = "https://www.textguru.in/api/v22.0/?username=$username&password=$password&dmobile=$destination&source=$source&message=$message&entityid=$entityid&dlttempid=$tempid";
//     $url = str_replace(" ", '%20', $url1);
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     $result = curl_exec($ch);
//     curl_close($ch);
// //print_r($result);
//     return $result;
// }


function sendsms($mobile, $otp) {
    //NEW API
    $username = "shrirfmpg.trans";
    $password = "1HcJF";
    $type = "0";
    $dlr = "1";
    $entityid = "1001314966537007000";
    $tempid = "1007300327269863411";
    $destination = '91' . $mobile;
    $source = "SRFCPL";
    $message = $otp . "  is your OTP(One Time Password) for Mobile Verification. Please don't share with anyone (Shri Ram Finance Corporation Pvt. Ltd.)";
    $url1 = "https://api.smartping.ai/fe/api/v1/send?username=$username&password=$password&unicode=true&from=$source&to=$destination&dltPrincipalEntityId=$entityid&dltContentId=$tempid&text=$message";
    $url = str_replace(" ", '%20', $url1);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
//print_r($result);
    return $result;
}
?>