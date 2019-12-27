<?php
$key = "c46252e90c8e5a91b59bb5a120f78971";

function request_get($url) {
  $key = $GLOBALS['key'];
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_ENCODING, '');
  curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
  curl_setopt($curl, CURLOPT_TIMEOUT, 30);
  curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
  curl_setopt($curl, CURLOPT_HTTPHEADER, array("key: $key"));
  $result = curl_exec($curl);
  curl_close($curl);
  
  return json_decode($result, true);
}

function request_post($url,$data) {
  $key = $GLOBALS['key'];
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_ENCODING, '');
  curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
  curl_setopt($curl, CURLOPT_TIMEOUT, 30);
  curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    "key: $key",
    "content-type: application/x-www-form-urlencoded"
  ));
  $result = curl_exec($curl);
  curl_close($curl);
  
  return json_decode($result, true);
}
?>