<?php
  require_once(__DIR__."../../../php/PageGenerator.php");
  require_once(__DIR__."../../../php/SemestersGenerator.php");



  $pageGenerator = new PageGenerator;
  $cssStyles = array("../../css/reset.css","../../css/main_style.css","../../css/grid.css", "../../css/education.css", "../../css/education.css", "../../css/semesters_style.css");
  $head      = $pageGenerator->generateHead("Piotr Kawa - Semestr VI", $cssStyles, null);

  $contentGenerator = new SemestersGenerator;

  $mainPagePath     = "../index.php";
  $semestersPrefix  = "../../www/semesters/";
  $hobbyPath        = "../hobbies/hobbies.php";
  $imagePath        = "../../img/logo.png";

    $lectures = array("", "", "", "", "");


    $navbar = $contentGenerator->generateNavbar($mainPagePath, $imagePath, $semestersPrefix, $hobbyPath);

    $semesters = $contentGenerator->generateLectures(array(
      $contentGenerator->generateLecture("Systemy Wbudowane", array("Podstaw języka VHDL", "Budowa LFSR'a"), array("Podstaw elektroniki", "Zaawansowanych operacji w języku VHDL")),
      $contentGenerator->generateLecture("Wprowadzenie do Funkcji Zespolonych", array("Obliczenia w ciałach liczb zespolonych", "Pochodne zespolone"), array("Analizy funkcji zespolonych", "Wykorzystanie funkcji zespolonych")),
      $contentGenerator->generateLecture("Programowanie w Logice", array("Podstaw języka Prolog", "Optymalizację zapytań prologowych"), array("Języków używanych w SI", "Dalszych zagadnień związanych z logiką")),
      $contentGenerator->generateLecture("Grafika Komputerowa i Wizualizacja", array("Operacji na macierzach afinicznych", "Programowania w JavaScript"), array("Poszerzyć wiedzę dot. WebGL", "OpenGL")),
      $contentGenerator->generateLecture("Nowoczesne Technologie WWW", array("Przypomniałem sobie HTML", "Selektory CSS", "Tworzyć listy tego czego się nauczyłem na studiach"), array("Frameworków JavaScriptowych", "Preprocesorów CSS", "UX / UI")),
    ));

    $semestersWithHeader = $contentGenerator->generateSemesterWithHeader("Semestr VI", "Lato 2017/2018", $semesters);

    $main   = $contentGenerator->generateMain(array($semestersWithHeader));
    $body   = $pageGenerator->generateBody(array($navbar, $main, $contentGenerator->generateFooter()));
    echo $pageGenerator-> generatePageStructure(array($head, $body));



?>
