<?php
include 'request.php';

$province = $_POST['province'];

$url = 'https://api.rajaongkir.com/starter/city?province='.$province;

$hasil_kota = request_get($url);
// echo json_encode($cities = $hasil_kota['rajaongkir']['results'], true);
echo json_encode($hasil_kota['rajaongkir'], true);
?>