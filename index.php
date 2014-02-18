<?php
require_once ('classes/DatabaseHandler.class.php');
$db = new DatabaseHandler ();

$db->login ();

?>
<html>
<head>
<title>PO Kassasysteem</title>
<link href="opmaak.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<p>De website van uw kassasysteem</p>
	<a href="?logout">uitloggen</a>

</body>
</html>
