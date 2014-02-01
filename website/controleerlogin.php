<!DOCTYPE html > 
<html>
<head>
<link href="opmaak.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>controleerlogin</title>
</head>
<body>

<?php

require_once('../classes/DatabaseHandler.class.php');
$db=new DatabaseHandler(); 
$db->controleerLogin($gebruikersnaam, $wachtwoord);

$_POST['login']['gebruikersnaam'] = $gebruikersnaam;
$_POST['login']['wachtwoord'] = $wachtwoord;
$db->login();
</body>
</html>