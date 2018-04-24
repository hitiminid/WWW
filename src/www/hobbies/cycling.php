<?php
  require_once(__DIR__."../../../php/PageGenerator.php");
  require_once(__DIR__."../../../php/CyclingGenerator.php");


  $pageGenerator = new PageGenerator;
  $cssStyles = array("../../css/reset.css",
                     "../../css/main_style.css",
                     "../../css/grid.css",
                     "../../css/panorama.css",
                     "../../css/hobbies_style.css",
                     "../../css/cycling_style.css");
  $head      = $pageGenerator->generateHead("Piotr Kawa - Rower", $cssStyles, null);

  $contentGenerator = new CyclingGenerator;
  $mainPagePath     = "../index.php";
  $semestersPrefix  = "../../www/semesters/";
  $hobbyPath        = "hobbies.php";
  $imagePath        = "../../img/logo.png";

  $navbar = $contentGenerator->generateNavbar($mainPagePath, $imagePath, $semestersPrefix, $hobbyPath);

  $panorama = $contentGenerator->generatePanorama("Rower", "../../img/cycling_bg.png");

  $description = $contentGenerator->generateDescription("Rower od zawsze był moją pasją. Choć studia to okres intensywnej nauki to zawsze jestem w stanie wygospodarować odrobinę czasu na ruch na świeżym powietrzu. Mimo, iż mam swoje ulubione i dobrze znane trasy rowerowe, to największą przyjemność sprawia odkrywanie nowych miejsc.");

  $panels = array(
    $contentGenerator->generateRoutePanel("../../img/map_1.png", "Krótka lecz intensywna wycieczka, średnia prędkość 25km/h. Wspaniałe widoki i super wspomnienia."),
    $contentGenerator->generateRoutePanel("../../img/map_1.png", "Trasa ta z pewnością była o wiele dłuższa niż zazwyczaj, jednakże średnia prędkość była żałosna.")
  );

  $mapSection = $contentGenerator->generateMapSection($panels);
  $main   = $contentGenerator->generateMain(array($panorama, $description, $mapSection));

  $body   = $pageGenerator->generateBody(array($navbar, $main, $contentGenerator->generateFooter()));
  echo $pageGenerator-> generatePageStructure(array($head, $body));
?>
