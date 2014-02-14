function opslaan(id) {
	switch (id) {
	case 'product_toevoegen':
		var $inputs = $('#product_toevoegen :input');

		if (($inputs[0].value == '') || ($inputs[1].value == '')
				|| ($inputs[2].value == '') || ($inputs[3].value == '')) {
			alert('Voer alle velden in.');
		} else {

			$.post('querys/product_toevoegen.php', {
				categorienummer : $inputs[0].value,
				gerecht : $inputs[1].value,
				prijs : $inputs[2].value,
				actief : $inputs[3].value
			}, function(data) {
				alert(data);
			});
		}
		break;
	}
}