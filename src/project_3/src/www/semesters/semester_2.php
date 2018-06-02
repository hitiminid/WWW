
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
  $head      = $pageGenerator->generateHead("Piotr Kawa - Semestr II", $cssStyles, "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js");

  $contentGenerator = new SemestersGenerator;

  $mainPagePath     = "../index.php";
  $semestersPrefix  = "../../www/semesters/";
  $hobbyPath        = "../hobbies/hobbies.php";
  $imagePath        = "../../img/logo.png";

  $navbar = $contentGenerator->generateNavbar($mainPagePath, $imagePath, $semestersPrefix, $hobbyPath);

  $semesters = $contentGenerator->generateLectures(array(
    $contentGenerator->generateLecture("Analiza Matematyczna II", array("\( \int_{1}^{\infty} \dfrac{dx}{x^p} \lt \infty \leftrightarrow p \gt 1 \)", "Podstawowych metryk"), array("Liczenia całek potrójnych", "Nowych metryk")),
    $contentGenerator->generateLecture("Algebra Abstrakcyjna i Kodowanie", array("Operacji w ciałach", "Kodowania Huffmana"), array("Więcej nt. operacji w grupach i pierścieniach", "Dodatkowych algorytmów kodowania")),
    $contentGenerator->generateLecture("Matematyka Dyskretna", array("\( G(x) = \sum_{n=0}^{\infty} g_{n} x^{n}\)", "Podstaw grafów"), array("Więcej nt. permutacji", "Multizbiorów")),
    $contentGenerator->generateLecture("Problemy Prawne Informatyki", array("Podstawowych założeń dot. prawa autorskiego", "Podstaw prawa patentowego"), array("Więcej nt. licencji", "Więcej nt. prawa autorskiego"))
  ));

  $semestersWithHeader = $contentGenerator->generateSemesterWithHeader("Semestr II", "Lato 2015/2016", $semesters);

  $commentsSection = (new CommentsGenerator())->generateCommentsSection(5);

  $main   = $contentGenerator->generateMain(array($semestersWithHeader));
  $body   = $pageGenerator->generateBody(array($navbar, $main, $commentsSection, $contentGenerator->generateFooter()));
  $bodyScripts = $pageGenerator->addJSFiles(array("../../js/comments.js"));
  echo $pageGenerator-> generatePageStructure(array($head, $body, $bodyScripts));
?>
