function opslaan(id) {
	switch (id) {
	case 'product_toevoegen':
		var $inputs = $('#product_toevoegen :input');
		
		$.post('querys/product_toevoegen.php', { categorienummer:$inputs['categorienummer'], gerecht: $inputs['gerecht'], prijs: $inputs['prijs'], actief: $inputs['actief'] });
		break;
	case 'tafelnummer_toevoegen':
		break;
	}
}