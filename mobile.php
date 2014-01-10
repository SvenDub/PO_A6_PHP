<?php
/**
 * Mobile API
 * 
 * <p>
 * Dit script verwerkt verzoeken van de App en stuurt een reactie terug in JSON.
 * </p>
 * 
 * @author Sven Dubbeld <sven.dubbeld1@gmail.com>
 */

// Imports
require_once 'classes/MobileDatabaseHandler.class.php';

// Maak een nieuwe MobileDatabaseHandler aan
$db = new MobileDatabaseHandler ();

// Kijk of er een tag mee is gestuurd
if (isset ( $_POST ['tag'] ) && $_POST ['tag'] != '') {
	
	// Tag meegestuurd
	
	// Sla de meegestuurde gegevens op
	$tag = $_POST ['tag'];
	$gebruikersnaam = $_POST ['gebruikersnaam'];
	$wachtwoord = $_POST ['wachtwoord'];
	
	// Bereid een antwoord voor
	$response = array (
			'tag' => $tag,
			'success' => 0,
			'error' => 0 
	);
	
	// TODO: Verwerk verzoek
	switch ($tag) {
	}
} else {
	
	// Geen tag meegestuurd, geef error terug
	
	$response ['error_msg'] = 'Tag niet gevonden.';
	$response ['error'] = 1;
	echo json_encode ( $response );
}

?>