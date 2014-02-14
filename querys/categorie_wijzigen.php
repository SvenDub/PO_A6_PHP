<?php

require_once('classes/DatabaseHandler.class.php');
$db=new DatabaseHandler(); 

$db->login(); 
$categorienummer=$_POST["categorienummer"];
$categorie=$_POST["categorie"];

$resultaat=$db->tafelnummer_toevoegen($categorienummer, $categorie);

if ( $resultaat == true ) {
  print ("Categorie is gewijzigd ");
}
else {print ("Het is niet gelukt om de categorie te wijzigen");}
?>
