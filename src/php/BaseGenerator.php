<?php
  class BaseGenerator
  {

    function debugTool($data) {
      $output = $data;
      if (is_array($output)) {
        $output = implode(',', $output);
      }
      echo "<script>console.log('".$output."');</script>";
    }

    function appendElements($begin, $elements, $end) {
      if (is_array($elements)) {
        foreach ($elements as $element) {
          $begin .= $element;
        }
      } else {
        $begin .= $elements;
      }
      return $begin .= $end;
    }

    function generateNavbar($mainPagePath, $imagePath, $semestersPrefix, $hobbyPath) {

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
            <a href='$semestersPrefix' class='dropbtn'>Semestr</a>
            <div class='dropdown-content'>
              <a href='$semestersArray[0]'>Semestr I</a>
              <a href='$semestersArray[1]'>Semestr II</a>
              <a href='$semestersArray[2]'>Semestr III</a>
              <a href='$semestersArray[3]'>Semestr IV</a>
              <a href='$semestersArray[4]'>Semestr V</a>
              <a href='$semestersArray[5]'>Semestr VI</a>
            </div>
          </li>
        </ul>
      </div>
      </header>";
      return $navbar;
    }

    function createSemestersArray($semesterPath) {
      $semesters = [];
      for ($semester = 1; $semester <= 6; $semester++) {
          array_push($semesters, $semesterPath."semester_".$semester.".php");
      }
      return $semesters;
    }

    function generatePanorama($title, $imagePath) {
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

    function renderMain($siteContent) {
      $mainBegin = "<div id='main'>";
      $middle = "";
      if (is_array($siteContent))
      {
        foreach ($siteContent as $content) {
          $middle .= $content;
        }
      } else {
          $middle = $siteContent;
      }

      $mainBegin .= $middle;
      $mainEnd  = "</div>";
      echo $mainBegin .= $mainEnd;
    }

    function renderDivClosingTag() {
      return "</div>";
    }

    function renderFooter() {
      return "<footer></footer>";
    }
  }
 ?>
