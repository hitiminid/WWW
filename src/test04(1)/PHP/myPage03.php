<?php

define("VISIT_COUNTER_FILE", "countlog.txt");

$HEADER =<<<EOT
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <title>{{TITLE}}</title> 
  <meta name="description" content= "{{DESCRIPTION}}">
  <meta name="author" content="Jacek Cichoń">
  <meta name="viewport" content = "width=device-width, initial-scale=1.0"/>
{{STYLES}}
{{SCRIPTS}}
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

/**
* Klasa sluzaca do generowania stron ustalonej witryny

* @package myPage03
* @author Jacek Cichon
*/
class MyPage {
  private $Title        = "";
  private $Description  = "";
  private $root         = "";
  private $cssfiles     = [];
  private $jsfiles      = [];

  /**
  * Dodaje specyficzne style do strony
  * @param string $filename
  * @return void
  */
  public function AddCSS($filename) {
    $this->cssfiles[] = $filename;
  }

  /**
  * Ustalamy skrypty umieszczane w nagłówku 
  * @param string $filename
  * @return void
  */
  public function AddJS($filename) {
    $this->jsfiles[] = $filename;
  }
  
  /**
  * Ustawienie opisu strony
  * @param string $s
  * @return void
  */
  public function SetDescription($s) {
    $this->Description = $s;
  }
  
  public function __construct($Title = "", $root="") {
    $this->Title = $Title;
    $this->root  = $root;
    $this->AddCSS("reset.css");
    $this->AddCSS("grid.css");
    $this->AddCSS("mystyle.css");
  }

  /**
  * Zwraca lancuch z poczatkiem strony
  * @return string
  */  
  public function Begin() {
    global $HEADER;
    $s = str_replace(["{{TITLE}}", "{{DESCRIPTION}}"], [$this->Title, $this->Description], $HEADER);
    
    //dodajemy style
    $X = [];
    $C = $this->cssfiles;
    $TMP = "  <link rel='stylesheet' href='{{R}}css/{{CSS}}'>\n";
    for ($i = 0; $i < count($C); $i++){
      $X[]= str_replace(["{{R}}", "{{CSS}}"], [$this->root, $C[$i]], $TMP);
    } 
    $s= str_replace("{{STYLES}}", join("\n",$X), $s);
    
    // dodajemy skrypty
    $X = [];
    $C = $this->jsfiles;
    $T = '  <script src="{{R}}js/{{JS}}"></script>' . "\n";
    for ($i = 0; $i < count($this->jsfiles); $i++){
      $X[]= str_replace(["{{R}}", "{{JS}}"], [$this->root, $C[$i]], $T);
    } 
    $s= str_replace("{{SCRIPTS}}", (string) join("\n",$X), $s);
    
    // usuwamy puste linie
    return preg_replace('/^\h*\v+/m', '', $s);
    // \h : any horizontal whitespace character
    // \v : any vertical whitespace character
    // /m : multiline
  }

  /**
  * Zwraca lancuch z zamknieciem strony
  * @return string
  */    
  public function End() {
    global $FOOTER;
    return $FOOTER;    
  }
  
  
  public function GetVisitCounter() {
    $file = $this->root . VISIT_COUNTER_FILE;
    //echo "LICZNIK: " . $file;
    if (file_exists($file)) {
      $r     = fopen($file,"r");
      $count = fgets($r,100);
      fclose($r);
      $count=  $count + 1 ;
    } else {
      $count = 1;
    }      
    $r = fopen($file,"w");
    fwrite($r, $count);
    fclose($r);
    return $count;
   }
}

?>