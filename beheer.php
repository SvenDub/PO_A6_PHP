<?php
require_once ('classes/DatabaseHandler.class.php');
$db = new DatabaseHandler ();

$db->login ();
/* De databasehandlerclass wordt aangeroepen, daarna wordt doormiddel van deze databasehandlerclass het loginscript 
opgehaald. Er wordt daarmee gecontroleerd of een gebruiker is ingelogd, anders kan de gebruiker deze pagina niet bekijken.
*/
?>
<!DOCTYPE html >
<html>
<head>
<link href="opmaak.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Beheer</title>
</head>
<body>
	<h1>Beheerpagina</h1>

	<a href="statistiek.php">Statistieken</a>
	<br />
	<a href="database_aanpassen.php">Database aanpassen</a>
</body>
</html>
