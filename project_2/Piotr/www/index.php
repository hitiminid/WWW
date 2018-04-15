<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <title>PHP intro</title>
  <!-- <link rel="stylesheet" href="css/intro.css"> -->
  <link rel="stylesheet" type="text/css" href="../css/grid.css">
  <link rel="stylesheet" type="text/css" href="../css/index_style.css">
  <link rel="stylesheet" type="text/css" href="../css/main_style.css">
</head>

<body>

<?php
  require_once(__DIR__."/../php/HomePageGenerator.php");

  $generator       = new HomePageGenerator;
  $mainPagePath    = "/index.php";
  $semestersPrefix = "semesters/";

  $hobbyPath = "hobbies/hobbies.php";
  $imagePath = "../img/logo.png";
  $panorama  = $generator->renderJumbotron("../img/front.jpg", "../img/face.png", "Piotr Kawa");
  $aboutMe   = $generator->renderAboutMe("Jestem Piotrek. Mam 21 lat i jestem studentem Politechniki Wrocławskiej. Studiuję informatykę na wydziale Podstawowych Problemów Techniki. Na tej stronie znaleźć możesz informacje dotyczące zarówno mojej nauki jak i form spędzania przeze mnie czasu wolnego. Moim głównym obszarem zainteresowań informatycznych jest programowanie aplikacji mobilnych na systemy Android. Jednym z ulubionych hobby to słaba książka, słaby film. ");
  $panels    = array(
    $generator->renderPanel("Znajdziesz tutaj informacje dotyczące kursów w których brałem udział podczas mojej już 3-letniej nauki na Politechnice Wrocławskiej.", "", "Uczelnia"),
    $generator->renderPanel("Dzięki zakładce hobby dowiesz się trochę o moich zainteresowaniach, które są mniej lub bardziej związane z nauką. ", "../www/hobbies/hobbies.php", "Hobby")
  );
  $subSectionPanels = $generator->renderSubSectionPanels($panels);


  echo $generator->renderNavbar($mainPagePath,$imagePath,$semestersPrefix,$hobbyPath);
  echo $generator->renderMain(array($panorama, $aboutMe, $subSectionPanels));

?>
</body>
</html>
