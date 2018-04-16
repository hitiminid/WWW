<?php
  require_once(__DIR__."../../../php/PageGenerator.php");
  require_once(__DIR__."../../../php/SemestersGenerator.php");



  $pageGenerator = new PageGenerator;
  $cssStyles = array("../../css/reset.css","../../css/main_style.css","../../css/grid.css", "../../css/education.css", "../../css/education.css", "../../css/semesters_style.css");
  $head      = $pageGenerator->generateHead("Semestr VI", $cssStyles, null);

  $contentGenerator = new SemestersGenerator;

  $mainPagePath     = "../index.php";
  $semestersPrefix  = "../../www/semesters/";
  $hobbyPath        = "hobbies.php";
  $imagePath        = "../../img/logo.png";

    $lectures = array("Systemy Wbudowane", "Wprowadzenie do Funkcji Zespolonych", "Programowanie w Logice", "Grafika Komputerowa i Wizualizacja", "Nowoczesne Technologie WWW");


  echo $contentGenerator->renderSemester($lectures);

  $navbar = $contentGenerator->generateNavbar($mainPagePath, $imagePath, $semestersPrefix, $hobbyPath);
  $main   = $contentGenerator->generateMain(null);

  $body   = $pageGenerator->generateBody(array($navbar, $main));
  echo $pageGenerator-> generatePageStructure(array($head, $body));
?>
