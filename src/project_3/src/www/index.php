<?php
  
  require_once("../setup.php");
  require_once(__DIR__."/../php/content_generators/HomePageGenerator.php");
  require_once(__DIR__."/../php/content_generators/PageGenerator.php");
  require_once(__DIR__."/../php/content_generators/CommentsGenerator.php");
  require_once(__DIR__."/../php/database_utilities/CommentsUtility.php");
  require_once(__DIR__."/../php/database_utilities/CaptchaUtility.php");
  require_once(__DIR__."/../php/database_utilities/DatabaseUtility.php");

  $db = new DatabaseUtility();
  // $db->dropDB(true, true);

  $captchaUtility = new CaptchaUtility();
  $captchaUtility->mockCaptchas();
  
  $pageGenerator = new PageGenerator;
  $cssStyles = array("../css/styles.css");
  $jsFiles = array("https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js", "../js/localStorageUtility.js", "../js/index.js");
  $head = $pageGenerator->generateHead("Piotr Kawa - Moja przygoda z edukacją", $cssStyles, $jsFiles);

  $contentGenerator = new HomePageGenerator;
  $mainPagePath     = "index.php";
  $semestersPrefix  = "semesters/";

  $hobbyPath = "hobbies/hobbies.php";
  $imagePath = "../img/logo.png";
  $panorama  = $contentGenerator->generatePanoramaWithInnerImage("../img/front.jpg", ".", "Piotr Kawa");
  $aboutMe   = $contentGenerator->generateAboutMe("Jestem Piotrek. Mam 21 lat i jestem studentem Politechniki Wrocławskiej. Studiuję informatykę na wydziale Podstawowych Problemów Techniki. Na tej stronie znaleźć możesz informacje dotyczące zarówno mojej nauki jak i form spędzania przeze mnie czasu wolnego. Moim głównym obszarem zainteresowań informatycznych jest programowanie aplikacji mobilnych na systemy Android. Jednym z ulubionych hobby to słaba książka, słaby film.");
  $panels    = array(
    $contentGenerator->generatePanel("Znajdziesz tutaj informacje dotyczące kursów w których brałem udział podczas mojej już 3-letniej nauki na Politechnice Wrocławskiej.", "../www/semesters/education.php", "Uczelnia"),
    $contentGenerator->generatePanel("Dzięki zakładce hobby dowiesz się trochę o moich zainteresowaniach, które są mniej lub bardziej związane z nauką. ", "../www/hobbies/hobbies.php", "Hobby")
  );
  $subSectionPanels = $contentGenerator->generateSubSectionPanels($panels);

  $navbar = $contentGenerator->generateNavbar($mainPagePath,$imagePath,$semestersPrefix,$hobbyPath);
  $main   = $contentGenerator->generateMain(array($panorama, $aboutMe, $subSectionPanels));

  $body   = $pageGenerator->generateBody(array($navbar, $main, $commentsSection, $contentGenerator->generateFooter()));
  echo $pageGenerator-> generatePageStructure(array($head,$body));
?>
