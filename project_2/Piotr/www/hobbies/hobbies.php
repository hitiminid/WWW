<!DOCTYPE html>
<html lang="pl">
<head>
  <title>Moje przygody z edukacją - Hobby</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../../css/main_style.css">
  <link rel="stylesheet" type="text/css" href="../../css/grid.css">
  <link rel="stylesheet" type="text/css" href="../../css/hobbies_style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php
  require_once(__DIR__."../../../php/HobbyGenerator.php");

  $generator       = new HobbyGenerator;
  $mainPagePath    = "../index.php";
  $semestersPrefix = "../../www/semesters/";
  $hobbyPath       = "hobbies.php";
  $imagePath = "../../img/logo.png";
  $panorama   = $generator->renderWidePicture("Moje hobby", "../../img/hobbies.png");
  $hobbiesRow = array(
    $generator->renderHobbyPanel("Czytanie", "../../img/reading.png"),
    $generator->renderHobbyPanel("Rower", "../../img/cycling.png"));
  $hobbiesRow  = $generator->renderHobbiesRow($hobbiesRow);
  $hobbiesMenu = $generator->renderHobbiesMenu($hobbiesRow);
  $description = $generator->renderDescription("Choć moje studia wymagają dużych nakładów pracy to zawsze jestem w stanie wygospodarować czas na odrobinę relaksu. Do moich ulubionych form spędzania czasu wolnego należy czytanie książek (zarówno beletrystyki jak i książek naukowych - związanych z informatyką)
  oraz jazda na rowerze.");
  $content     = $generator->renderMain(array($panorama, $description, $hobbiesMenu));

  echo $generator->renderNavbar($mainPagePath,$imagePath,$semestersPrefix,$hobbyPath);
  echo $content;
  //TODO: footer
?>
</body>
</html>
