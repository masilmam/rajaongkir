<?php
include 'request.php';

$hasil_prov = request_get('https://api.rajaongkir.com/starter/province', 'GET');

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
		<h5 class="mt-3">From :</h5>
		<form class="needs-validation" novalidate>
			<div class="row">
				<div class="col">
					<select class="custom-select" id="provinsi_from" name="provinsi_from" required>
						<option value="" selected>Pilih Provinsi Asal</option>
						<?php foreach($provinces as $p) { ?>
							<option value="<?= $p['province_id']; ?>"><?= $p['province']; ?></option>
						<?php } ?>
					</select>
					<div class="valid-feedback">
						OK!
					</div>
					<div class="invalid-feedback">
						Silahkan pilih provinsi
					</div>
				</div>
				<div class="col">
				<select class="custom-select" id="kota_from" name="kota_from" required>
					<option value="" selected>Pilih Kota/Kabupaten Asal</option>
				</select>
				<div class="valid-feedback">
						OK!
					</div>
					<div class="invalid-feedback">
						Silahkan pilih kota/kabupaten
					</div>
				</div>
			</div>

			<h5 class="mt-3">To :</h5>
			<div class="row">
				<div class="col">
					<select class="custom-select" id="provinsi_to" name="provinsi_to" required>
						<option value="" selected>Pilih Provinsi Tujuan</option>
						<?php foreach($provinces as $p) { ?>
							<option value="<?= $p['province_id']; ?>"><?= $p['province']; ?></option>
						<?php } ?>
					</select>
					<div class="valid-feedback">
						OK!
					</div>
					<div class="invalid-feedback">
						Silahkan pilih provinsi
					</div>
				</div>
				<div class="col">
					<select class="custom-select" id="kota_to" name="kota_to" required>
						<option value="" selected>Pilih Kota/Kabupaten Tujuan</option>
					</select>
					<div class="valid-feedback">
						OK!
					</div>
					<div class="invalid-feedback">
						Silahkan pilih kota/kabupaten
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<h5 class="mt-3">Berat (gram) :</h5>
				</div>
				<div class="col-md-2">
					<h5 class="mt-3">Kurir :</h5>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<input type="text" class="form-control" id="berat" name="berat" pattern="\d*" required>
					<div class="valid-feedback">
						OK!
					</div>
					<div class="invalid-feedback">
						Silahkan masukkan jumlah berat
					</div>
				</div>
				<div class="col-md-2">
					<select class="custom-select" id="kurir" name="kurir" required>
						<option value="" selected>Pilih Kurir</option>
						<option value="jne">JNE</option>
						<option value="pos">Pos Indonesia</option>
						<option value="tiki">TIKI</option>
					</select>
					<div class="valid-feedback">
						OK!
					</div>
					<div class="invalid-feedback">
						Silahkan pilih kurir
					</div>
				</div>	
			</div>
			<input type="button" value="Cek Ongkos Kirim" id="cek-ongkir" class="btn btn-dark mt-3">
		</form>
		<div id="info"></div>
		
		<div>
			<table class="table table-bordered mt-5 d-none" id="table">
				<thead>
					<tr>
						<th scope="col">Layanan</th>
						<th scope="col">Deskripsi</th>
						<th scope="col">Ongkos Kirim</th>
						<th scope="col">Estimasi (Hari)</th>
					</tr>
				</thead>
				<tbody id="ongkir">
				</tbody>
			</table>
		</div>
	</div> 
		
		<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		
		<script type="text/javascript" src="script.js"></script>
		<!-- Bootstrap form validation -->
		<script>
			(function() {
				'use strict';
				window.addEventListener('load', function() {
					// Fetch all the forms we want to apply custom Bootstrap validation styles to
					var forms = document.getElementsByClassName('needs-validation');
					// Loop over them and prevent submission
					var validation = Array.prototype.filter.call(forms, function(form) {
						form.addEventListener('submit', function(event) {
							if (form.checkValidity() === false) {
								event.preventDefault();
								event.stopPropagation();
							}
							form.classList.add('was-validated');
						}, false);
					});
				}, false);
			})();
		</script>
</body>
</html>