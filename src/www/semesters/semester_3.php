<?php
  require_once(__DIR__."../../../php/PageGenerator.php");
  require_once(__DIR__."../../../php/SemestersGenerator.php");



  $pageGenerator = new PageGenerator;
  $cssStyles = array("../../css/reset.css","../../css/main_style.css","../../css/grid.css", "../../css/education.css", "../../css/education.css", "../../css/semesters_style.css");
  $head      = $pageGenerator->generateHead("Semestr III", $cssStyles, null);

  $contentGenerator = new SemestersGenerator;

  $mainPagePath     = "../index.php";
  $semestersPrefix  = "../../www/semesters/";
  $hobbyPath        = "hobbies.php";
  $imagePath        = "../../img/logo.png";

  $lectures = array("Technologia Programowania", "Bazy Danych i Systemy Informacyjne", "Architektura Komputerów i Systemy Operacyjne", "Metody Probablistyczne i Statystyka");


  echo $contentGenerator->renderSemester($lectures);

  $navbar = $contentGenerator->generateNavbar($mainPagePath, $imagePath, $semestersPrefix, $hobbyPath);
  $main   = $contentGenerator->generateMain(null);

  $body   = $pageGenerator->generateBody(array($navbar, $main));
  echo $pageGenerator-> generatePageStructure(array($head, $body));
?>
