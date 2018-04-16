<?php
  require_once(__DIR__."../../../php/PageGenerator.php");
  require_once(__DIR__."../../../php/HobbyGenerator.php");


  $pageGenerator = new PageGenerator;
  $cssStyles = array("../../css/reset.css","../../css/main_style.css","../../css/grid.css", "../css/index_style.css", "../../css/education.css", "../../css/semesters_style.css");
  $head      = $pageGenerator->generateHead("Moja Przygoda z Edukacją - Rower", $cssStyles, null);

  $contentGenerator = new BaseGenerator;
  $mainPagePath     = "../index.php";
  $semestersPrefix  = "../../www/semesters/";
  $hobbyPath        = "hobbies.php";
  $imagePath        = "../../img/logo.png";

  $navbar = $contentGenerator->generateNavbar($mainPagePath, $imagePath, $semestersPrefix, $hobbyPath);
  $main   = $contentGenerator->generateMain(null);

  $body   = $pageGenerator->generateBody(array($navbar, $main));
  echo $pageGenerator-> generatePageStructure(array($head, $body));
?>
