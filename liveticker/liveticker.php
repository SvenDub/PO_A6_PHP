<table>
	<tr>
		<td>Tafel</td>
		<td>Bestelling</td>
		<td>ID</td>
		<td>Productcode</td>
		<td>Product</td>
		<td>Aantal</td>
		<td>Opmerking</td>
		<td>Datum</td>
	</tr>
	<?php
	require_once ('../classes/DatabaseHandler.class.php');
	$db = new DatabaseHandler ();
	$resultaat = $db->alle_bestellingen ( 0 );
	foreach ( $resultaat as $bestelling => $data ) {
		echo '<tr><td>' . $data ['tafelnummer'] . '</td><td>' . $data ['bestellingnummer'] . '</td><td>' . $data ['id'] . '</td><td>' . $data ['productcode'] . '</td><td>' . $data ['product'] . '</td><td>' . $data ['aantal_besteld'] . '</td><td>' . $data ['opmerking'] . '</td><td>' . $data ['datum'] . '</td><td><button onclick="versturen(' . $data ['bestellingnummer'] . ')">Gerecht is klaar</button></td></tr>';
	}
	
	?>
</table>
