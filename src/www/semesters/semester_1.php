<?php
  require_once(__DIR__."../../../php/PageGenerator.php");
  require_once(__DIR__."../../../php/SemestersGenerator.php");



  $pageGenerator = new PageGenerator;
  $cssStyles = array("../../css/reset.css","../../css/main_style.css","../../css/grid.css", "../../css/education.css", "../../css/education.css", "../../css/semesters_style.css");
  $head      = $pageGenerator->generateHead("Semestr I", $cssStyles, null);

  $contentGenerator = new SemestersGenerator;

  $mainPagePath     = "../index.php";
  $semestersPrefix  = "../../www/semesters/";
  $hobbyPath        = "hobbies.php";
  $imagePath        = "../../img/logo.png";

  $lectures = array(
    array("Analiza Matematyczna I", "Całkować", "Różniczkować"),
    array("Algebra z Geometrią Analityczną", "Operacje na macierzach", "Obliczenia na liczbach zespolonych"),
    array("Wstęp do Informatyki i Programowania", "Podstawowych pojęć informatycznych", "Podstaw języka C"),
    array("Logika i Struktury Formalne", "Tautologii", "Podstawowych kwantyfikatorów"));

  echo $contentGenerator->renderSemester($lectures);

  $navbar = $contentGenerator->generateNavbar($mainPagePath, $imagePath, $semestersPrefix, $hobbyPath);
  $main   = $contentGenerator->generateMain(null);

  $body   = $pageGenerator->generateBody(array($navbar, $main));
  echo $pageGenerator-> generatePageStructure(array($head, $body));
?>
