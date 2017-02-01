<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-16">
    <title>About us</title>
    <link rel="stylesheet" type="text/css" href="styles/headerAndFooter.css">
    <link rel="stylesheet" type="text/css" href="styles/sidebar.css">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
	<link rel="stylesheet" type="text/css" href="styles/aboutusstyle.css">
    <link rel="icon" type="image/png" href="images/icon.png"/>
    <script type="text/javascript" src="scripts/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="scripts/switch.js"></script>
</head>
<body>
<?php include 'header.php' ?>

<div class="wrapper">
       <ul class="paginator" id="paginator-btn">
		   <!--  Buttons for Scrolling through the information. -->
           <li class="btn p15" id="project-button"><a>About the project</a></li>
           <li class="btn p30" id="aboutus-button"><a>About us</a></li>
           <li class="btn p15" id="howto-button"><a>How it works</a></li>
       </ul>

		<section id="project">
		  	<h1>About the project</h1><hr>
		  	<div class="about_text">
		      	<p>
		          	The project is made by using the very basics of PHP, JS, HTML, CSS. You could say that it's build from scratch. The project took about a month to make. It has clan-making and a ranking system for the competitive type, both for individual players and for whole clans.<br>
					Overall it's a fun little project we made for our course at <a href="http://www.softuni.bg">SoftUni</a>.
		      	</p>
		  	</div>
		</section>

   <section id="aboutus">
       	<h1>About us</h1><hr>
       	<div class="about_text">
          	<p>
               	
           	</p>
        </div>
   </section>

		<section id="howto">
			<h1>How it works</h1><hr>
			<div class="about_text">
				<p>
					You make youself a user account and then you choose what to do.<br><br>
					<span>
						- Do the exsercises. <br>
						- Compare your knowledge with others with quizes.(Comming soon) <br>
						- Create a clan with your friends and compete in the rakings <br>
					</span>
				</p>
			</div>
		</section>
</div>

<?php if (!$logged): ?>
	<style>
		.wrapper {
			width: 100%;
		}
	</style>
<?php endif; ?>
<?php include 'footer.html' ?>
</body>
</html>
