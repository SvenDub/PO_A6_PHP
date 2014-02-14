function opslaan(id) {
	switch (id) {
	case 'product_toevoegen':
		var $inputs = $('#product_toevoegen :input');
		
		if (($inputs['categorienummer'] != '') && ($inputs['gerecht'] != '') && ($inputs['prijs'] != '') && ($inputs['actief'] != '')) {
			$.post('querys/product_toevoegen.php', { categorienummer:$inputs['categorienummer'], gerecht: $inputs['gerecht'], prijs: $inputs['prijs'], actief: $inputs['actief'] });
		} else {
			alert('Voer alle velden in.');
		}
		break;
	case 'tafelnummer_toevoegen':
		break;
	}
}