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
  function myDiv($txt, $class){
    $s = "<div class=\"wider {$class}\">\n";
    $s.= "  " . $txt;
    $s.= "\n</div>\n";
    return $s;
  }
  
  function myCard($title, $info, $img=""){
    $title = trim($title);
    $img   = trim($img);
    $s = "<div class=\"card-info\">\n";
    if ($title !==""){
      $s.= "  <header>{$title}</header>\n";
    }
    if ($img !== ""){
      $s.= "  <img src=\"img/{$img}\">\n";
    }
    $s.= "  <p>{$info}</p>\n";
    $s.= "</div>\n";
    return $s;
  }
?>

<?php
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
    "gr01.jpg");
  echo myCard(
    "Wakacje 2016",
    "Drugie zdjęcie z laguny Balos",
    "gr02.jpg");
  echo "</div>\n";
  
?>
<br>
</div>
</body>
</html>
