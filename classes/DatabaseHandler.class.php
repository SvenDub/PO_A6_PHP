<?php
/**
 * Verzorgt alle verbindingen naar de database toe.
 * 
 * @name DatabaseHandler
 * @author Sven Dubbeld, Martijn de Munck, Stefan Peeman en Joris de Vogel <sven.dubbeld1@gmail.com>
 *
 */
class DatabaseHandler {
	
	/**
	 * Bevat de mysqli verbindings data.
	 *
	 * @var mysqli
	 */
	public $con;
	
	/**
	 * Maakt een nieuwe verbinding aan met de database.
	 */
	function __construct() {
		// Gegevens
		$host = 'localhost';
		$user = 'inf_po';
		$password = '6UEayPhcRr6bZZfX';
		$database = 'inf_kassa';
		
		// Maak verbinding
		$this->con = new mysqli ( $host, $user, $password, $database );
		
		// Verwerk errors
		if ($this->con->connect_errno) {
			echo 'Er is een fout opgetreden bij het verbinding maken met de database. Probeer het later opnieuw.';
			exit ();
		}
	}
	
	/**
	 * Verbreekt de verbinding met de database.
	 */
	function __destruct() {
		$this->con->kill ( $this->con->thread_id );
		$this->con->close ();
	}
	
