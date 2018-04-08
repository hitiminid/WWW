<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <title>PHP intro</title>
  <link rel="stylesheet" href="css/intro.css">
</head>

<body>
<div id="container">

<?php
  require_once(__DIR__."/PHP/intro.php");
  
  $autor = "Jacek Cichoń";

  echo "<h1>Jestem stroną wygenerowaną przez PHP</h1>\n";
  echo "<p> Tę piękną stronę zbudował {$autor}.</p>\n";

  echo myDiv("To jest niebieski div","blue");
  echo myDiv("To jest czerwony div","red");
  echo myDiv("To jest zielony div","green");

  echo "<div class='row'>\n";
  echo myCard(
    "Wakacje 2016",
    "Piękna i dosyć trudno dostępna laguna Balos na Krecie. Najłatwiej jest tam dostać się łodzią.",
    "gr01.JPG");
  echo myCard(
    "Wakacje 2016",
    "Do jest drugie zdjęcie z zatoki Bolos.",
    "gr02.JPG");
  echo "</div>\n";
  
  echo "<h2>Magiczne stałe PHP</h2>\n";
  echo "<ul>";
  echo "<li> __DIR__ : " . __DIR__  . "</li>"; 
  echo "<li> __FILE__: " . __FILE__ . "</li>"; 
  echo "<li> basename(__FILE__): " . basename(__FILE__) . "</li>";
  echo "</ul>";

?>
<br>
</div>
</body>
</html>
