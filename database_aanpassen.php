<?php

require_once('classes/DatabaseHandler.class.php');
$db=new DatabaseHandler(); 

$db->login();

?>
<!DOCTYPE html > 
<html>
<head>
<link href="opmaak.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Beheer database</title>
</head>
<body>
<h1> Beheer database</h1>

<a href="beheerquerys/product_toevoegena.php">Product toevoegen</a><br />
</body>
</html>