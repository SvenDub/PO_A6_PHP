<?php
require_once ('classes/DatabaseHandler.class.php');
$db = new DatabaseHandler ();

$db->login ();
$gebruikersnaam = $_POST ["gebruikersnaam"];
$wachtwoord = $_POST ["wachtwoord"];
$beheer = $_POST ["beheer"];
$actief = $_POST ["actief"];

$resultaat = $db->tafelnummer_toevoegen ( $gebruikersnaam, $wachtwoord, $beheer, $actief );

if ($resultaat == true) {
	print ("Gebruiker is toegevoegd. ") ;
} else {
	print ("Het is niet gelukt om de gebruiker toe te voegen.") ;
}
?>
