<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inloggen | Bolhoed</title>
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
					<li><a href="index.php">Home</a></li>
					<?php
					require_once 'classes/DatabaseHandler.class.php';
					$db = new DatabaseHandler ();
					if ($db->isIngelogd ()) {
						echo '<li class="current_page_item"><a>Uitloggen</a></li>';
						echo '<li><a href="liveticker">Bestellingen</a></li>';
						if ($db->isBeheerder ()) {
							echo '<li><a href="statistiek.php">Statistieken</a></li>';
							echo '<li><a href="beheer.php">Beheer</a></li>';
						}
					} else {
						echo '<li class="current_page_item"><a>Inloggen</a></li>';
					}
					?>
				</ul>
			</div>
		</div>

		<div id="main">
			<div id="welcome">
				<div class="title">
					<h2>Welkom</h2>
				</div>
				<?php
					$db->login ();
					if ($db->isIngelogd ()) {
						header ( 'Location: ./' );
					}
				?>
				<a href="?logout">Uitloggen</a>
			</div>
		</div>

	</div>
</body>
</html>
