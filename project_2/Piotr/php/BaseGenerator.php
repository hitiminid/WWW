<?php
  class BaseGenerator
  {

    function debugTool($data)
    {
      $output = $data;
      if (is_array($output))
      {
        $output = implode(',', $output);
      }
      echo "<script>console.log('".$output."');</script>";
    }

    function createSemestersArray($semesterPath)
    {
      $semesters = [];
      for ($semester = 1; $semester <= 6; $semester++)
      {
          array_push($semesters, $semesterPath."semester_".$semester.".php");
      }
      return $semesters;
      // return $semesterPath . "/semester_" . $semesterNumber . ".php";
    }

    /*
      educationPaths [0 => education.php, 1 => semester_1.php, ...]
    */
    function renderNavbar($mainPagePath, $imagePath, $semestersPrefix, $hobbyPath)
    {

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

    /* Used for rendering wide picture used main page of each page section */
    //TODO: panoramas are handled via src in CSS, check it
    function renderPanorama($imagePath)
    {
      $content = "<div id='panorama'>
                    <div id='person-panel'>
                      <h2>$title</h2>
                    </div>
                  </div>";
      return $content;
    }

    function renderMain($siteContent)
    {
      $mainBegin = "<div id='main'>" . $siteContent;
      $mainEnd  = "</div>";
      return $mainBegin .= $mainEnd;
    }

    function renderDivClosingTag()
    {
      return "</div>";
    }

    function renderFooter()
    {
      return "<footer></footer>";
    }
  }
 ?>
