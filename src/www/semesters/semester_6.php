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


  $generator = new BaseGenerator;
  $lectures = aray("Systemy Wbudowane", "Wprowadzenie do Funkcji Zespolonych", "Programowanie w Logice", "Grafika Komputerowa i Wizualizacja", "Nowoczesne Technologie WWW");

  $generator->renderLecture("Analiza Matematyczna I")


  echo $generator->renderNavbar();
  echo $generator->renderMain(null);

?>
</body>
</html>
