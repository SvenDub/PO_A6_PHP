window.onload = function() {
	refresh();
};

refresh = function() {
	$("#liveticker").load("liveticker.php");
	setTimeout('refresh()', 3000);
};

versturen = function(var nr) 
	{
	$.post('livetickerquery.php', {
		bestellingnummer : nr
			}, function(data) {
				alert(data);
			});
	
	}
