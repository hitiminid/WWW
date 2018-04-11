<?php
class BaseGenerator
{
  function renderNavbar()
  {
    $relativePathToSemesters = "../www/semester/semester_";
    $semester1Path = $relativePathToSemesters . 1 . ".php";
    $semester2Path = $relativePathToSemesters . 1 . ".php";
    $semester3Path = $relativePathToSemesters . 1 . ".php";
    $semester4Path = $relativePathToSemesters . 1 . ".php";
    $semester5Path = $relativePathToSemesters . 1 . ".php";
    $semester6Path = $relativePathToSemesters . 1 . ".php";
    $imagePath = "../img/logo.png";
    $navbar = "
    <header>
    <div class='navigation'>
      <ul>
        <li class='navigation-item navigation-left-item'>
          <a href='../index.html'><img src='$imagePath' alt='logo'/></a>
        </li>
        <li class='navigation-item navigation-right-item'>
          <a href='../hobbies/hobbies.html'>Hobby</a>
        </li>
        <li class='dropdown navigation-right-item'>
          <a href='semesters.html' class='dropbtn'>Semestr</a>
          <div class='dropdown-content'>
            <a href='$semester1Path'>Semestr I</a>
            <a href='$semester2Path'>Semestr II</a>
            <a href='$semester3Path'>Semestr III</a>
            <a href='$semester4Path'>Semestr IV</a>
            <a href='$semester5Path'>Semestr V</a>
            <a href='$semester6Path'>Semestr VI</a>
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

  function renderDivClosingTag() {
    return "</div>";
  }

  // function testObject()
  // {
  //     echo "123";
  // }
  //
  // function testObject()
  // {
  //     echo "123";
  // }

}



 ?>
