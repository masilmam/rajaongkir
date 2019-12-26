number_format = function (number, decimals, dec_point, thousands_sep) {
	number = number.toFixed(decimals);

	var nstr = number.toString();
	nstr += '';
	x = nstr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? dec_point + x[1] : '';
	var rgx = /(\d+)(\d{3})/;

	while (rgx.test(x1))
		x1 = x1.replace(rgx, '$1' + thousands_sep + '$2');

	return x1 + x2;
}

$('#provinsi_from').change(function () {
	$('#kota_from').html('<option value="" selected>Pilih Kota/Kabupaten Asal</option>');

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
			} //end if
		}
	});
}); //end #provinsi_from

$('#provinsi_to').change(function () {
	$('#kota_to').html('<option value="" selected>Pilih Kota/Kabupaten Tujuan</option>');

	var prov = $('#provinsi_to').val();
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
					$('#kota_to').append(`
								<option value="` + data.city_id + `">` + data.type + " " + data.city_name + `</option>
							`)
				});
			} //end if
		}
	});
}); //end #provinsi_from

$('#cek-ongkir').on('click', function () {
	var origin = $('#kota_from').val();
	var destination = $('#kota_to').val();
	var weight = $('#berat').val();
	var courier = $('#kurir').val();

	$.ajax({
		url: 'getOngkir.php',
		type: 'POST',
		data: {
			'origin': origin,
			'destination': destination,
			'weight': weight,
			'courier': courier
		},
		async: true,
		dataType: 'json',
		success: function (response) {
			if (response.status.code == 200) {
				$('#table').removeClass('d-none');
				$('#ongkir').html('');

				let ongkir = response;

				$.each(ongkir.results[0].costs, function (i, data) {
					$('#ongkir').append(`
						<tr>
							<td>` + data.service + `</td>
							<td>` + data.description + `</td>
							<td>Rp` + number_format(data.cost[0].value, 0, ',', '.') + `</td>
							<td>` + data.cost[0].etd + `</td>
						</tr>
						`)
				});

			} //end if
		}
	});
});