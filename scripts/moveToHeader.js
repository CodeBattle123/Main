/**
 * Created by AsenJ.Mihaylov on 11/11/2016.
 */


let isActivated = false;

function makeLink(content) {
  var li = document.createElement("li");
  li.innerHTML = content;
  return li;
}

var questLinks =[
	makeLink("<a href=\"index.php\" class=\"tab\">Home</a>"),
    makeLink("<a href=\"choose-language.php\" class=\"tab\">Quests</a>"),
    makeLink("<a href=\"battlesequence.php\" class=\"tab\">Battle arena</a>"),
    makeLink("<a href=\"ranking.php\" class=\"tab\">Rankings</a>"),
    makeLink("<a href=\"clanPage.php\" class=\"tab\">Clan</a>"),
    makeLink("<a href=\"profile.php\" class=\"tab\">Profile</a>"),
    makeLink("<a href=\"AboutUs.php\" class=\"tab\">About</a>"),
    makeLink("<a href=\"contactus.php\" class=\"tab\">Contact us</a>")
];


function move() {
	var headerList = document.getElementById('list');

	if (document.getElementById("bod").clientWidth + 20 <= 800 ) {
		if (isActivated == false) {
			for (link of questLinks) {
				headerList.appendChild(link);
			}
			isActivated = true;
		}
	}
	else if (document.getElementById("bod").clientWidth + 20 > 800) {
		if (isActivated == true) {
			for (link of questLinks) {
				headerList.removeChild(link);
			}
			isActivated = false;
		}
	}
}
