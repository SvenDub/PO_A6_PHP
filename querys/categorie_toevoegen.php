<?php
require_once ('classes/DatabaseHandler.class.php');
$db = new DatabaseHandler ();

$db->login ();

$categorienummer = $_POST ["categorienummer"];
$categorie = $_POST ["categorie"];

$resultaat = $db->categorie_toevoegen ( $categorienummer, $categorie );

if ($resultaat == true) {
	print ("categorie succesvol toegevoegd") ;
} else {
	print ("Het is niet gelukt om de categorie toe te voegen") ;
}
?>
