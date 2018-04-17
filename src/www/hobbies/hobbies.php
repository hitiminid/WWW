<?php
  require_once(__DIR__."/../../php/HobbyGenerator.php");
  require_once(__DIR__."/../../php/PageGenerator.php");

  $pageGenerator = new PageGenerator;
  $cssStyles = array("../css/reset.css","../../css/main_style.css", "../../css/grid.css", "../../css/hobbies_style.css");
  $head = $pageGenerator->generateHead("Moje przygody z edukacją - Hobby", $cssStyles, null);

  $contentGenerator = new HobbyGenerator;
  $mainPagePath     = "../index.php";
  $semestersPrefix  = "../../www/semesters/";
  $hobbyPath        = "hobbies.php";
  $imagePath = "../../img/logo.png";
  $panorama   = $contentGenerator->generatePanorama("Moje hobby", "../../img/hobbies.png");
  $hobbiesRow = array(
    $contentGenerator->renderHobbyPanel("Czytanie", "reading.php", "../../img/reading.png"),
    $contentGenerator->renderHobbyPanel("Rower", "cycling.php", "../../img/cycling.png"));
  $hobbiesRow  = $contentGenerator->renderHobbiesRow($hobbiesRow);
  $hobbiesMenu = $contentGenerator->generateHobbiesMenu($hobbiesRow);
  $description = $contentGenerator->generateDescription("Choć moje studia wymagają dużych nakładów pracy to zawsze jestem w stanie wygospodarować czas na odrobinę relaksu. Do moich ulubionych form spędzania czasu wolnego należy czytanie książek (zarówno beletrystyki jak i książek naukowych - związanych z informatyką)
  oraz jazda na rowerze.");

  $navbar = $contentGenerator->generateNavbar($mainPagePath,$imagePath,$semestersPrefix,$hobbyPath);
  $main   = $contentGenerator->generateMain(array($panorama, $description, $hobbiesMenu));

  $body   = $pageGenerator->generateBody(array($navbar, $main, $contentGenerator->generateFooter()));
echo $pageGenerator -> generatePageStructure(array($head, $body));
?>
