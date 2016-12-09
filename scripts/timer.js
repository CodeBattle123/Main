function countdown() {
	var seconds = 60;
	function tick() {
		var counter = document.getElementById("counter");
		seconds--;

		counter.innerHTML = "0:" + (seconds < 10 ? "0" : "") + String(seconds)
		+"<br><input type='button' class='checkButton' id='submitQuest' value='check'><br><span id='result'>Result: </span>";

		if (seconds > 0) {
			let t = setTimeout(tick, 1000);
			$('#submitQuest').click(function () {
				clearTimeout(t);
			});
			$(document).keypress(function (k) {
				if (k.which == 13) {
					clearTimeout(t);
				}
			});
		} else {
			alert("Game over");
		}
	}
	tick();
}