<?php

require_once('classes/DatabaseHandler.class.php');
$db=new DatabaseHandler(); 

$db->login(); 
$tafelnummer=$_POST["tafelnummer"];

$resultaat=$db->tafelnummer_toevoegen($tafelnummer);

if ( $resultaat == true ) {
  print ("Tafelnummer is verwijderd ");
}
else {print ("Het is niet gelukt om het tafelnummer te verwijderen");}
?>
