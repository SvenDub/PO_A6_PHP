<?php
/**
 * Verzorgt alle verbindingen naar de database toe.
 * 
 * @name DatabaseHandler
 * @author Sven Dubbeld <sven.dubbeld1@gmail.com>
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
	function personeel_toevoegen($id, $gebruikersnaam, $wachtwoord, $beheer, $actief) {
		// De te gebruiken query
		$query = "INSERT INTO inlogsysteem ( id, gebruikersnaam, wachtwoord, beheer, actief )  VALUES ( ?, ?, ?, ?, ? ) ";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'issii', $id, $gebruikersnaam, $wachtwoord, $beheer, $actief )) {
				
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
	function product_toevoegen($productcode, $categorie, $gerecht, $prijs, $actief) {
		// De te gebruiken query
		$query = "INSERT INTO producten ( productcode, categorie, geerechtrecht, prijs, actief )  VALUES ( ?, ?, ?, ?, ? ) ";
		
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
	function personeel_wijzigen($id, $gebruikersnaam, $wachtwoord, $beheer, $actief) {
		// De te gebruiken query
		$query = " UPDATE inlogsysteem ( id, gebruikersnaam, wachtwoord, beheer, actief )  VALUES ( ?, ?, ?, ?, ? ) 
		           WHERE id=?";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'issii', $id, $gebruikersnaam, $wachtwoord, $beheer, $actief )) {
				
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
	function tafelnummer_wijzigen($tafelnummer) {
		// De te gebruiken query
		$query = "UPDATE tafelnummer ( tafelnummer )  VALUES ( ? ) 
		          WHERE tafelnummer=?";
		
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
	function bestelling_wijzigen($nummer, $id, $productcode, $aantal_besteld, $opmerking, $datum, $bestellingnummer) {
		// De te gebruiken query
		$query = "UPDATE bestellingen ( nummer, id, productcode, aantal_besteld, opmerking, datum )  VALUES ( ?, ?, ?, ?, ?, ? ) 
		          WHERE bestellingnummer=?";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'iiiissi', $nummer, $id, $productcode, $aantal_besteld, $opmerking, $datum, $bestellingnummer )) {
				
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
	function bestelling_verwijderen($nummer, $id, $productcode, $aantal_besteld, $opmerking, $datum, $bestellingnummer) {
		// De te gebruiken query
		$query = "DELETE FROM bestellingen ( nummer, id, productcode, aantal_besteld, opmerking, datum )  VALUES ( ?, ?, ?, ?, ?, ? ) 
		          WHERE bestellingnummer=?";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ( 'iiiissi', $nummer, $id, $productcode, $aantal_besteld, $opmerking, $datum, $bestellingnummer )) {
				
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
	function tafelnummer_verwijderen($tafelnummer) {
		// De te gebruiken query
		$query = "DELETE FROM tafelnummer ( tafelnummer )  VALUES ( ? ) 
		          WHERE tafelnummer=?";
		
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
	function klant_verwijderen($nummer, $id, $tafelnummer, $aantal_klanten, $actief, $datum) {
		// De te gebruiken query
		$query = "DELETE FROM tafelregistratie ( id, tafelnummer, aantal_klanten, actief, datum )  VALUES (  ?, ?, ?, ?, ? ) 
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
	function tafelnummers() {
		$array = array ();
		// De te gebruiken query
		$query = "SELECT tafelnummer FROM tafelnummer";
		
		// Maak een nieuw statement
		$stmt = $this->con->stmt_init ();
		
		// Bereid de query voor
		if ($stmt->prepare ( $query )) {
			
			// Voeg de parameters toe
			if ($stmt->bind_param ()) {
				
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
		} else {
			// Verwerk errors
			echo $stmt->error;
		}
		
		// Sluit het statement om geheugen vrij te geven
		$stmt->close ();
		return $array;
	}
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
	function bestellingpertafel($nummer) {
		$array = array ();
		// De te gebruiken query
		$query = "SELECT nummer, bestellingnummer, id, productcode, aantal_besteld, opmerking, datum FROM bestellingen 
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
					if ($stmt->bind_result ( $nummer, $bestellingnummer, $id, $productcode, $aantal_besteld, $opmerking, $datum )) {
						
						// Haal alle resultaten op een loop er doorheen
						while ( $stmt->fetch () ) {
							$bestelling = array (
									'nummer' => $nummer,
									'bestellingnummer' => $bestellingnummer,
									'id' => $id,
									'productcode' => $productcode,
									'aantal_besteld' => $aantal_besteld,
									'opmerking' => $opmerking,
									'datum' => $datum 
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
	 * @return array|boolean Array met de gegevens van de gebruiker bij succes, anders false
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
			if ($stmt->bind_param ( "i", $nummer )) {
				
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
}
