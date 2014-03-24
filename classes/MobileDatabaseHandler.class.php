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
	 * Voegt een registratie id toe aan een gebruiker.
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
}

?>