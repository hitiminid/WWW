<?php
  require_once(__DIR__. DIRECTORY_SEPARATOR . "Utility.php");

  class PageGenerator
  {

    private $utilityManager;

    function __construct() {

    }

    public function renderPage() {

    }

    public function generatePageStructure($content) {
      $utilityManager = new Utility();
      return $utilityManager->appendElements("<!DOCTYPE html><html lang='pl'>", $content, "</html>");
    }

    public function generateHead($title, $cssPaths, $jsPaths) {
      $head = "<head><meta charset='utf-8'>";
      $head .= $this->generateTitle($title);
      $head .= $this->addCSSFiles($cssPaths);
      $head .= $this->addJSFiles($jsPaths);
      return $head .= "</head>";
    }

    public function generateBody($content) {
      $utilityManager = new Utility();
      return $utilityManager->appendElements("<body>", $content, "</body>");
    }

    private function generateTitle($title) {
      return "<title>$title</title>";
    }

    public function addCSSFiles($cssPaths){
      $css = "";
      if (is_array($cssPaths)) {
        foreach ($cssPaths as $path) {
          $css .= "<link rel='stylesheet' type='text/css' href='$path'>\n";
        }
      } else {
          $css = "<link rel='stylesheet' type='text/css' href='$cssPaths'>\n";
      }
      return $css;
    }

    private function addJSFiles($jsFiles){

    }

    public function setDescription(){

    }





  }
?>
