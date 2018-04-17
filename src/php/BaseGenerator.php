<?php

  require_once(__DIR__. DIRECTORY_SEPARATOR . "Utility.php");

  class BaseGenerator
  {

    public function generateNavbar($mainPagePath, $imagePath, $semestersPrefix, $hobbyPath) {
      $semestersArray = $this->createSemestersArray($semestersPrefix);
      $navbar = "
      <header>
      <div class='navigation'>
        <ul>
          <li class='navigation-item navigation-left-item'>
            <a href='$mainPagePath'><img src='$imagePath' alt='logo'/></a>
          </li>
          <li class='navigation-item navigation-right-item'>
            <a href='$hobbyPath'>Hobby</a>
          </li>
          <li class='dropdown navigation-right-item'>
            <a href='$semestersArray[0]' class='dropbtn'>Semestr</a>
            <div class='dropdown-content'>
              <a href='$semestersArray[1]'>Semestr I</a>
              <a href='$semestersArray[2]'>Semestr II</a>
              <a href='$semestersArray[3]'>Semestr III</a>
              <a href='$semestersArray[4]'>Semestr IV</a>
              <a href='$semestersArray[5]'>Semestr V</a>
              <a href='$semestersArray[6]'>Semestr VI</a>
            </div>
          </li>
        </ul>
      </div>
      </header>";
      return $navbar;
    }

    private function createSemestersArray($semesterPath) {
      $semesters = [];
      array_push($semesters, $semesterPath."education.php");
      for ($semester = 1; $semester <= 6; $semester++) {
          array_push($semesters, $semesterPath."semester_".$semester.".php");
      }
      return $semesters;
    }

    public function generatePanorama($title, $imagePath) {
      $alt = substr($title, strrpos($title, '/'));
      $content = "
      <div id='panorama'>
        <img src='$imagePath' alt='$alt' />
        <div id='title-panel'>
          <h2>$title</h2>
        </div>
      </div>";
      return $content;
    }

    public function generateMain($siteContent) {
      $mainBegin = "<div id='main'>";
      $middle = "";
      if (is_array($siteContent)) {
        foreach ($siteContent as $content) {
          $middle .= $content;
        }
      } else {
          $middle = $siteContent;
      }

      $mainBegin .= $middle;
      $mainEnd  = "</div>";
      return $mainBegin .= $mainEnd;
    }

    public function renderDivClosingTag() {
      return "</div>";
    }

    public function generateFooter() {
      return "<footer></footer>";
    }
  }
 ?>
