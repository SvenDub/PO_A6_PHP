var execute;

// Begin de 'refresh cycle' zodra de pagina laadt
window.onload = function() {
	// Start de cycle met 3000ms interval
	execute = setInterval("refresh()", 3000);
};

// Haal de tabel met bestellingen op
refresh = function() {
	$("#liveticker").load("liveticker.php");
};

// Zet een bestelling klaar om opgehaald te worden
versturen = function(nr) {
	$.post('livetickerquery.php', {
		bestellingnummer : nr
	}, function(data) {
		refresh();
	});

};