<?php
$HEADER =<<<EOT
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <title>{{TITLE}}</title> 
  <meta name="author" content="Jacek Cichoń">
  <meta name="description" content= "{{DESCRIPTION}}">
  <meta name="viewport" content = "width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="css/mystyle.css">
  <script src="js/application.js"></script>
</head>
<body>
<div id="container">
<header id="main-header">
<h1>Jacek Cichoń</h1>
<span class="subheader">Katedra Informatyki &bull; WPPT &bull; PWr</span>
</header>
EOT;

$FOOTER =<<<EOT
</div>
</body>
</html>   
EOT;

class MyPage {
  private $Title = "";
  private $Description = "";
  
  public function __construct($Title = "") {
    $this->Title = $Title;
  }
  
  public function SetDescription($s){
    $this->Description = $s;
  }
  public function Begin(){
    global $HEADER;
    $s = (string)str_replace(["{{TITLE}}", "{{DESCRIPTION}}"], [$this->Title, $this->Description], $HEADER);
    return $s;
  }
  
  public function End(){
    global $FOOTER;
    return $FOOTER;    
  }
}

?>