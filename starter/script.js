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
				})
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

				let ongkir = response;

				$.each(ongkir.results[0].costs, function (i, data) {
					$('#ongkir').append(`
						<tr>
							<td>` + data.service + `</td>
							<td>` + data.description + `</td>
							<td>` + data.cost[0].value + `</td>
							<td>` + data.cost[0].etd + `</td>
						</tr>
						`)
				})

				// $('#ongkir').append(`
				// 		</tbody>
				// 	</table>
				// `);
			} //end if
		}
	});
});