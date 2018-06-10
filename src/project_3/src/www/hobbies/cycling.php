<?php
  require_once(__DIR__."../../../php/content_generators/PageGenerator.php");
  require_once(__DIR__."../../../php/content_generators/CyclingGenerator.php");
  require_once(__DIR__."/../../php/content_generators/CommentsGenerator.php");
  require_once(__DIR__."/../../php/database_utilities/CommentsUtility.php");
  require_once("../../setup.php");

  $pageGenerator = new PageGenerator;
  $cssStyles = array("../../css/main_style.css");
  $jsFiles = array("https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js", "../../js/imageLoadUtility.js", "../../js/comments.js", "../../js/cycling.js");
  $head      = $pageGenerator->generateHead("Piotr Kawa - Rower", $cssStyles, $jsFiles);

  $contentGenerator = new CyclingGenerator;
  $mainPagePath     = "../index.php";
  $semestersPrefix  = "../../www/semesters/";
  $hobbyPath        = "hobbies.php";
  $imagePath        = "../../img/logo.png";

  $navbar = $contentGenerator->generateNavbar($mainPagePath, $imagePath, $semestersPrefix, $hobbyPath);
  $panorama = $contentGenerator->generatePanorama("Rower", "../../img/cycling_bg_low_res.png");
  $description = $contentGenerator->generateDescription("Rower od zawsze był moją pasją. Choć studia to okres intensywnej nauki to zawsze jestem w stanie wygospodarować odrobinę czasu na ruch na świeżym powietrzu. Mimo, iż mam swoje ulubione i dobrze znane trasy rowerowe, to największą przyjemność sprawia odkrywanie nowych miejsc.");

  $panels = array(
    $contentGenerator->generateRoutePanel("../../img/map_1_low_res.png", "Krótka lecz intensywna wycieczka, średnia prędkość 25km/h. Wspaniałe widoki i super wspomnienia."),
    $contentGenerator->generateRoutePanel("../../img/map_2_low_res.png", "Trasa ta z pewnością była o wiele dłuższa niż zazwyczaj, jednakże średnia prędkość była żałosna.")
  );
  
  $commentsSection = (new CommentsGenerator)->generateCommentsSection(3);

  $mapSection = $contentGenerator->generateMapSection($panels);
  $main   = $contentGenerator->generateMain(array($panorama, $description, $mapSection, $commentsSection));
  $body   = $pageGenerator->generateBody(array($navbar, $main, $contentGenerator->generateFooter()));
  echo $pageGenerator-> generatePageStructure(array($head,$body));
?>
