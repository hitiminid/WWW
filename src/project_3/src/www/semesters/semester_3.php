<?php
  require_once(__DIR__."../../../php/content_generators/PageGenerator.php");
  require_once(__DIR__."../../../php/content_generators/SemestersGenerator.php");
  require_once(__DIR__."../../../php/content_generators/CommentsGenerator.php");

  require_once("../../setup.php");

  $pageGenerator = new PageGenerator;
  $cssStyles = array("../../css/reset.css",
                     "../../css/main_style.css",
                     "../../css/grid.css",
                     "../../css/education.css",
                     "../../css/semesters.css",
                     "../../css/comments.css");
  $head      = $pageGenerator->generateHead("Piotr Kawa - Semestr III", $cssStyles, "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js");

  $contentGenerator = new SemestersGenerator;

  $mainPagePath     = "../index.php";
  $semestersPrefix  = "../../www/semesters/";
  $hobbyPath        = "../hobbies/hobbies.php";
  $imagePath        = "../../img/logo.png";

  $navbar = $contentGenerator->generateNavbar($mainPagePath, $imagePath, $semestersPrefix, $hobbyPath);

  $semesters = $contentGenerator->generateLectures(array(
    $contentGenerator->generateLecture("Technologia Programowania", array("Najważniejszych wzorców projektowych", "Język Java"), array("Dokładniej poznać wzorce projektowe", "Wielowątkowość w Javie")),
    $contentGenerator->generateLecture("Bazy Danych i Systemy Informacyjne", array("Algebry Relacji", "Podstaw SQL"), array("Poszerzyć wiedzę dot. SQL", "Bazy danych NoSQL")),
    $contentGenerator->generateLecture("Architektura Komputerów i Systemy Operacyjne", array("Programować w Assembly", "Działania systemu Linux"), array("Więcej nt. programowania w Assembly", "Napisać własny OS")),
    $contentGenerator->generateLecture("Metody Probablistyczne i Statystyka", array("Podstaw obliczania prawdopodobieństwa", "Kombinatoryki"), array("Grafy losowe", "Więcej nt. przestrzeni probablistycznych"))
  ));

  $semestersWithHeader = $contentGenerator->generateSemesterWithHeader("Semestr III", "Zima 2016/2017", $semesters);

  $commentsSection = (new CommentsGenerator())->generateCommentsSection(7);  
  $main   = $contentGenerator->generateMain(array($semestersWithHeader, $commentsSection));
  $body   = $pageGenerator->generateBody(array($navbar, $main,/* $commentsSection, */$contentGenerator->generateFooter()));
  $bodyScripts = $pageGenerator->addJSFiles(array("../../js/comments.js", "../../js/semester_3.js"));
  echo $pageGenerator-> generatePageStructure(array($head, $body, $bodyScripts));



?>
