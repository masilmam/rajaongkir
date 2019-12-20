<?php
include 'request.php';

$province = $_POST['province'];

$url = 'https://api.rajaongkir.com/starter/city?province='.$province;
$data = array('key: c46252e90c8e5a91b59bb5a120f78971');

$hasil_kota = request($url,$data);
// echo json_encode($cities = $hasil_kota['rajaongkir']['results'], true);
echo json_encode($hasil_kota['rajaongkir'], true);
?>