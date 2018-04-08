<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <title>PHP intro</title>
  <!-- <link rel="stylesheet" href="css/intro.css"> -->
  <link rel="stylesheet" type="text/css" href="css/main_style.css">
  <link rel="stylesheet" type="text/css" href="css/grid.css">
  <link rel="stylesheet" type="text/css" href="css/education.css">
  <link rel="stylesheet" type="text/css" href="css/semesters_style.css">
</head>

<body>
<div id="container">
<?php
require_once(__DIR__."/generator.php");

  $generator = new PageGenerator;
  
  $lectures = array();
  array_push($lectures, $generator->renderLecture("1", "23", "34"));
  array_push($lectures, $generator->renderLecture("2", "23", "34"));
  array_push($lectures, $generator->renderLecture("3", "23", "5656"));
  array_push($lectures, $generator->renderLecture("4", "23", "34"));
  $semesterInfo = $generator->renderSemester($lectures);

  echo $generator->renderNavbar();
  echo $generator->renderMain($semesterInfo);

?>
<br>
</div>
</body>
</html>
