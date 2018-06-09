<?php
  require_once(__DIR__. DIRECTORY_SEPARATOR . "Utility.php");

  class PageGenerator
  {
    private $utilityManager;

    function __construct() {
      $this->utilityManager = new Utility();
    }
    
    public function generatePageStructure($content) {
      return $this->utilityManager->appendElements("<!DOCTYPE html>\n<html lang='pl'>\n", $content, "</html>");
    }

    public function generateHead($title, $cssPaths, $jsPaths) {
      $head = "<head>\n<meta charset='utf-8'>\n<meta name='viewport' content='width=device-width, initial-scale=1.0'>\n";
      $head .= $this->generateTitle($title);
      $head .= $this->addCSSFiles($cssPaths);
      $head .= $this->addJSFiles($jsPaths);
      $head .= "<script src='https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-MML-AM_CHTML' async></script>";
      $head .= "<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>\n";
      return $head .= "</head>\n";
    }

    public function generateBody($content) {
      return $this->utilityManager->appendElements("<body>\n", $content, "</body>\n");
    }

    private function generateTitle($title) {
      return "<title>$title</title>\n";
    }

    public function addCSSFiles($cssPaths){
      if (!empty($cssPaths) || !is_null($cssPaths)) {
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
    }

    public function addJSFiles($jsPaths){
      if (!empty($jsPaths) || !is_null($jsPaths)) {
        $js = "";
        if (is_array($jsPaths)) {
          foreach ($jsPaths as $path) {
            $js .= "<script defer src='$path'></script>\n";
          }
        } else {
            $js = "<script defer src='$jsPaths'></script>\n";
        }
        return $js;
      }
    }
  }
?>
