<?php
require_once ('classes/DatabaseHandler.class.php');
$db = new DatabaseHandler ();

$db->login ();
$tafelnummeroud = $_POST ["tafelnummeroud"];
$tafelnummernieuw = $_POST ["tafelnummernieuw"];

$resultaat = $db->tafelnummer_toevoegen ( $tafelnummeroud, $tafelnummernieuw );

if ($resultaat == true) {
	print ("Tafelnummer is gewijzigd ") ;
} else {
	print ("Het is niet gelukt om het tafelnummer te wijzigen") ;
}
?>
