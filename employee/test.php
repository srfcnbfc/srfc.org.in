<?php
$username ="SRFCTRANS";
$password ="Srfc@123";
$type="0";
$dlr="1";
$entityid="1001314966537007000";
$tempid="1007870232671285063";
$destination="918103934917";
$source="SRFCPL";
$message="10111 is your OTP( shri ram finance)";
$url1 ="http://sms6.rmlconnect.net:8080/bulksms/bulksms?username=$username&password=$password&source=$source&type=$type&dlr=$dlr&destination=$destination&entityid=$entityid&tempid=$tempid&message=$message";
$url = str_replace(" ", '%20', $url1);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result= curl_exec($ch);
curl_close($ch);
print_r($result);


//$url1 ="http://sms6.rmlconnect.net:8080/bulksms/bulksms?username=$username&password=$password&source=$source&type=$type&dlr=$dlr&destination=$destination&entityid=$entityid&tempid=$tempid&message=$message";



 
?>