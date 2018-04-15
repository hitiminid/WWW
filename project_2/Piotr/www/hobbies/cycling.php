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
  require_once(__DIR__."../../../php/HobbyGenerator.php");

  $generator       = new BaseGenerator;
  $mainPagePath    = "../index.php";
  $semestersPrefix = "../../www/semesters/";
  $hobbyPath       = "hobbies.php";
  $imagePath = "";

  echo $generator->renderNavbar($mainPagePath,"",$semestersPrefix,$hobbyPath);
  echo $generator->renderMain(null);
?>
</body>
</html>
