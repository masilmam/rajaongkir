$(document).ready(function () {
	$('#provinsi_from').change(function () {
		$('#kota_from').html('<option selected>Pilih Kota/Kabupaten Asal</option>');

		var prov = $('#provinsi_from').val();
		$.ajax({
			url: 'getKota.php',
			type: 'POST',
			data: {
				'province': prov
			},
			async: true,
			dataType: 'json',
			success: function (response) {
				if (response.status.code == 200) {
					let kota = response.results;

					$.each(kota, function (i, data) {
						$('#kota_from').append(`
								<option value="` + data.city_id + `">` + data.type + " " + data.city_name + `</option>
							`)
					})
				}
			}
		});
	}); //end #provinsi_from


});