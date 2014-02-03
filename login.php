<!DOCTYPE html > 
<html>
<head>
<link href="opmaak.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Inloggen</title>
</head>
<body>
<h1> Inloggen</h1>
<?php 
if (isset($_GET['error'])) {
	switch ($_GET['error']) {
		case 1:
			echo '<p>De ingevoerde gegevens zijn niet correct.</p>';
			break;
		default:
			echo '<p>Er is een fout opgetreden.</p>';
			break;
	}
}
?>

<form name="inloggen" method="post" action="?">
Gebruikersnaam:
<input name="login[gebruikersnaam]" type="text" id="gebruikersnaam" />
<br />
Wachtwoord:    
<input name="login[wachtwoord]" type="password" id="wachtwoord" />
<br />
<input type="submit" name="Submit" value="Inloggen" />
</form>

</body>
</html>
