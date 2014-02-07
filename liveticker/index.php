<?php

require_once('../classes/DatabaseHandler.class.php');
$db=new DatabaseHandler(); 

$db->login();

?>
<!DOCTYPE html > 
<html>
<head>
<link href="opmaak.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>liveticker</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="liveticker.js"></script>
</head>
<body>
<h1> Liveticker </h1>
<div id='liveticker'>
<table>
<tr><td>Nummer</td><td>Bestellignnummer</td><td>id</td><td>Productcode</td><td>Aantal Besteld</td><td>Opmerking</td><td>Datum</td><td>Status</td></tr>

<?php

$resultaat=$db->alle_bestellingen(0);
foreach($resultaat as $bestelling=>$data)
  {
  echo '<tr><td>'.$data['nummer'].'</td><td>'.$data['bestellingnummer'].'</td><td>'.$data['id'].'</td><td>'.$data['productcode'].'</td><td>'.$data['aantal_besteld'].'</td><td>'.$data['opmerking'].'</td><td>'.$data['datum'].'</td><td>'.$data['status'].'</td></tr>';
  }
?>
</table>
</div>
<a href="?logout">uitloggen<a/>
</body>
</html>
