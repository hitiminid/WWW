<?php
  require_once(__DIR__."../../../php/content_generators/PageGenerator.php");
  require_once(__DIR__."../../../php/content_generators/SemestersGenerator.php");

  $pageGenerator = new PageGenerator;
  $cssStyles = array("../../css/reset.css",
                     "../../css/main_style.css",
                     "../../css/grid.css",
                     "../../css/semesters.css");
  $head      = $pageGenerator->generateHead("Piotr Kawa - Semestr I", $cssStyles, null);

  $contentGenerator = new SemestersGenerator;

  $mainPagePath     = "../index.php";
  $semestersPrefix  = "../../www/semesters/";
  $hobbyPath        = "../hobbies/hobbies.php";
  $imagePath        = "../../img/logo.png";

  $lectures = array(
    array("Analiza Matematyczna I", "Całkować", "Różniczkować"),
    array("Algebra z Geometrią Analityczną", "Operacje na macierzach", "Obliczenia na liczbach zespolonych"),
    array("Wstęp do Informatyki i Programowania", "Podstawowych pojęć informatycznych", "Podstaw języka C"),
    array("Logika i Struktury Formalne", "Tautologii", "Podstawowych kwantyfikatorów"));


  $navbar = $contentGenerator->generateNavbar($mainPagePath, $imagePath, $semestersPrefix, $hobbyPath);

  $semesters = $contentGenerator->generateLectures(array(
    $contentGenerator->generateLecture("Analiza Matematyczna I", array("całkować", "Różniczkować"), array("Dokładną treść tw. Cauchy'ego", "Zastosowania całek w przemyśle")),
    $contentGenerator->generateLecture("Algebra z Geometrią Analityczną", array("Operacje na macierzach", "Obliczenia na liczbach zespolonych"), array("Lepiej rozwiązywać układy liniowe", "Ortogonalizacji")),
    $contentGenerator->generateLecture("Wstęp do Informatyki i Programowania", array("Podstawowych pojęć informatycznych", "Podstaw języka C"), array("Operacji na wskaźnikach", "Najnowszego standardu języka C")),
    $contentGenerator->generateLecture("Logika i Struktury Formalne", array("Tautologii", "Podstawowych kwantyfikatorów"), array("Struktur Formalnych", "Więcej nt. kwantyfikatorów"))
  ));

  $semestersWithHeader = $contentGenerator->generateSemesterWithHeader("Semestr I", "Zima 2015/2016", $semesters);

  $main   = $contentGenerator->generateMain(array($semestersWithHeader));
  $body   = $pageGenerator->generateBody(array($navbar, $main, $contentGenerator->generateFooter()));
  echo $pageGenerator-> generatePageStructure(array($head, $body));
?>
