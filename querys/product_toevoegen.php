<?php

require_once('classes/DatabaseHandler.class.php');
$db=new DatabaseHandler(); 

$db->login(); 

$categorienummer=$_POST["categorienummer"];
$gerecht=$_POST["gerecht"];
$prijs=$_POST["prijs"];
$actief=$_POST["actief"];

$resultaat=$db->product_toevoegen($categorienummer, $gerecht, $prijs, $actief)

if ( $resultaat == true ) {
  print ("Product succesvol toegevoegd");
}
else {print ("Het is niet gelukt om het product toe te voegen");}
?>


