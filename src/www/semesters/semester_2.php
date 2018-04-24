
<?php
  require_once(__DIR__."../../../php/PageGenerator.php");
  require_once(__DIR__."../../../php/SemestersGenerator.php");

  $pageGenerator = new PageGenerator;
  $cssStyles = array("../../css/reset.css",
                     "../../css/main_style.css",
                     "../../css/grid.css",
                     "../../css/semesters.css");
  $head      = $pageGenerator->generateHead("Piotr Kawa - Semestr II", $cssStyles, null);

  $contentGenerator = new SemestersGenerator;

  $mainPagePath     = "../index.php";
  $semestersPrefix  = "../../www/semesters/";
  $hobbyPath        = "../hobbies/hobbies.php";
  $imagePath        = "../../img/logo.png";

  $navbar = $contentGenerator->generateNavbar($mainPagePath, $imagePath, $semestersPrefix, $hobbyPath);

  $semesters = $contentGenerator->generateLectures(array(
    $contentGenerator->generateLecture("Analiza Matematyczna II", array("Całek podwójnych", "Podstawowych metryk"), array("Liczenia całek potrójnych", "Nowych metryk")),
    $contentGenerator->generateLecture("Algebra Abstrakcyjna i Kodowanie", array("Operacji w ciałach", "Kodowania Huffmana"), array("Więcej nt. operacji w grupach i pierścieniach", "Dodatkowych algorytmów kodowania")),
    $contentGenerator->generateLecture("Matematyka Dyskretna", array("Funkcji tworzące", "Podstaw grafów"), array("Więcej nt. permutacji", "Multizbiorów")),
    $contentGenerator->generateLecture("Problemy Prawne Informatyki", array("Podstawowych założeń dot. prawa autorskiego", "Podstaw prawa patentowego"), array("Więcej nt. licencji", "Więcej nt. prawa autorskiego"))
  ));

  $semestersWithHeader = $contentGenerator->generateSemesterWithHeader("Semestr II", "Lato 2015/2016", $semesters);

  $main   = $contentGenerator->generateMain(array($semestersWithHeader));
  $body   = $pageGenerator->generateBody(array($navbar, $main, $contentGenerator->generateFooter()));
  echo $pageGenerator-> generatePageStructure(array($head, $body));
?>
