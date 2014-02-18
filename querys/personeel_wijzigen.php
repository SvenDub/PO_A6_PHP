<?php
require_once ('classes/DatabaseHandler.class.php');
$db = new DatabaseHandler ();

$db->login ();

$id = $_POST ["id"];
$gebruikersnaam = $_POST ["gebruikersnaam"];
$wachtwoord = $_POST ["wachtwoord"];
$beheer = $_POST ["beheer"];
$actief = $_POST ["actief"];

$resultaat = $db->personeel_wijzigen ( $id, $gebruikersnaam, $wachtwoord, $beheer, $actief );

if ($resultaat == true) {
	print ("Personeel succesvol gewijzigd") ;
} else {
	print ("Het is niet gelukt om personeel te wijzigen") ;
}
?>