	/**
	 * Een voorbeeld van een functie om een query uit te voeren.
	 *
	 * <p>Door gebruik te maken van mysqli_stmt met parameters is de verbinding beveiligd tegen SQL Injection.</p>
	 *
	 * @param String $d        	
	 * @param int $e        	
	 */
	function vb($d, $e) {
		// De te gebruiken query
		$query = "SELECT a, b FROM c WHERE d=? AND e=?";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'si', $d, $e )) {
				
				// Voer de query uit
				if ($stmt->execute ()) {
					
					// Bind de resultaten aan variabelen
					if ($stmt->bind_result ( $a, $b )) {
						
						// Haal alle resultaten op een loop er doorheen
						while ( $stmt->fetch () ) {
							// Doe iets met de resultaten
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
		} else {
			// Verwerk errors
			echo $stmt->error;
		}
		
		// Sluit het statement om geheugen vrij te geven
		$stmt->close ();
	}
	// Functie om producten toe te voegen
	function product_toevoegen($categorienummer, $gerecht, $prijs, $actief) {
		// De te gebruiken query
		$query = "INSERT INTO producten ( categorienummer, gerecht, prijs, actief )  VALUES ( ?, ?, ?, ? ) ";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'isdi', $categorienummer, $gerecht, $prijs, $actief )) {
				
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
	//Functie om klant toe te voegen
	function klant_toevoegen($id, $tafelnummer, $aantal_klanten, $actief, $datum) {
		// De te gebruiken query
		$query = "INSERT INTO tafelregistratie (  id, tafelnummer, aantal_klanten, actief, datum )  VALUES (  ?, ?, ?, ?, ? ) ";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'iiiis', $id, $tafelnummer, $aantal_klanten, $actief, $datum )) {
				
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
	//Functie om tafelnummer toe te voegen 
	function tafelnummer_toevoegen($tafelnummer) {
		// De te gebruiken query
		$query = "INSERT INTO tafelnummer ( tafelnummer )  VALUES ( ? ) ";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'i', $tafelnummer )) {
				
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
	//Functie om categorie toe te voegen
	function categorie_toevoegen($categorienummer, $categorie) {
		// De te gebruiken query
		$query = "INSERT INTO categorie ( categorienummer, categorie )  VALUES ( ?, ? ) ";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'is', $categorienummer, $categorie )) {
				
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
	//Functie om bestelling toe te voegen
	function bestelling_toevoegen($nummer, $id, $productcode, $aantal_besteld, $opmerking, $datum) {
		// De te gebruiken query
		$query = "INSERT INTO bestellingen ( nummer, id, productcode, aantal_besteld, opmerking, datum )  VALUES ( ?, ?, ?, ?, ?, ? ) ";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'iiiiss', $nummer, $id, $productcode, $aantal_besteld, $opmerking, $datum )) {
				
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
	//Functie om personeel te wijzigen
	function personeel_wijzigen($id, $gebruikersnaam, $wachtwoord, $beheer, $actief) {
		// De te gebruiken query
		$query = " UPDATE inlogsysteem ( gebruikersnaam, wachtwoord, beheer, actief )  VALUES ( ?, ?, ?, ? ) 
		           WHERE id=?";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'ssiii', $gebruikersnaam, $wachtwoord, $beheer, $actief, $id )) {
				
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
	//Functie om product te wijzigen
	function product_wijzigen($productcode, $categorie, $gerecht, $prijs, $actief) {
		// De te gebruiken query
		$query = "UPDATE producten ( productcode, categorie, gerecht, prijs, actief )  VALUES ( ?, ?, ?, ?, ? ) 
		          WHERE productcode=?";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'issdi', $productcode, $categorie, $gerecht, $prijs, $actief )) {
				
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
	//Functie om klant te wijzigen
	function klant_wijzigen($nummer, $id, $tafelnummer, $aantal_klanten, $actief, $datum) {
		// De te gebruiken query
		$query = "UPDATE tafelregistratie ( id, tafelnummer, aantal_klanten, actief, datum )  VALUES (  ?, ?, ?, ?, ? ) 
		          WHERE nummer=?";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'iiiisi', $id, $tafelnummer, $aantal_klanten, $actief, $datum, $nummer )) {
				
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
	//Functie om tafelnummer te wijzigen
	function tafelnummer_wijzigen($tafelnummeroud, $tafelnummernieuw) {
		// De te gebruiken query
		$query = "UPDATE tafelnummer ( tafelnummer )  VALUES ( ? ) 
		          WHERE tafelnummer=?";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'ii', $tafelnummernieuw, $tafelnummeroud )) {
				
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
	//Functie om categorie te wijzigen
	function categorie_wijzigen($categorienummer, $categorie) {
		// De te gebruiken query
		$query = "UPDATE categorie ( categorienummer, categorie )  VALUES ( ?, ? )
		          WHERE categorienummer=?";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'is', $categorienummer, $categorie )) {
				
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
	//Functie om besteling te wijzigen
	function bestelling_wijzigen($nummer, $id, $productcode, $aantal_besteld, $opmerking, $datum, $bestellingnummer, $status) {
		// De te gebruiken query
		$query = "UPDATE bestellingen ( nummer, id, productcode, aantal_besteld, opmerking, datum, status )  VALUES ( ?, ?, ?, ?, ?, ?, ? ) 
		          WHERE bestellingnummer=?";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'iiiissii', $nummer, $id, $productcode, $aantal_besteld, $opmerking, $datum, $bestellingnummer, $status )) {
				
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
	//Functie om bestelling te verwijderen
	function bestelling_verwijderen($bestellingnummer) {
		// De te gebruiken query
		$query = "DELETE FROM bestellingen WHERE bestellingnummer=?";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'i', $bestellingnummer )) {
				
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
	//Functie om tafelnummer te verwijderen
	function tafelnummer_verwijderen($tafelnummer) {
		// De te gebruiken query
		$query = "DELETE FROM tafelnummer WHERE tafelnummer=?";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'i', $tafelnummer )) {
				
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
	//Functie om klant te verwijderen
	function klant_verwijderen($nummer) {
		// De te gebruiken query
		$query = "DELETE FROM tafelregistratie WHERE nummer=?";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'i', $nummer )) {
				
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
	// funcite voor de beheerder om te kijken naar het aantal klanten 
	function klanten_totaal($nummer, $id, $tafelnummer, $aantal_klanten, $actief, $datum) {
		// De te gebruiken query
		$query = "SELECT SUM(aantal_klanten) AS klanten_totaal
		          FROM tafelregistratie 
		          ";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'iiiisi', $id, $tafelnummer, $aantal_klanten, $actief, $datum, $nummer )) {
				
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
	// functie voor alle tafelnummers
	function tafelnummers() {
		$array = array ();
		// De te gebruiken query
		$query = "SELECT tafelnummer FROM tafelnummer";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voer de query uit
			if ($stmt->execute ()) {
				
				// Bind de resultaten aan variabelen
				if ($stmt->bind_result ( $tafelnummer )) {
					
					// Haal alle resultaten op een loop er doorheen
					while ( $stmt->fetch () ) {
						array_push ( $array, $tafelnummer );
						// Doe iets met de resultaten
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
		return $array;
	}
	//functie voor alle gerechten in een categorie
	function gerechtenpercategorie($categorie) {
		$array = array ();
		// De te gebruiken query
		$query = "SELECT gerecht FROM producten WHERE categorie=?";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( "s", $categorie )) {
				
				// Voer de query uit
				if ($stmt->execute ()) {
					
					// Bind de resultaten aan variabelen
					if ($stmt->bind_result ( $gerecht )) {
						
						// Haal alle resultaten op een loop er doorheen
						while ( $stmt->fetch () ) {
							array_push ( $array, $gerecht );
							// Doe iets met de resultaten
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
		} else {
			// Verwerk errors
			echo $stmt->error;
		}
		
		// Sluit het statement om geheugen vrij te geven
		$stmt->close ();
		return $array;
	}
	// functie bestellingen per tafel 
	function bestellingpertafel($nummer) {
		$array = array ();
		// De te gebruiken query
		$query = "SELECT nummer, bestellingnummer, id, productcode, aantal_besteld, opmerking, datum, status FROM bestellingen 
				WHERE nummer=?";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( "i", $nummer )) {
				
				// Voer de query uit
				if ($stmt->execute ()) {
					
					// Bind de resultaten aan variabelen
					if ($stmt->bind_result ( $nummer, $bestellingnummer, $id, $productcode, $aantal_besteld, $opmerking, $datum, $status )) {
						
						// Haal alle resultaten op een loop er doorheen
						while ( $stmt->fetch () ) {
							$bestelling = array (
									'nummer' => $nummer,
									'bestellingnummer' => $bestellingnummer,
									'id' => $id,
									'productcode' => $productcode,
									'aantal_besteld' => $aantal_besteld,
									'opmerking' => $opmerking,
									'datum' => $datum,
									'status' => $status 
							);
							
							array_push ( $array, $bestelling );
							// Doe iets met de resultaten
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
		} else {
			// Verwerk errors
			echo $stmt->error;
		}
		
		// Sluit het statement om geheugen vrij te geven
		$stmt->close ();
		return $array;
	}
	/**
	 * Controleert de inloggegevens.
	 *
	 * @param String $gebruikersnaam        	
	 * @param String $wachtwoord        	
	 * @return array boolean met de gegevens van de gebruiker bij succes, anders false
	 */
	function controleerLogin($gebruikersnaam, $wachtwoord) {
		$array = array ();
		// De te gebruiken query
		$query = "SELECT id, gebruikersnaam, wachtwoord, beheer, actief FROM inlogsysteem WHERE gebruikersnaam=?";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( "s", $gebruikersnaam )) {
				
				// Voer de query uit
				if ($stmt->execute ()) {
					
					// Bind de resultaten aan variabelen
					if ($stmt->bind_result ( $id, $db_gebruikersnaam, $db_wachtwoord, $beheer, $actief )) {
						
						// Haal alle resultaten op een loop er doorheen
						while ( $stmt->fetch () ) {
							if (crypt ( $wachtwoord, $db_wachtwoord ) == $db_wachtwoord) {
								$array = array (
										'id' => $id,
										'gebruikersnaam' => $db_gebruikersnaam,
										'beheer' => $beheer,
										'actief' => $actief 
								);
							} else {
								$array = false;
							}
							// Doe iets met de resultaten
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
		} else {
			// Verwerk errors
			echo $stmt->error;
		}
		
		// Sluit het statement om geheugen vrij te geven
		$stmt->close ();
		return $array;
	}
	/**
	 * Logt de gebruiker in als er logingegevens zijn gevonden.
	 *
	 * De logingegevens moeten via een POST request ingevoerd worden in het volgende formaat:
	 * <code>
	 * $_POST['login']['gebruikersnaam'] = $gebruikersnaam;
	 * $_POST['login']['wachtwoord'] = $wachtwoord;
	 * </code>
	 * Laat een loginscherm zien als er nog niet ingelogd is.
	 */
	function login() {
		session_start ();
		if (isset ( $_GET ['logout'] )) { // Log de gebruiker uit
			$_SESSION = array ();
			session_destroy ();
			header ( 'Location: ?' );
		} elseif (! isset ( $_SESSION ['logged_in'] ) || ! $_SESSION ['logged_in']) { // Gebruiker is niet ingelogd
			if (isset ( $_POST ['login'] ['gebruikersnaam'] ) && isset ( $_POST ['login'] ['wachtwoord'] )) { // Login data found
				$gebruikersnaam = $_POST ['login'] ['gebruikersnaam'];
				$wachtwoord = $_POST ['login'] ['wachtwoord'];
				if (self::controleerLogin ( $gebruikersnaam, $wachtwoord )) { // Controleer logingegevens
				                                                              // OK!
					session_regenerate_id ();
					$session = session_get_cookie_params ();
					setcookie ( session_name (), session_id (), $session ['lifetime'], $session ['path'], $session ['domain'], false, true );
					$_SESSION ['logged_in'] = 1;
					$_SESSION ['gebruikersnaam'] = $gebruikersnaam;
				} else {
					// Verwijs naar loginpagina
					$_SESSION = array ();
					session_destroy ();
					header ( 'Location: ?error=1' );
				}
			} else { // Geen logingegevens gevonden, verwijs naar loginpagina
				$_SESSION = array ();
				session_destroy ();
				require_once 'login.php';
				die ();
			}
		} else {
			// Gebruiker is ingelogd, vernieuw sessie voor de veiligheid
			session_regenerate_id ();
			$session = session_get_cookie_params ();
			setcookie ( session_name (), session_id (), $session ['lifetime'], $session ['path'], $session ['domain'], false, true );
		}
	}
	/**
	 * Controleert of de gebruiker is ingelogd.
	 * 
	 * @return boolean
	 */
	function isIngelogd() {
		session_start();
		return (! isset ( $_SESSION ['logged_in'] ) || ! $_SESSION ['logged_in']);
	}
	/**
	 * Voegt een gebruiker toe aan de database.
	 *
	 * @param String $gebruikersnaam        	
	 * @param String $wachtwoord        	
	 * @param boolean $beheer
	 *        	True voor beheerder.
	 * @param boolean $actief
	 *        	True voor actieve gebruiker.
	 */
	function voegGebruikerToe($gebruikersnaam, $wachtwoord, $beheer, $actief) {
		$success = false;
		
		$salt = sprintf ( "$2a$%02d$", 10 ) . strtr ( base64_encode ( mcrypt_create_iv ( 16, MCRYPT_DEV_URANDOM ) ), '+', '.' ); // Password salt
		
		$hash = crypt ( $password, $salt ); // Encrypt wachtwoord
		
		$query = "INSERT INTO inlogsysteem (gebruikersnaam, wachtwoord, beheer, actief) VALUES (?,?,?,?)";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'ssii', $gebruikersnaam, $hash, $beheer, $actief )) {
				
				// Voer de query uit
				if ($stmt->execute ()) {
					
					if ($stmt->affected_rows > 0) {
						$success = true;
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
		} else {
			// Verwerk errors
			echo $stmt->error;
		}
		
		// Sluit het statement om geheugen vrij te geven
		$stmt->close ();
		if ($success) {
			return true;
		} else {
			return false;
		}
	}
	//functie die alle bestellingen weergeeft
	function alle_bestellingen($status) {
		$array = array ();
		// De te gebruiken query
		$query = "SELECT nummer, bestellingnummer, id, productcode, aantal_besteld, opmerking, datum, status FROM bestellingen WHERE status=? ";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'i', $status )) {
				
				// Voer de query uit
				if ($stmt->execute ()) {
					
					// Bind de resultaten aan variabelen
					if ($stmt->bind_result ( $nummer, $bestellingnummer, $id, $productcode, $aantal_besteld, $opmerking, $datum, $dbstatus )) {
						
						// Haal alle resultaten op een loop er doorheen
						while ( $stmt->fetch () ) {
							$bestelling = array (
									'nummer' => $nummer,
									'bestellingnummer' => $bestellingnummer,
									'id' => $id,
									'productcode' => $productcode,
									'aantal_besteld' => $aantal_besteld,
									'opmerking' => $opmerking,
									'datum' => $datum,
									'status' => $dbstatus 
							);
							
							array_push ( $array, $bestelling );
							// Doe iets met de resultaten
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
		} else {
			// Verwerk errors
			echo $stmt->error;
		}
		
		// Sluit het statement om geheugen vrij te geven
		$stmt->close ();
		return $array;
	}
	
	/**
	 * Haalt de gegevens van een personeelslid.
	 *
	 * @param String $gebruikersnaam
	 *        	De gebruikersnaam van het personeelslid.
	 * @return array De gegevens van het personeelslid.
	 */
	function getPersoneelByGebruikersnaam($gebruikersnaam) {
		// De te gebruiken query
		$query = "SELECT id, beheer, actief FROM inlogsysteem WHERE gebruikersnaam=? ";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 's', $gebruikersnaam )) {
				
				// Voer de query uit
				if ($stmt->execute ()) {
					
					// Bind de resultaten aan variabelen
					if ($stmt->bind_result ( $id, $beheer, $actief )) {
						
						// Haal alle resultaten op een loop er doorheen
						if ($stmt->fetch ()) {
							$personeel = array (
									'id' => $id,
									'gebruikersnaam' => $gebruikersnaam,
									'beheer' => $beheer,
									'actief' => $actief 
							);
							
							// Doe iets met de resultaten
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
		} else {
			// Verwerk errors
			echo $stmt->error;
		}
		
		// Sluit het statement om geheugen vrij te geven
		$stmt->close ();
		return $personeel;
	}
	/**
	 * Geeft aan of een gebruiker beheerder is.
	 *
	 * @param String $gebruikersnaam
	 *        	De gebruikersnaam van het personeelslid. Als er geen gebruiker is gegeven dan wordt de ingelogde gebruiker gebruikt.
	 * @return boolean True als de gebruiker een beheerder is
	 */
	function isBeheerder($gebruikersnaam = null) {
		
		session_start();
		// Val terug naar de ingelogde gebruiker als er geen gebruiker is opgegeven
		if ($gebruikersnaam == null) {
			$gebruikersnaam = $_SESSION ['gebruikersnaam'];
		}
		
		// De te gebruiken query
		$query = "SELECT beheer FROM inlogsysteem WHERE gebruikersnaam=? ";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 's', $gebruikersnaam )) {
				
				// Voer de query uit
				if ($stmt->execute ()) {
					
					// Bind de resultaten aan variabelen
					if ($stmt->bind_result ( $beheer )) {
						
						// Haal alle resultaten op een loop er doorheen
						if ($stmt->fetch ()) {
							// Doe iets met de resultaten
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
		} else {
			// Verwerk errors
			echo $stmt->error;
		}
		
		// Sluit het statement om geheugen vrij te geven
		$stmt->close ();
		return $beheer;
	}
	/**
	 * Geeft aan of een tafel bezet is.
	 *
	 * @param int $tafelnummer
	 *        	Het nummer van de tafel.
	 * @return boolean True als de tafel bezet is.
	 */
	function isTafelBezet($tafelnummer) {
		$bezet = false;
		
		// De te gebruiken query
		$query = "SELECT * FROM tafelregistratie WHERE tafelnummer=?";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'i', $tafelnummer )) {
				
				// Voer de query uit
				if ($stmt->execute ()) {
					
					// Sla het resultaat op
					$stmt->store_result ();
					
					// Tel het aantal rijen
					if ($stmt->num_rows == 0) {
						$bezet = false;
					} else {
						$bezet = true;
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
		return $bezet;
	}
	//functie voor beheerder om te kiken naar het aantal klanten in een bepaalde periode
	function klantenPerPeriode($begin, $eind) {
		// De te gebruiken query
		$query = "SELECT SUM(aantal_klanten) AS klanten_per_periode
		          FROM tafelregistratie WHERE datum BETWEEN ? AND ?
		          ";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'ss', $begin, $eind )) {
				
				// Voer de query uit
				if ($stmt->execute ()) {
					
					// Bind de resultaten aan variabelen
					if ($stmt->bind_result ( $klanten )) {
						
						// Haal alle resultaten op een loop er doorheen
						if ($stmt->fetch ()) {
							// Doe iets met de resultaten
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
		} else {
			// Verwerk errors
			echo $stmt->error;
		}
		
		// Sluit het statement om geheugen vrij te geven
		$stmt->close ();
		return $klanten;
	}
	//functie voor de beheerder om de totale omzet weer te geven 
	function totaleOmzet() {
		// De te gebruiken query
		$query = "SELECT SUM (A.aantal_besteld * B.prijs) AS totale_omzet
		          FROM bestellingen A, producten B
		          WHERE A.productcode = B.productcode
				";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			
			// Voer de query uit
			if ($stmt->execute ()) {
				
				// Bind de resultaten aan variabelen
				if ($stmt->bind_result ( $omzet )) {
						
					// Haal alle resultaten op een loop er doorheen
					if ($stmt->fetch ()) {
						// Doe iets met de resultaten
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
		return $omzet;
	}
	//functie voor de beheerder om de omzet in een bepaalde periode weer te geven 
	function omzetPerPeriode($begin, $eind) {
		// De te gebruiken query
		$query = "SELECT SUM (A.aantal_besteld * B.prijs) AS omzet_per_periode
		          FROM bestelllingen A, producten B
		          WHERE (A.productcode = B.productcode) AND (A.datum BETWEEN ? AND ?)
				";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			
			// Voer de query uit
			if ($stmt->execute ()) {
				
				// Bind de resultaten aan variabelen
				if ($stmt->bind_result ( $omzet )) {
						
					// Haal alle resultaten op een loop er doorheen
					if ($stmt->fetch ()) {
						// Doe iets met de resultaten
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
		return $omzet;
	}
	
	/**
	 * Haalt alle producten op.
	 *
	 * @return array Producten
	 */
	function getProducten() {
		$array = array ();
		// De te gebruiken query
		$query = "SELECT productcode, categorienummer, gerecht, prijs, actief FROM producten";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voer de query uit
			if ($stmt->execute ()) {
				
				// Bind de resultaten aan variabelen
				if ($stmt->bind_result ( $productcode, $categorienummer, $gerecht, $prijs, $actief )) {
					
					// Haal alle resultaten op een loop er doorheen
					while ( $stmt->fetch () ) {
						$product = array (
								'productcode' => $productcode,
								'categorienummer' => $categorienummer,
								'gerecht' => $gerecht,
								'prijs' => $prijs,
								'actief' => $actief 
						);
						
						array_push ( $array, $product );
						// Doe iets met de resultaten
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
		return $array;
	}
	function omzetperklant() {
		return self::totaleOmzet () / self::klanten_totaal ();
	}
}
