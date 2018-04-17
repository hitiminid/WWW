<?php
  require_once(__DIR__."../../../php/PageGenerator.php");
  require_once(__DIR__."../../../php/SemestersGenerator.php");



  $pageGenerator = new PageGenerator;
  $cssStyles = array("../../css/reset.css","../../css/main_style.css","../../css/grid.css", "../../css/education.css", "../../css/education.css", "../../css/semesters_style.css");
  $head      = $pageGenerator->generateHead("Semestr IV", $cssStyles, null);

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
    $contentGenerator->generateLecture("Wprowadzenie do Teorii Grafów", array("Podstawowych informacji nt. grafów", "Różnic pomiędzy różnymi typami grafów"), array("Zastosowania grafów w problemach NP", "Algorytmów przeszukiwania grafów")),
    $contentGenerator->generateLecture("Algorytmy Metaheurystyczne", array("Algorytmów genetycznych", "Algorytmu wyżarzania"), array("Wielowątkowych algorytmów", "Innych algorytmów metaheurystycznych")),
    $contentGenerator->generateLecture("Komunikacja Społeczna", array("Roli mediów w społeczeństwie", "Przyczyn zmian społecznych"), array("Socjologii", "Dziennikarstwa")),
    $contentGenerator->generateLecture("Podstawy Marketingu", array("Zasad kierowania firmą", "Działania rynku"), array("Podstaw ekonomii", "Podstaw marketingu")),
  ));

  $semestersWithHeader = $contentGenerator->generateSemesterWithHeader("Semestr IV", "2016/2017", $semesters);

  $main   = $contentGenerator->generateMain(array($semestersWithHeader));
  $body   = $pageGenerator->generateBody(array($navbar, $main, $contentGenerator->generateFooter()));
  echo $pageGenerator-> generatePageStructure(array($head, $body));



?>
