<?php
require_once ('classes/DatabaseHandler.class.php');
$db = new DatabaseHandler ();

$db->login ();

/*
 * De databasehandlerclass wordt aangeroepen, daarna wordt doormiddel van deze databasehandlerclass het loginscript opgehaald. Er wordt daarmee
 * gecontroleerd of een gebruiker is ingelogd, anders kan de gebruiker deze pagina niet bekijken.
 */
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
/*
 * Via de $_POST worden de variabelen uit het formulier verstuurd naar deze pagina. Hier worden de variabelen vervolgens opgehaald en gekoppeld aan
 * een nieuwe variabelen. Deze nieuwe variabelen worden in de query geplaatst. Deze query wordt vervolgens uitgevoerd. In de If Else constructie wordt
 * daarna weergegeven of de opdracht geslaagd of mislukt is.
 */
?>
