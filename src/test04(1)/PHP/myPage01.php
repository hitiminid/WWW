<?php

class MyPage {
  private $Title = "";
  
  public function __construct($Title = "") {
    $this->Title = $Title;
  }
  
  public function Begin(){
    $s = "<!DOCTYPE html>\n";
    $s.= "<html lang='pl'>\n";
    $s.= "<head>\n";
    $s.= "<meta charset='utf-8'>\n";
    $s.= "<title>" . $this->Title . "</title>\n"; 
    $s.= "<meta name='author' content='Jacek Cichoń'>\n";
    $s.= "<meta name='viewport' content = 'width=device-width, initial-scale=1.0'/>\n";
    $s.= "<link rel='stylesheet' href='css/reset.css'>\n";
    $s.= "<link rel='stylesheet' href='css/grid.css'>\n";
    $s.= "<link rel='stylesheet' href='css/mystyle.css'>\n";
    $s.= "<script src='js/application.js'></script>\n";
    
    $s.= "</head>\n";
    $s.= "<body>\n";
    $s.= "<div id='container'>\n";
    return $s;
  }
  
  public function End(){
    $s = "</div>\n";
    $s.= "</body>\n";
    $s.= "</html>";   
    return $s;    
  }
}

?>