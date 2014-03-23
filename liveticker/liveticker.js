/**
 * Begint de 'refresh cycle' zodra de pagina laadt.
 */
window.onload = function() {
	// Start de cycle met 3000ms interval
	setInterval("refresh()", 3000);
};

/**
 * Haalt de tabel met bestellingen op.
 */
function refresh() {
	$("#liveticker").load("liveticker.php");
};

/**
 * Zet een bestelling klaar om opgehaald te worden.
 * 
 * @param nr
 *            Het nummer van de bestelling
 */
function versturen(nr) {
	$.post('livetickerquery.php', {
		bestellingnummer : nr
	}, function(data) {
		refresh();
	});

};