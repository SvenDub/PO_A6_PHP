window.onload = function() {
	refresh();
};

refresh = function() {
	$("#liveticker").load("liveticker.php");
	setTimeout('refresh()', 3000);
};
