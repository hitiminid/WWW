<?php
  require_once(__DIR__."/../../php/content_generators/HobbyGenerator.php");
  require_once(__DIR__."/../../php/content_generators/PageGenerator.php");
  require_once(__DIR__."/../../php/content_generators/CommentsGenerator.php");
  require_once(__DIR__."/../../php/database_utilities/CommentsUtility.php");

  require_once("../../setup.php");

  $pageGenerator = new PageGenerator;
  $cssStyles = array("../css/reset.css",
                     "../../css/grid.css",
                     "../../css/main_style.css",
                     "../../css/panorama.css",
                     "../../css/hobbies.css",
                     "../../css/comments.css"
                    );
  $head = $pageGenerator->generateHead("Piotr Kawa - Hobby", $cssStyles, "//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js");

  $contentGenerator = new HobbyGenerator;
  $mainPagePath     = "../index.php";
  $semestersPrefix  = "../../www/semesters/";
  $hobbyPath        = "hobbies.php";
  $imagePath = "../../img/logo.png";
  $panorama   = $contentGenerator->generatePanorama("Moje hobby", "../../img/hobbies.png");
  $hobbiesRow = array(
    $contentGenerator->renderHobbyPanel("Czytanie", "reading.php", "../../img/reading.png"),
    $contentGenerator->renderHobbyPanel("Rower", "cycling.php", "../../img/cycling.png"));
  $hobbiesRow  = $contentGenerator->renderHobbiesRow($hobbiesRow);
  $hobbiesMenu = $contentGenerator->generateHobbiesMenu($hobbiesRow);
  $description = $contentGenerator->generateDescription("Choć moje studia wymagają dużych nakładów pracy to zawsze jestem w stanie wygospodarować czas na odrobinę relaksu. Do moich ulubionych form spędzania czasu wolnego należy czytanie książek (zarówno beletrystyki jak i książek naukowych - związanych z informatyką)
  oraz jazda na rowerze.");

  $navbar = $contentGenerator->generateNavbar($mainPagePath,$imagePath,$semestersPrefix,$hobbyPath);
  $main   = $contentGenerator->generateMain(array($panorama, $description, $hobbiesMenu));

  $commentsSection = (new CommentsGenerator)->generateCommentsSection(1);

  $body   = $pageGenerator->generateBody(array($navbar, $main, $commentsSection, $contentGenerator->generateFooter()));


  $bodyScripts = $pageGenerator->addJSFiles(array("../../js/comments.js"));

  echo $pageGenerator-> generatePageStructure(array($head,$body, $bodyScripts));
  // echo $pageGenerator -> generatePageStructure(array($head, $body));
?>
