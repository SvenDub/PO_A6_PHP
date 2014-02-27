<?php
require_once ('classes/DatabaseHandler.class.php');
$db = new DatabaseHandler ();

$db->login ();
/* De databasehandlerclass wordt aangeroepen, daarna wordt doormiddel van deze databasehandlerclass het loginscript 
opgehaald. Er wordt daarmee gecontroleerd of een gebruiker is ingelogd, anders kan de gebruiker deze pagina niet bekijken.
*/
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Beheer | Bolhoed</title>
<link
	href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900"
	rel="stylesheet" />
<link href="opmaak.css" rel="stylesheet" type="text/css" media="all" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="beheer.js"></script>
</head>
<body>
<div id="page" class="container">

		<div id="header">
			<div id="logo">
				<h1>
					<a>Bolhoed</a>
				</h1>
			</div>
			<div id="menu">
				<ul>
					<li><a href="index.php">Home</a></li>
					<?php
					if ($db->isIngelogd ()) {
						echo '<li><a href="inloggen.php?logout">Uitloggen</a></li>';
						echo '<li><a href="liveticker">Bestellingen</a></li>';
						if ($db->isBeheerder ()) {
							echo '<li><a href="statistiek.php">Statistieken</a></li>';
							echo '<li class="current_page_item"><a>Beheer</a></li>';
						}
					} else {
						echo '<li><a href="inloggen.php">Inloggen</a></li>';
					}
					?>
				</ul>
			</div>
		</div>

		<div id="main">
	<h1>Beheer database</h1>
	<br />
	<h2>Product toevoegen</h2>
	<br />
	<form id="product_toevoegen" method="post" action=""
		onsubmit="opslaan('product_toevoegen'); return false;">
		Categorienummer:
		<br />
		<input type="number" name="categorienummer" maxlength="11" min="0" />
		<br />
		Gerecht:
		<br />
		<input type="text" name="gerecht" maxlength="50" min="0" />
		<br />
		Prijs:
		<br />
		<input type="number" step="0.01" name="prijs" min="0" />
		<br />
		Actief:
		<br />
		<input type="number" name="actief" maxlength="1" />
		<br />
		<input type="submit" name="verzenden" />
		<br />
	</form>
	<br />

	<h2>Tafelnummer toevoegen</h2>
	<br />
	<form id="tafelnummer_toevoegen" method="post" action=""
		onsubmit="opslaan('tafelnummer_toevoegen'); return false;">
		Tafelnummer toevoegen:
		<br />
		<input type="number" name="tafelnummer" maxlength="3" min="0" />
		<br />
		<input type="submit" name="verzenden" />
		<br />
	</form>
	<br />

	<h2>Categorie toevoegen</h2>
	<br />
	<form id="categorie_toevoegen" method="post" action=""
		onsubmit="opslaan('categorie_toevoegen'); return false;">
		Categorienummer:
		<br />
		<input type="number" name="categorienummer" maxlength="11" min="0" />
		<br />
		Categorie:
		<br />
		<input type="text" name="categorie" maxlength="50" min="0" />
		<br />
		<input type="submit" name="verzenden" />
		<br />
	</form>
	<br />

	<h2>Personeel wijzigen</h2>
	<br />
	<form id="personeel_wijzigen" method="post" action=""
		onsubmit="opslaan('personeel_wijzigen'); return false;">
		ID:
		<br />
		<input type="number" name="id" maxlength="4" min="0" />
		<br />
		Gebruikersnaam:
		<br />
		<input type="text" name="gebruikersnaam" maxlength="50" min="0" />
		<br />
		Wachtwoord:
		<br />
		<input type="password" name="wachtwoord" min="5" />
		<br />
		Beheer:
		<br />
		<input type="number" name="beheer" min="0" maxlength="1" />
		<br />
		Actief:
		<br />
		<input type="number" name="actief" min="0" maxlength="1" />
		<br />
		<input type="submit" name="verzenden" />
		<br />
	</form>
	<br />

	<h2>Product wijzigen</h2>
	<br />
	<form id="product_wijzigen" method="post" action=""
		onsubmit="opslaan('product_wijzigen'); return false;">
		Productcode:
		<br />
		<input type="number" name="productcode" maxlength="4" />
		<br />
		Categorienummer:
		<br />
		<input type="text" name="categorienummer" maxlength="11" />
		<br />
		Gerecht:
		<br />
		<input type="text" name="gerecht" />
		<br />
		Prijs:
		<br />
		<input type="number" step="0.01" name="prijs" min="0" />
		<br />
		Actief:
		<br />
		<input type="number" name="actief" min="0" maxlength="1" />
		<br />
		<input type="submit" name="verzenden" />
		<br />
	</form>
	<br />

	<h2>Tafelnummer wijzigen</h2>
	<br />
	<form id="tafelnummer_wijzigen" method="post" action=""
		onsubmit="opslaan('tafelnummer_wijzigen'); return false;">
		Oude tafelnummer:
		<br />
		<input type="number" name="tafelnummeroud" min="0" maxlength="3" />
		<br />
		Nieuwe tafelnummer:
		<br />
		<input type="number" name="tafelnummernieuw" min="0" maxlength="3" />
		<br />
		<input type="submit" name="verzenden" />
		<br />
	</form>
	<br />

	<h2>Categorie wijzigen</h2>
	<br />
	<form id="categorie_wijzigen" method="post" action=""
		onsubmit="opslaan('categorie_wijzigen'); return false;">
		Categorienummer:
		<br />
		<input type="number" name="categorienummer" min="0" maxlength="11" />
		<br />
		Categorie:
		<br />
		<input type="text" name="categorie" maxlength="50" />
		<br />
		<input type="submit" name="verzenden" />
		<br />
	</form>
	<br />

	<h2>Tafelnummer verwijderen</h2>
	<br />
	<form id="tafelnummer_verwijderen" method="post" action=""
		onsubmit="opslaan('tafelnummer_verwijderen'); return false;">
		Tafelnummer:
		<br />
		<input type="number" name="tafelnummer" min="0" maxlength="3" />
		<br />
		<input type="submit" name="verzenden" />
		<br />
	</form>
	<br />

	<h2>Gebruiker toevoegen</h2>
	<br />
	<form id="voegGebruikerToe" method="post" action=""
		onsubmit="opslaan('voegGebruikerToe'); return false;">
		Gebruikersnaam:
		<br />
		<input type="text" name="gebruikersnaam" maxlength="50" />
		<br />
		Wachtwoord:
		<br />
		<input type="password" name="wachtwoord" />
		<br />
		Beheer:
		<br />
		<input type="number" name="beheer" min="0" maxlength="1" />
		<br />
		Actief:
		<br />
		<input type="number" name="actief" min="0" maxlength="1" />
		<br />
		<input type="submit" name="verzenden" />
		<br />
	</form>
	</div>
	
</div>
</body>
</html>
