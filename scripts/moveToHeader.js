/**
 * Created by AsenJ.Mihaylov on 11/11/2016.
 */


let isActivated = false;

var questLinks =[
document.createElement("li").textContent ="<li><a href=\"index.php\" class=\"tab\">Home</a></li>",
document.createElement("li").textContent ="<li><a href=\"choose-language.php\" class=\"tab\">Quests</a></li>",
document.createElement("li").textContent ="<li><a href=\"battlesequence.php\" class=\"tab\">Battle arena</a></li>",
document.createElement("li").textContent ="<li><a href=\"ranking.php\" class=\"tab\">Rankings</a></li>",
document.createElement("li").textContent ="<li><a href=\"clanPage.php\" class=\"tab\">Clan</a></li>",
document.createElement("li").textContent ="<li><a href=\"profile.php\" class=\"tab\">Profile</a></li>",
document.createElement("li").textContent ="<li><a href=\"AboutUs.php\" class=\"tab\">About</a></li>",
document.createElement("li").textContent ="<li><a href=\"contactus.php\" class=\"tab\">Contact us</a></li>"
];


function move() {
	var headerList = document.getElementById('list');

	if (document.getElementById("bod").clientWidth <= 800 ) {
		console.log("Width < 800");
		if (isActivated == false) {
			console.log("isActivated = " + isActivated);
			for (link of questLinks) {
				console.log("There he is.");
				headerList.appendChild(link);
			}
			isActivated = true;
		}

	}
}
