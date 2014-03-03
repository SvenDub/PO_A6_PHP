<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home | Bolhoed</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
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
					<li class="current_page_item"><a>Home</a></li>
					<?php
					require_once 'classes/DatabaseHandler.class.php';
					$db = new DatabaseHandler ();
					if ($db->isIngelogd ()) {
						echo '<li><a href="inloggen.php?logout">Uitloggen</a></li>';
						echo '<li><a href="liveticker">Bestellingen</a></li>';
						if ($db->isBeheerder ()) {
							echo '<li><a href="statistiek.php">Statistieken</a></li>';
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
			<div id="banner">
				<img src="bolhoed.png" alt="" class="image-full" />
			</div>
			<div id="welcome">
				<div class="title">
					<h2>Welkom bij het kassasysteem van de Bolhoed</h2>
					<span class="byline">Hier vindt u alle beschikbare informatie</span>
				</div>
			</div>
		</div>

	</div>
</body>
</html>
