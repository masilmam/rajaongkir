<?php
include 'request.php';

$origin = $_POST['origin'];
$destination = $_POST['destination'];
$weight = $_POST['weight'];
$courier = $_POST['courier'];

$data = "origin=$origin&destination=$destination&weight=$weight&courier=$courier";

$hasil_ongkir = request_post('https://api.rajaongkir.com/starter/cost',$data);
echo json_encode($hasil_ongkir['rajaongkir'], true);
?>