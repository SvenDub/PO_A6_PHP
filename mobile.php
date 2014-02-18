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
		case 'login' :
			
			// Login
			
			if ($db->controleerLogin ( $gebruikersnaam, $wachtwoord )) {
				
				$gebruiker = $db->getPersoneelByGebruikersnaam ( $gebruikersnaam );
				
				$response ['user'] ['id'] = $gebruiker ['id'];
				$response ['user'] ['gebruikersnaam'] = $gebruikersnaam;
				$response ['user'] ['wachtwoord'] = $wachtwoord;
				$response ['user'] ['beheer'] = $gebruiker ['beheer'];
				$response ['user'] ['actief'] = $gebruiker ['actief'];
				
				$response ['success'] = 1;
			} else {
				
				$response ['error'] = 2;
				$response ['error_msg'] = 'Inloggegevens incorrect.';
			}
			break;
		case 'tafel_status' :
			
			// Tafel status
			
			if ($db->controleerLogin ( $gebruikersnaam, $wachtwoord )) {
				
				// Haal alle tafels op
				$tafels = $db->tafelnummers ();
				
				foreach ( $tafels as $id ) {
					
					// Kijk bij elke tafel of deze bezet is
					if ($db->isTafelBezet ( $id )) {
						$status = 1;
					} else {
						$status = 0;
					}
					
					$response ['tafels'] [$id] = $status;
				}
				
				$response ['success'] = 1;
			} else {
				
				$response ['error'] = 2;
				$response ['error_msg'] = 'Inloggegevens incorrect.';
			}
			break;
		case 'producten' :
			
			// Producten
			
			if ($db->controleerLogin ( $gebruikersnaam, $wachtwoord )) {
				
				// Haal alle producten op
				$producten = $db->getProducten ();
				
				foreach ( $producten as $product ) {
					
					$response ['producten'] [$product ['productcode']] ['categorienummer'] = $product ['categorienummer'];
					$response ['producten'] [$product ['productcode']] ['gerecht'] = utf8_encode ( $product ['gerecht'] );
					$response ['producten'] [$product ['productcode']] ['prijs'] = $product ['prijs'];
					$response ['producten'] [$product ['productcode']] ['actief'] = $product ['actief'];
				}
				
				$response ['success'] = 1;
			} else {
				
				$response ['error'] = 2;
				$response ['error_msg'] = 'Inloggegevens incorrect.';
			}
			break;
		default :
			
			// Onbekende tag, geef error terug
			
			$response ['error_msg'] = 'Tag niet gevonden.';
			$response ['error'] = 1;
	}
	
	// Stuur antwoord
	echo json_encode ( $response );
} else {
	
	// Geen tag meegestuurd, geef error terug
	
	$response ['error_msg'] = 'Tag niet gevonden.';
	$response ['error'] = 1;
	echo json_encode ( $response );
}

?>