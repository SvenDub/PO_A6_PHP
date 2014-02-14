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
		
	  case 'tafelnummer_toevoegen':
		var $inputs = $('#tafelnummer_toevoegen :input');

		if (($inputs[0].value == '')) {
			alert('Voer alle velden in.');
		} else {

			$.post('querys/tafelnummer_toevoegen.php', {
				tafelnummer : $inputs[0].value
			}, function(data) {
				alert(data);
			});
		}
		break;
		
	case 'categorie_toevoegen':
		var $inputs = $('#categorie_toevoegen :input');

		if (($inputs[0].value == '') || ($inputs[1].value == '')) {
			alert('Voer alle velden in.');
		} else {

			$.post('querys/categorie_toevoegen.php', {
				categorienummer : $inputs[0].value,
				categorie : $inputs[1].value
				
			}, function(data) {
				alert(data);
			});
		}
		break;
		case 'personeel_wijzigen':
		var $inputs = $('#personeel_wijzigen :input');

		if (($inputs[0].value == '') || ($inputs[1].value == '')
				|| ($inputs[2].value == '') || ($inputs[3].value == '') || ($inputs[4].value == ''))  {
			alert('Voer alle velden in.');
		} else {

			$.post('querys/personeel_wijzigen.php', {
				id : $inputs[0].value,
				gebruikersnaam : $inputs[1].value,
				wachtwoord : $inputs[2].value,
				beheer : $inputs[3].value,
				actief : $inputs[4].value
			}, function(data) {
				alert(data);
			});
		}
		break;
		case 'product_wijzigen':
		var $inputs = $('#product_wijzigen :input');

		if (($inputs[0].value == '') || ($inputs[1].value == '')
				|| ($inputs[2].value == '') || ($inputs[3].value == '') || ($inputs[4].value == ''))  {
			alert('Voer alle velden in.');
		} else {

			$.post('querys/product_wijzigen.php', {
				productcode : $inputs[0].value,
				categorienummer : $inputs[1].value,
				gerecht : $inputs[2].value,
				prijs : $inputs[3].value,
				actief : $inputs[4].value
			}, function(data) {
				alert(data);
			});
		}
		break;
		case 'tafelnummer_wijzigen':
		var $inputs = $('#tafelnummer_wijzigen :input');

		if (($inputs[0].value == '')|| ($inputs[1].value == '')) {
			alert('Voer alle velden in.');
		} else {

			$.post('querys/tafelnummer_wijzigen.php', {
				tafelnummeroud : $inputs[0].value,
				tafelnummernieuw : $inputs[1].value
			}, function(data) {
				alert(data);
			});
		}
		break;
		
		case 'categorie_wijzigen':
		var $inputs = $('#categorie_wijzigen :input');

		if (($inputs[0].value == '')|| ($inputs[1].value == '')) {
			alert('Voer alle velden in.');
		} else {

			$.post('querys/categorie_wijzigen.php', {
				categorienummer : $inputs[0].value,
				categorie : $inputs[1].value
			}, function(data) {
				alert(data);
			});
		}
		break;
		
		case 'tafelnummer_verwijderen':
		var $inputs = $('#tafelnummer_verwijderen :input');

		if (($inputs[0].value == '')) {
			alert('Voer alle velden in.');
		} else {

			$.post('querys/tafelnummer_verwijderen.php', {
				tafelnummer : $inputs[0].value
			}, function(data) {
				alert(data);
			});
		}
		break;
		case 'voegGebruikerToe':
		var $inputs = $('#voegGebruikerToe :input');

		if (($inputs[0].value == '') || ($inputs[1].value == '')
				|| ($inputs[2].value == '') || ($inputs[3].value == '')) {
			alert('Voer alle velden in.');
		} else {

			$.post('querys/voegGebruikerToe.php', {
				gebruikersnaam : $inputs[0].value,
				wachtwoord : $inputs[1].value,
				beheer : $inputs[2].value,
				actief : $inputs[3].value
			}, function(data) {
				alert(data);
			});
		}
		break;
		
	}
}
