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
  $autor = "Jacek Cichoń";
  
  echo "<h1>Jestem stroną wygenerowaną przez PHP</h1>\n";
  echo '<p> Tę piękną stronę zbudował {$autor}.</p>\n';
?>
<br>
</div>
</body>
</html>
