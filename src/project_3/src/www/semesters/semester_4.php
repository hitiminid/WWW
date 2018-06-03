<?php
  require_once(__DIR__."../../../php/content_generators/PageGenerator.php");
  require_once(__DIR__."../../../php/content_generators/SemestersGenerator.php");
  require_once(__DIR__."../../../php/content_generators/CommentsGenerator.php");
  require_once("../../setup.php");

  $pageGenerator = new PageGenerator;
  $cssStyles = array("../../css/reset.css",
                     "../../css/main_style.css",
                     "../../css/grid.css",
                     "../../css/semesters.css",
                     "../../css/comments.css");
                     
  $head      = $pageGenerator->generateHead("Piotr Kawa - Semestr IV", $cssStyles, "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js");

  $contentGenerator = new SemestersGenerator;
  $mainPagePath     = "../index.php";
  $semestersPrefix  = "../../www/semesters/";
  $hobbyPath        = "../hobbies/hobbies.php";
  $imagePath        = "../../img/logo.png";

  $navbar = $contentGenerator->generateNavbar($mainPagePath, $imagePath, $semestersPrefix, $hobbyPath);

  $semesters = $contentGenerator->generateLectures(array(
    $contentGenerator->generateLecture("Języki i Paradygmaty Programowania", array("Podstawy języka Erlang", "Podstawy języka Prolog"), array("Poszerzyć wiedzę na temat jezyków funkcyjnych", "Nauczyć języka Elixir")),
    $contentGenerator->generateLecture("Technologie Sieciowe", array("Pingować chińskie strony internetowe", "Podstawowych zasad działania HTTP"), array("Dogłębnie zgłębić protokół HTTP", "Obsługa PUTTY")),
    $contentGenerator->generateLecture("Algorytmy i Struktury Danych", array("Podstawowych algorytmów sortowania", "Podstawowych struktur danych"), array("Wyliczania złożoności obliczeniowej", "Algorytmów najkrótszej ścieżki")),
    $contentGenerator->generateLecture("Wprowadzenie do Teorii Grafów", array("\(\sum_{v \in V} deg v = 2|E| \)", "Różnic pomiędzy różnymi typami grafów"), array("Zastosowania grafów w problemach NP", "Algorytmów przeszukiwania grafów")),
    $contentGenerator->generateLecture("Algorytmy Metaheurystyczne", array("Algorytmów genetycznych", "Algorytmu wyżarzania"), array("Wielowątkowych algorytmów", "Innych algorytmów metaheurystycznych")),
    $contentGenerator->generateLecture("Komunikacja Społeczna", array("Roli mediów w społeczeństwie", "Przyczyn zmian społecznych"), array("Socjologii", "Dziennikarstwa")),
    $contentGenerator->generateLecture("Podstawy Marketingu", array("Zasad kierowania firmą", "Działania rynku"), array("Podstaw ekonomii", "Podstaw marketingu")),
  ));

  $semestersWithHeader = $contentGenerator->generateSemesterWithHeader("Semestr IV", "Lato 2016/2017", $semesters);

  $commentsSection = (new CommentsGenerator())->generateCommentsSection(8);  
  $main   = $contentGenerator->generateMain(array($semestersWithHeader, $commentsSection));
  $body   = $pageGenerator->generateBody(array($navbar, $main, $contentGenerator->generateFooter()));
  $bodyScripts = $pageGenerator->addJSFiles(array("../../js/comments.js", "../../js/semester_4.js"));
  echo $pageGenerator-> generatePageStructure(array($head, $body, $bodyScripts));

?>
