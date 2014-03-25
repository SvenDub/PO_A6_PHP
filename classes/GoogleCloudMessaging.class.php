<?php
/**
 * Verzorgt alle verbindingen met de Google Cloud Messaging servers.
 *
 * @name GoogleCloudMessaging
 * @author Sven Dubbeld <sven.dubbeld1@gmail.com>
 */
class GoogleCloudMessaging {
	/**
	 * API key voor Google servers.
	 *
	 * @var string
	 */
	private $apiKey = 'AIzaSyDPUbKWK3BEI_P_Bu47tXjcFOMw-XhYTJU';
	
	/**
	 * Registratie id's waar het bericht voor bedoeld is.
	 *
	 * @var array
	 */
	private $registrationIDs = array ();
	
	/**
	 * Data om mee te sturen.
	 *
	 * @var array
	 */
	private $data = array ();
	
	/**
	 * URL om te gebruiken voor het versturen van berichten naar de Google servers.
	 *
	 * @var string
	 */
	private $sendUrl = 'https://android.googleapis.com/gcm/send';
	
	/**
	 * POST velden om mee te sturen.
	 *
	 * @var array
	 */
	private $fields = array ();
	
	/**
	 * Headers om mee te sturen.
	 *
	 * @var array
	 */
	private $headers = array ();
	
	/**
	 * De cURL handle om te gebruiken.
	 *
	 * @var cURL handle
	 */
	private $ch;
	
	/**
	 * Stelt parameters in voor de verbinding.
	 */
	function __construct() {
		
		// Mee te sturen headers
		$this->headers = array (
				'Authorization: key=' . $apiKey,
				'Content-Type: application/json' 
		);
		
		// Open verbinding
		$this->ch = curl_init ();
		
		// Stel URL in
		curl_setopt ( $ch, CURLOPT_URL, $url );
		
		// Gebruik POST
		curl_setopt ( $ch, CURLOPT_POST, true );
		
		// Stel headers in
		curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
		
		// Krijg antwoord terug als String
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
	}
	
	/**
	 * Stelt de registratie id's in waarvoor het bericht bedoeld is.
	 *
	 * @param array $ids        	
	 */
	function setRegistrationIDs($ids) {
		$this->registrationIDs = $ids;
	}
	
	/**
	 * Voegt de registratie id's toe waarvoor het bericht bedoeld is.
	 *
	 * @param array $ids        	
	 */
	function addRegistrationIDs($ids) {
		$this->registrationIDs = array_merge ( $this->registrationIDs, $ids );
	}
	
	/**
	 * Stelt de mee te sturen data in.
	 *
	 * @param array $data        	
	 */
	function setData($data) {
		$this->data = $data;
	}
	
	/**
	 * Voegt mee te sturen data toe.
	 *
	 * @param array $data        	
	 */
	function addData($data) {
		$this->data = array_merge ( $this->data, $data );
	}
	/**
	 * Stelt de POST velden in.
	 * 
	 * @param array $fields
	 */
	function setFields($fields = null) {
		$this->fields = array_merge ( array (
				'registration_ids' => $this->registrationIDs,
				'data' => $this->data 
		), $fields );
	}
	
	/**
	 * Voert het POST request uit.
	 * 
	 * @return string Het antwoord van de server.
	 */
	function execute() {
		return curl_exec($this->ch);
	}
	
	/**
	 * Verbreekt de verbinding.
	 */
	function __destruct() {
		curl_close($ch);
	}
}

?>