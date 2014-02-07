<?php

require_once('classes/DatabaseHandler.class.php');
$db=new DatabaseHandler(); 

$db->login(); 

?>
<!DOCTYPE html > 
<html>
<head>
<link href="opmaak.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Beheer database</title>
</head>
<body>
<h1> Beheer database</h1>

<form id="product_toevoegen" method="post" action="">
Categorienummer: <br />
<input type="number" name="categorienummer" maxlength="11" min="0" /> <br />
Gerecht: <br />
<input type="text" name="gerecht" maxlength="50" min="0" /> <br />
Prijs: <br />
<input type="number" step="0.01" name="prijs" min="0" /> <br />
Actief: <br />
<input type="checkbox" name="actief" maxlength="1" /> <br />
</form><br />

<form id="tafelnummer_toevoegen" method="post" action="">
Tafelnummer toevoegen: <br />
<input type="number" name="tafelnummer" maxlength="3" min="0" /> <br />
</form><br />

<form id="categorie_toevoegen" method="post" action="">
Categorienummer: <br />
<input type="number" name="categorienummer" maxlength="11" min="0" /> <br />
Categorie: <br />
<input type="text" name="categorie" maxlength="50" min="0" /> <br />
</form><br />

<form id="personeel_wijzigen" method="post" action="">
ID: <br />
<input type="number" name="id" maxlength="4" min="0" /> <br />
Gebruikersnaam: <br />
<input type="text" name="gebruikersnaam" maxlength="50" min="0" /> <br />
Wachtwoord: <br />
<input type="password" name="wachtwoord" min="5" /> <br />
Beheer: <br />
<input type="number" name="beheer" maxlength="1" /> <br />
Actief: <br />
<input type="number" name="actief" maxlength="1" /> <br />
</form> <br />

<form id="product_wijzigen" method="post" action="">
Productcode: <br />
<input type="number" name="productcode" maxlength="4" /> <br />
Categorienummer: <br />
<input type="text" name="categorienummer" maxlength="11" /> <br />
Gerecht: <br />
<input type="text" name="gerecht" /> <br />
Prijs: <br />
<input type="number" step="0.01" name="prijs" min="0" /> <br />
Actief: <br />
<input type="number" name="actief" maxlength="1" /> <br />
</form><br />

<form id="tafelnummer_wijzigen" method="post" action="">
Oude tafelnummer: <br />
<input type="number" name="tafelnummeroud" maxlength="3" /> <br />
Nieuwe tafelnummer: <br />
<input type="number" name="tafelnummernieuw" maxlength="3" /> <br />
</form><br />

<form id="categorie_wijzigen" method="post" action="">
Categorienummer: <br />
<input type="number" name="categorienummer" maxlength="11" /> <br />
Categorie: <br />
<input type="text" name="categorie" maxlength="50" /> <br />
</form><br />

<form id="tafelnummer_verwijderen" method="post" action="">
Tafelnummer: <br />
<input type="number" name="tafelnummer" maxlength="3" /> <br />
</form><br />

<form id="voegGebruikerToe" method="post" action="">
Gebruikersnaam: <br />
<input type="text" name="gebruikersnaam" maxlength="50" /> <br />
Wachtwoord: <br />
<input type="password" name="wachtwoord" /> <br />
Beheer: <br />
<input type="number" name="beheer" maxlength="1" /> <br />
Actief: <br />
<input type="number" name="actief" maxlength="1" /> <br />
</form> <br />

</body>
</html>
