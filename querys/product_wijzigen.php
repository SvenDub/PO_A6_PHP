<?php
require_once ('classes/DatabaseHandler.class.php');
$db = new DatabaseHandler ();

$db->login ();

$productcode = $_POST ["productcode"];
$categorienummer = $_POST ["categorienummer"];
$gerecht = $_POST ["gerecht"];
$prijs = $_POST ["prijs"];
$actief = $_POST ["actief"];

$resultaat = $db->product_wijzigen ( $productcode, $categorie, $gerecht, $prijs, $actief );

if ($resultaat == true) {
	print ("Product succesvol gewijzigd") ;
} else {
	print ("Het is niet gelukt om het product te wijzigen") ;
}
?>
