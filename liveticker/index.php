<?php
require_once ('../classes/DatabaseHandler.class.php');
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
<title>Bestellingen | Bolhoed</title>
<link
	href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900"
	rel="stylesheet" />
<link href="../opmaak.css" rel="stylesheet" type="text/css" media="all" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="liveticker.js"></script>
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
					<li><a href="../index.php">Home</a></li>
					<?php
					if ($db->isIngelogd ()) {
						echo '<li><a href="../inloggen.php?logout">Uitloggen</a></li>';
						echo '<li class="current_page_item"><a>Bestellingen</a></li>';
						if ($db->isBeheerder ()) {
							echo '<li><a href="../statistiek.php">Statistieken</a></li>';
						}
					} else {
						echo '<li><a href="../inloggen.php">Inloggen</a></li>';
					}
					?>
				</ul>
			</div>
		</div>

		<div id="main">
			<h2>Bestellingen</h2>
			<div id='liveticker'>
				<table>
					<tr>
						<td>Nummer</td>
						<td>Bestellingnummer</td>
						<td>ID</td>
						<td>Productcode</td>
						<td>Aantal Besteld</td>
						<td>Opmerking</td>
						<td>Datum</td>
						<td>Status</td>
					</tr>
	
				<?php
			
				$resultaat = $db->alle_bestellingen ( 0 );
				foreach ( $resultaat as $bestelling => $data ) {
					echo '<tr><td>' . $data ['nummer'] . '</td><td>' . $data ['bestellingnummer'] . '</td><td>' . $data ['id'] . '</td><td>' . $data ['productcode'] . '</td><td>' . $data ['aantal_besteld'] . '</td><td>' . $data ['opmerking'] . '</td><td>' . $data ['datum'] . '</td><td>' . $data ['status'] . '</td></tr>';
				}
				/*
				 * Het resultaat van de Liveticker wordt doormiddel van deze constructie in een tabel geplaatst. De code is zo geschreven dat elke variabele een aparte kolom heeft en elke bestelling een aparte rij is.
				 */
				?>
				</table>
			</div>
		</div>

	</div>
</body>
</html>
