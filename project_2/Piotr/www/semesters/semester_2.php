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
<div id="container">
<?php
  require_once(__DIR__."/../../php/SemestersGenerator.php");

  $generator = new SemestersGenerator;
  $lectures = array("Analiza Matematyczna II", "Algebra Abstrakcyjna i Kodowanie", "Matematyka Dyskretna", "Problemy Prawne Informatyki", "Kurs Programowania", "Fizyka");


  echo $generator->renderNavbar();
  echo $generator->renderMain(null);

  echo $generator->renderLecture("Analiza Matematyczna I", ":)", ":)");



?>
<br>
</div>
</body>
</html>
