<?php
  require_once(__DIR__. DIRECTORY_SEPARATOR . "Utility.php");

  class PageGenerator
  {
    private $utilityManager;

    function __construct() {
      $this->utilityManager = new Utility();
    }

    public function generatePageStructure($content) {
      return $this->utilityManager->appendElements("<!DOCTYPE html><html lang='pl'>", $content, "</html>");
    }

    public function generateHead($title, $cssPaths, $jsPaths) {
      $head = "<head><meta charset='utf-8'>";
      $head .= $this->generateTitle($title);
      $head .= $this->addCSSFiles($cssPaths);
      $head .= $this->addJSFiles($jsPaths);
      return $head .= "<meta name='viewport' content='width=device-width, initial-scale=1.0'></head>";
    }

    public function generateBody($content) {
      return $this->utilityManager->appendElements("<body>", $content, "</body>");
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

    private function addJSFiles($jsPaths){
      $js = "";
      if (is_array($jsPaths)) {
        foreach ($jsPaths as $path) {
          $js .= "<script type='text/javascript' src='$path'></script>\n";
        }
      } else {
          $js = "<script type='text/javascript' src='$jsPaths'></script>\n";
      }
      return $js;
    }
  }
?>
