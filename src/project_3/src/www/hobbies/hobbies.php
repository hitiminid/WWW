<?php
  require_once(__DIR__."/../../php/content_generators/HobbyGenerator.php");
  require_once(__DIR__."/../../php/content_generators/PageGenerator.php");
  require_once(__DIR__."/../../php/content_generators/CommentsGenerator.php");
  require_once(__DIR__."/../../php/database_utilities/CommentsUtility.php");

  require_once("../../setup.php");

  $pageGenerator = new PageGenerator;
  $cssStyles = array("../../css/main_style.css");
  
  $jsFiles = array("https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js", "../../js/imageLoadUtility.js", "../../js/comments.js",  "../../js/hobbies.js");
  $head = $pageGenerator->generateHead("Piotr Kawa - Hobby", $cssStyles, $jsFiles);

  $contentGenerator = new HobbyGenerator;
  $mainPagePath     = "../index.php";
  $semestersPrefix  = "../../www/semesters/";
  $hobbyPath        = "hobbies.php";
  $imagePath = "../../img/logo.png";
  $panorama   = $contentGenerator->generatePanorama("Moje hobby", "../../img/hobbies_low_res.png");
  $hobbiesRow = array(
    $contentGenerator->renderHobbyPanel("Czytanie", "reading.php", "../../img/reading.png"),
    $contentGenerator->renderHobbyPanel("Rower", "cycling.php", "../../img/cycling.png"));
  $hobbiesRow  = $contentGenerator->renderHobbiesRow($hobbiesRow);
  $hobbiesMenu = $contentGenerator->generateHobbiesMenu($hobbiesRow);
  $description = $contentGenerator->generateDescription("Choć moje studia wymagają dużych nakładów pracy to zawsze jestem w stanie wygospodarować czas na odrobinę relaksu. Do moich ulubionych form spędzania czasu wolnego należy czytanie książek (zarówno beletrystyki jak i książek naukowych - związanych z informatyką)
  oraz jazda na rowerze.");

  $commentsSection = (new CommentsGenerator)->generateCommentsSection(1);
  $navbar = $contentGenerator->generateNavbar($mainPagePath,$imagePath,$semestersPrefix,$hobbyPath);
  $main   = $contentGenerator->generateMain(array($panorama, $description, $hobbiesMenu, $commentsSection));

  $body   = $pageGenerator->generateBody(array($navbar, $main, $contentGenerator->generateFooter()));
  echo $pageGenerator-> generatePageStructure(array($head,$body));
?>
