<table>
<?php
require_once('../classes/DatabaseHandler.class.php');
$db=new DatabaseHandler(); 
$resultaat=$db->alle_bestellingen(0);
foreach($resultaat as $bestelling=>$data)  
{  echo '<tr><td>'.$data['nummer'].'</td><td>'.$data['bestellingnummer'].'</td><td>'.$data['id'].'</td><td>'.$data['productcode'].'</td><td>'.$data['aantal_besteld'].'</td><td>'.$data['opmerking'].'</td><td>'.$data['datum'].'</td><td>'.$data['status'].'</td></tr>';  }

?>
</table>
