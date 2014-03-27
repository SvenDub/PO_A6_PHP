<?php
// Imports
require_once 'classes/DatabaseHandler.class.php';

/**
 * Verzorgt alle verbindingen naar de database toe voor de mobiele app.
 *
 * @name Mobile DatabaseHandler
 * @author Sven Dubbeld <sven.dubbeld1@gmail.com>
 *        
 */
class MobileDatabaseHandler extends DatabaseHandler {
	/**
	 * Bepaalt of een registratie id al bestaat.
	 *
	 * @param string $regid
	 *        	Het registratie id.
	 * @return boolean
	 */
	function isGeregistreerd($regid) {
		$geregistreerd = false;
		
		// De te gebruiken query
		$query = "SELECT *
				FROM regids";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voer de query uit
			if ($stmt->execute ()) {
				
				// Sla het resultaat op
				$stmt->store_result ();
				
				// Tel het aantal rijen
				if ($stmt->num_rows == 0) {
					$geregistreerd = false;
				} else {
					$geregistreerd = true;
				}
			} else {
				// Verwerk errors
				echo $stmt->error;
			}
		} else {
			// Verwerk errors
			echo $stmt->error;
		}
		
		// Sluit het statement om geheugen vrij te geven
		$stmt->close ();
		return $geregistreerd;
	}
	
	/**
	 * Voegt een gebruiker toe aan een registratie id.
	 *
	 * @param int $id
	 *        	Het id van de gebruiker.
	 * @param string $regid
	 *        	Het registratie id om toe te voegen.
	 */
	function addRegistratieId($id, $regid) {
		// De te gebruiken query
		$query = "INSERT INTO regids ( id, regid )
				VALUES ( ?, ? )";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'is', $id, $regid )) {
				
				// Voer de query uit
				if ($stmt->execute ()) {
					
					if ($stmt->affected_rows > 0) {
						return true;
					} 

					else {
						return false;
					}
				} else {
					// Verwerk errors
					echo $stmt->error;
				}
			} else {
				// Verwerk errors
				echo $stmt->error;
			}
		} else {
			// Verwerk errors
			echo $stmt->error;
		}
		
		// Sluit het statement om geheugen vrij te geven
		$stmt->close ();
	}
	
	/**
	 * Werkt de gebruiker bij een registratie id bij.
	 *
	 * @param int $id
	 *        	Het id van de gebruiker.
	 * @param string $regid
	 *        	Het registratie id om te gebruiken.
	 */
	function updateRegistratieId($id, $regid) {
		// De te gebruiken query
		$query = "UPDATE regids
				SET id=?
				WHERE regid=?";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'is', $id, $regid )) {
				
				// Voer de query uit
				if ($stmt->execute ()) {
					
					if ($stmt->affected_rows > 0) {
						return true;
					} 

					else {
						return false;
					}
				} else {
					// Verwerk errors
					echo $stmt->error;
				}
			} else {
				// Verwerk errors
				echo $stmt->error;
			}
		} else {
			// Verwerk errors
			echo $stmt->error;
		}
		
		// Sluit het statement om geheugen vrij te geven
		$stmt->close ();
	}
	/**
	 * Wijzigt een bestelling in de database.
	 *
	 * @param $bestellingnummer Integer
	 *        	het bestellingnummer
	 * @param $aantal_besteld Integer
	 *        	het aantal besteld
	 * @param $opmerking String
	 *        	een opmerking over de bestelling
	 */
	function bestelling_wijzigen($bestellingnummer, $aantal_besteld, $opmerking) {
		// De te gebruiken query
		$query = "UPDATE bestellingen
				SET aantal_besteld=?, opmerking=?
				WHERE bestellingnummer=?";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'isi', $aantal_besteld, $opmerking, $bestellingnummer )) {
				
				// Voer de query uit
				if ($stmt->execute ()) {
					
					if ($stmt->affected_rows > 0) {
						return true;
					} 

					else {
						return false;
					}
				} else {
					// Verwerk errors
					echo $stmt->error;
				}
			} else {
				// Verwerk errors
				echo $stmt->error;
			}
		} else {
			// Verwerk errors
			echo $stmt->error;
		}
		
		// Sluit het statement om geheugen vrij te geven
		$stmt->close ();
	}
}

?>