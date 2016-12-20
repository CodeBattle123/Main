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
           <li class="btn" id="project-button"><a>About the project</a></li>
           <li class="btn" id="aboutus-button"><a>About us</a></li>
           <li class="btn" id="howto-button"><a>How it works</a></li>
       </ul>

      <section id="project">
          <h1>About the project</h1><hr>
          <div class="about_text">
              <p>
                  Lorem ipsum dolor sit amet, omittam repudiare at sed. Te eum sumo soleat feugait, eum te audire scribentur, scripta numquam oportere ea nec. Sit quas omnium invenire no, lorem doming graecis nec id, animal salutatus deterruisset cum id. Est cu utinam docendi inimicus. Sed no veniam diceret intellegam.
                  Eu quas eleifend laboramus mea, ei option quaeque dissentias pro. Porro integre ne ius, habeo verear vel ex, qui eligendi torquatos no. Sint inciderint sit cu, ea has meis legendos. Eu usu etiam voluptaria, et usu idque libris. Ei mei movet mucius.
                  Ei postea labitur mel, dictas petentium disputationi ad sea. Sit cibo dicant deseruisse cu, id summo viderer aliquando vis. Vel no malorum euismod, voluptatibus concludaturque te vix. Modo vidit intellegam his an.
              </p>
          </div>
      </section>

   <section id="aboutus">
       <h1>About us</h1><hr>
       <div class="about_text">
          <p>
               Lorem ipsum dolor sit amet, omittam repudiare at sed. Te eum sumo soleat feugait, eum te audire scribentur, scripta numquam oportere ea nec. Sit quas omnium invenire no, lorem doming graecis nec id, animal salutatus deterruisset cum id. Est cu utinam docendi inimicus. Sed no veniam diceret intellegam.
              Lorem ipsum dolor sit amet, omittam repudiare at sed. Te eum sumo soleat feugait, eum te audire scribentur, scripta numquam oportere ea nec. Sit quas omnium invenire no, lorem doming graecis nec id, animal salutatus deterruisset cum id. Est cu utinam docendi inimicus. Sed no veniam diceret intellegam.
              Eu quas eleifend laboramus mea, ei option quaeque dissentias pro. Porro integre ne ius, habeo verear vel ex, qui eligendi torquatos no. Sint inciderint sit cu, ea has meis legendos. Eu usu etiam voluptaria, et usu idque libris. Ei mei movet mucius.
              Ei postea labitur mel, dictas petentium disputationi ad sea. Sit cibo dicant deseruisse cu, id summo viderer aliquando vis. Vel no malorum euismod, voluptatibus concludaturque te vix. Modo vidit intellegam his an.
               Ea verear pericula instructior cum. In vel impedit salutatus abhorreant, alienum reprehendunt usu ei. Eu usu adhuc reque eirmod. No sed probo vocent veritus, deleniti splendide sadipscing ex nam. Cu iudico appellantur sit, mei et meis tincidunt consequuntur.
               </p>
           </div>
   </section>

      <section id="howto">
          <h1>How it works</h1><hr>
          <div class="about_text">
              <p>
                  We actually don't know :/
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
