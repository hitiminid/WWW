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
  require_once(__DIR__."/../../php/BaseGenerator.php");

  $generator = new BaseGenerator;
  $lectures = aray("Technologia Programowania", "Bazy Danych i Systemy Informacyjne", "Architektura Komputerów i Systemy Operacyjne", "Metody Probablistyczne i Statystyka");

  $generator->renderLecture("Analiza Matematyczna I")







  echo $generator->renderNavbar();
  echo $generator->renderMain(null);




?>
<br>
</div>
</body>
</html>
