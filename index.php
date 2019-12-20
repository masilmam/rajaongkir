<?php
include 'request.php';

$hasil_prov = request('https://api.rajaongkir.com/starter/province',array('key: c46252e90c8e5a91b59bb5a120f78971'));
$provinces = $hasil_prov['rajaongkir']['results'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<title>Cek Ongkir</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <!-- Content here -->
				<h3 class="mt-5">From :</h3>
				<form>
					<div class="row">
						<div class="col">
						<select class="custom-select" id="provinsi_from" name="provinsi_from">
							<option selected>Pilih Provinsi Asal</option>
							<?php foreach($provinces as $prov) { ?>
								<option value="<?= $prov['province_id']; ?>"><?= $prov['province']; ?></option>
							<?php } ?>
						</select>
						</div>
						<div class="col">
						<select class="custom-select" id="kota_from" name="kota_from">
							<option selected>Pilih Kota/Kabupaten Asal</option>
						</select>
						</div>
					</div>

					<h3 class="mt-3">To :</h3>
					<div class="row">
						<div class="col">
						<select class="custom-select" id="provinsi_to" name="provinsi_to">
							<option selected>Pilih Provinsi Tujuan</option>
							<?php foreach($provinces as $prov) { ?>
								<option value="<?= $prov['province_id']; ?>"><?= $prov['province']; ?></option>
							<?php } ?>
						</select>
						</div>
						<div class="col">
						<select class="custom-select" id="kota_to name="kota_to">
							<option selected>Pilih Kota/Kabupaten Tujuan</option>
						</select>
						</div>
					</div>
					<input type="submit" value="Cek Ongkos Kirim" class="btn btn-primary mt-3">
				</form>
		</div> 
		
		<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
		<script type="text/javascript" src="script.js"></script>
</body>
</html>