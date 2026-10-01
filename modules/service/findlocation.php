<?php
$pincode = htmlspecialchars(filter_input(INPUT_POST,'pincode', FILTER_SANITIZE_NUMBER_INT));
//echo $pincode;
$url = 'https://api.postalpincode.in/pincode/'.$pincode;
//echo $url;



$data1 = file_get_contents($url);
$data = json_decode($data1);

//echo "<pre>";
//print_r($data);








 if (isset($data[0]->PostOffice['0'])) {
  $arr['city'] = $data[0]->PostOffice['0']->District;
  $arr['state'] = $data[0]->PostOffice['0']->State;
      echo json_encode($arr);
  } else {
      echo 'no';
  }



function file_get_contents_curl($url) {
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
curl_setopt($ch, CURLOPT_URL, $url);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}




?>