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
<title>Statistieken</title>
</head>
<body>
<h1>Klanten per periode</h1>
<table>
<?php
$klanten_3maanden=$db->klantenPerPeriode(date("Y-m-d"),date("Y-m-d",time()-8035200));
$klanten_6maanden=$db->klantenPerPeriode(date("Y-m-d",time()-8035200),date("Y-m-d",time()-16070400) );
$klanten_9maanden=$db->klantenPerPeriode(date("Y-m-d",time()-16070400),date("Y-m-d",time()-24105600) );
$klanten_12maanden=$db->klantenPerPeriode(date("Y-m-d",time()-24105600),date("Y-m-d",time()-32140800) );
$max=max($klanten_3maanden,$klanten_6maanden,$klanten_9maanden,$klanten_12maanden);
$breedte=300/$max;
print("<tr><td>afgelopen drie maanden</td><td>$klanten_3maanden</td><td><img src='blok.jpg' width='$breedte*$klanten_3maanden' height='40'></td></tr>");
print("<tr><td>maand 3 tot 6 geleden</td><td>$klanten_6maanden</td><td><img src='blok.jpg' width='$breedte*$klanten_6maanden' height='40'></td></tr>");
print("<tr><td>maand 6 tot 9 geleden</td><td>$klanten_9maanden</td><td><img src='blok.jpg' width='$breedte*$klanten_9maanden' height='40'></td></tr>");
print("<tr><td>maand 9 tot 12 geleden</td><td>$klanten_12maanden</td><td><img src='blok.jpg' width='$breedte*$klanten_12maanden' height='40'></td></tr>");
?>
</table>
<h1>Omzet per periode</h1>
<table>
<?php
$omzet_3maanden=$db->omzetPerPeriode(date("Y-m-d"),date("Y-m-d",time()-8035200));
$omzet_6maanden=$db->omzetPerPeriode(date("Y-m-d",time()-8035200),date("Y-m-d",time()-16070400) );
$omzet_9maanden=$db->omzetPerPeriode(date("Y-m-d",time()-16070400),date("Y-m-d",time()-24105600) );
$omzet_12maanden=$db->omzetPerPeriode(date("Y-m-d",time()-24105600),date("Y-m-d",time()-32140800) );
$max=max($omzet_3maanden,$omzet_6maanden,$omzet_9maanden,$omzet_12maanden);
$breedte=300/$max;
print("<tr><td>afgelopen drie maanden</td><td>$omzet_3maanden</td><td><img src='blok.jpg' width='$breedte*$omzet_3maanden' height='40'></td></tr>");
print("<tr><td>maand 3 tot 6 geleden</td><td>$omzet_3maanden</td><td><img src='blok.jpg' width='$breedte*$omzet_6maanden' height='40'></td></tr>");
print("<tr><td>maand 6 tot 9 geleden</td><td>$omzet_3maanden</td><td><img src='blok.jpg' width='$breedte*$omzet_9maanden' height='40'></td></tr>");
print("<tr><td>maand 9 tot 12 geleden</td><td>$omzet_3maanden</td><td><img src='blok.jpg' width='$breedte*$omzet_12maanden' height='40'></td></tr>");
?>
</table>
</body>
</html>
