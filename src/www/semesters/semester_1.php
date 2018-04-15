<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <title>PHP intro</title>
  <!-- <link rel="stylesheet" href="css/intro.css"> -->
  <link rel="stylesheet" type="text/css" href="../../css/main_style.css">
  <link rel="stylesheet" type="text/css" href="../../css/grid.css">
  <link rel="stylesheet" type="text/css" href="../../css/education.css">
  <link rel="stylesheet" type="text/css" href="../../css/semesters_style.css">
</head>

<body>
<?php
  require_once(__DIR__."/../../php/SemestersGenerator.php");

  $lectures = array(
    array("Analiza Matematyczna I", "Całkować", "Różniczkować"),
    array("Algebra z Geometrią Analityczną", "Operacje na macierzach", "Obliczenia na liczbach zespolonych"),
    array("Wstęp do Informatyki i Programowania", "Podstawowych pojęć informatycznych", "Podstaw języka C"),
    array("Logika i Struktury Formalne", "Tautologii", "Podstawowych kwantyfikatorów"));

  // "Analiza Matematyczna I", "2" => "Algebra z Geometrią Analityczną", "3" => "Wstęp do Informatyki i Programowania", "4" => "Logika i Struktury Formalne"];

  $generator = new SemestersGenerator;
  echo $generator->getNavbar();
  echo $generator->renderSemester($lectures);

?>
</body>
</html>
