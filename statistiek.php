<?php
require_once ('classes/DatabaseHandler.class.php');
$db = new DatabaseHandler ();

$db->login ();
/*
 * De databasehandlerclass wordt aangeroepen, daarna wordt doormiddel van deze databasehandlerclass het loginscript opgehaald. Er wordt daarmee gecontroleerd of een gebruiker is ingelogd, anders kan de gebruiker deze pagina niet bekijken.
 */
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Statistieken | Bolhoed</title>
<link
	href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900"
	rel="stylesheet" />
<link href="opmaak.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<div id="page" class="container">

		<div id="header">
			<div id="logo">
				<h1>
					<a>Bolhoed</a>
				</h1>
			</div>
			<div id="menu">
				<ul>
					<li><a href="index.php">Home</a></li>
					<?php
					if ($db->isIngelogd ()) {
						echo '<li><a href="inloggen.php?logout">Uitloggen</a></li>';
						echo '<li><a href="liveticker">Bestellingen</a></li>';
						if ($db->isBeheerder ()) {
							echo '<li class="current_page_item"><a>Statistieken</a></li>';
							echo '<li><a href="beheer.php">Beheer</a></li>';
						}
					} else {
						echo '<li><a href="inloggen.php">Inloggen</a></li>';
					}
					?>
				</ul>
			</div>
		</div>

		<div id="main">
			<h1>Statistieken</h1>
			<h2>Klanten per periode</h2><br />
			<table>
			<?php
			$klanten_3maanden = $db->klantenPerPeriode ( date ( "Y-m-d", time () - 8035200 ), date ( "Y-m-d" ) );
			$klanten_6maanden = $db->klantenPerPeriode ( date ( "Y-m-d", time () - 16070400 ), date ( "Y-m-d", time () - 8035200 ) );
			$klanten_9maanden = $db->klantenPerPeriode ( date ( "Y-m-d", time () - 24105600 ), date ( "Y-m-d", time () - 16070400 ) );
			$klanten_12maanden = $db->klantenPerPeriode ( date ( "Y-m-d", time () - 32140800 ), date ( "Y-m-d", time () - 24105600 ) );
			/*
			 * Er worden variabelen aangemaakt voor de klanten in de periodes. Deze periodes zijn nu tot 3 maanden geleden, 3 tot 6 maanden geleden, 6 tot 9 maanden geleden en 9 maanden tot een jaar geleden.
			 */
			$max = max ( $klanten_3maanden, $klanten_6maanden, $klanten_9maanden, $klanten_12maanden );
			$breedte = 450 / $max;
			/*
			 * Er wordt om de grafieken goed te kunnen maken een maximale variabele gemaakt, deze wordt bepaald uit de variabele van klanten in de periode. Vervolgens wordt de breedte gedefinieerd door deze max waarde. Hierdoor krijg je verschillende staven in het staafdiagram.
			 */
			print ("<tr><td style='width: 200px'>afgelopen drie maanden</td><td style='width: 50px'>$klanten_3maanden</td><td><img src='blok.png'  style='float:left;' width='".$breedte*$klanten_3maanden."' height='40'></td></tr>") ;
			print ("<tr><td style='width: 200px'>maand 3 tot 6 geleden</td><td style='width: 50px'>$klanten_6maanden</td><td><img src='blok.png'   style='float:left;' width='".$breedte*$klanten_6maanden."' height='40'></td></tr>") ;
			print ("<tr><td style='width: 200px'>maand 6 tot 9 geleden</td><td style='width: 50px'>$klanten_9maanden</td><td><img src='blok.png'   style='float:left;' width='".$breedte*$klanten_9maanden."' height='40'></td></tr>") ;
			print ("<tr><td style='width: 200px'>maand 9 tot 12 geleden</td><td style='width: 50px'>$klanten_12maanden</td><td><img src='blok.png' style='float:left;' width='".$breedte*$klanten_12maanden."' height='40'></td></tr>") ;
			// De variablee worden dan weergegeven doormiddel van een printscript, de breedte varieert doordat de waarde van de variabelen anders zijn.
			?>
			</table>

			<h2>Omzet per periode</h2>
			<table>
			<?php
			$omzet_3maanden = $db->omzetPerPeriode ( date ( "Y-m-d", time () - 8035200 ), date ( "Y-m-d" )  );
			$omzet_6maanden = $db->omzetPerPeriode ( date ( "Y-m-d", time () - 16070400 ), date ( "Y-m-d", time () - 8035200 ) );
			$omzet_9maanden = $db->omzetPerPeriode ( date ( "Y-m-d", time () - 24105600 ), date ( "Y-m-d", time () - 16070400) );
			$omzet_12maanden = $db->omzetPerPeriode ( date ( "Y-m-d", time () - 32140800 ), date ( "Y-m-d", time () - 24105600 ) );
			/*
			 * Er worden variabelen aangemaakt voor de omzet in de periodes. Deze periodes zijn nu tot 3 maanden geleden, 3 tot 6 maanden geleden, 6 tot 9 maanden geleden en 9 maanden tot een jaar geleden.
			 */
			$max = max ( $omzet_3maanden, $omzet_6maanden, $omzet_9maanden, $omzet_12maanden );
			$breedte = 450 / $max;
			/*
			 * Er wordt om de grafieken goed te kunnen maken een maximale variabele gemaakt, deze wordt bepaald uit de variabele van de omzet in de periode. Vervolgens wordt de breedte gedefinieerd door deze max waarde. Hierdoor krijg je verschillende staven in het staafdiagram.
			 */
			print ("<tr><td style='width: 200px'>afgelopen drie maanden</td><td style='width: 50px'>&euro; $omzet_3maanden</td><td><img src='blok.png' style='float:left;' width='".$breedte*$omzet_3maanden."' height='40'></td></tr>") ;
			print ("<tr><td style='width: 200px'>maand 3 tot 6 geleden</td><td style='width: 50px'>&euro; $omzet_6maanden</td><td><img src='blok.png'  style='float:left;' width='".$breedte*$omzet_6maanden."' height='40'></td></tr>") ;
			print ("<tr><td style='width: 200px'>maand 6 tot 9 geleden</td><td style='width: 50px'>&euro; $omzet_9maanden</td><td><img src='blok.png'  style='float:left;' width='".$breedte*$omzet_9maanden."' height='40'></td></tr>") ;
			print ("<tr><td style='width: 200px'>maand 9 tot 12 geleden</td><td style='width: 50px'>&euro; $omzet_12maanden</td><td><img src='blok.png' style='float:left;' width='".$breedte*$omzet_12maanden."' height='40'></td></tr>") ;
			// De variablee worden dan weergegeven doormiddel van een printscript, de breedte varieert doordat de waarde van de variabelen anders zijn.
			?>
			</table>

			<h2>Totaal aantal klanten</h2><br />
			<?php
			$klanten_totaal = $db->klanten_totaal ();
			print ("Er zijn $klanten_totaal klanten geweest in het restaurant.") ;
			// Totaal aantal klanten wordt opgehaald uit de database, vervolgens wordt deze variable weergegeven.
			?>
			<br />
			<h2>Totale omzet</h2><br />
			<?php
			$totale_omzet = $db->totaleOmzet ();
			print ("De totale omzet is &euro; $totale_omzet.") ;
			// Totale omzet wordt opgehaald uit de database, vervolgens wordt deze variable weergegeven.
			?>
			<br />
			<h2>Gemiddelde omzet per klant</h2><br />
			<?php
			$omzetperklant = $db->omzetperklant ();
			print ("De gemiddelde omzet per klant is &euro; $omzetperklant.") ;
			// De omzet per klant wordt opgehaald uit de database, vervolgens wordt deze variable weergegeven.
			?>
		</div>

	</div>
</body>
</html>
