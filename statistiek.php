<?php
require_once ('classes/DatabaseHandler.class.php');
$db = new DatabaseHandler ();

$db->login ();
/* De databasehandlerclass wordt aangeroepen, daarna wordt doormiddel van deze databasehandlerclass het loginscript 
opgehaald. Er wordt daarmee gecontroleerd of een gebruiker is ingelogd, anders kan de gebruiker deze pagina niet bekijken.
*/
?>
