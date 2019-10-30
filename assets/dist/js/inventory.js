$(document).ready(function () {

	// ------------------------------------------------------------------------------------------
	// start
	// ------------------------------------------------------------------------------------------
	var root = window.location.origin + '/inventory-pupuk/';

	$('#pupuk').change(function () {
		var id = $(this).val();
		console.log(id);
		var getUrl = root + 'PupukController/lihat_pupuk/' + id;
		$.ajax({
			url : getUrl,
			type : 'ajax',
			dataType : 'json',
			success: function (response) {
				console.log(response);
				if (response != null){
					$('#jumlah').attr('max',response.pupuk_stok);
				}
			},
			error: function (response) {
				console.log(response.status + 'error');
			}
		});
	});
});
