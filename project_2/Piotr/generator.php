<?php

class PageGenerator
{
  function renderNavbar()
  {
    $navbar = "
    <header>
    <div class='navigation'>
      <ul>
        <li class='navigation-item navigation-left-item'>
          <a href='../index.html'><img src='img/logo.png' alt='logo'/></a>
        </li>
        <li class='navigation-item navigation-right-item'>
          <a href='../hobbies/hobbies.html'>Hobby</a>
        </li>
        <li class='dropdown navigation-right-item'>
          <a href='semesters.html' class='dropbtn'>Semestr</a>
          <div class='dropdown-content'>
            <a href='semester_1.html'>Semestr I</a>
            <a href='semester_2.html'>Semestr II</a>
            <a href='semester_3.html'>Semestr III</a>
            <a href='semester_4.html'>Semestr IV</a>
            <a href='semester_5.html'>Semestr V</a>
            <a href='semester_6.html'>Semestr VI</a>
          </div>
        </li>
      </ul>
    </div>
    </header>";
    return $navbar;
  }

  function renderMain($semesterInfo)
  {
    $mainBegin = "<div id='main'>" . $semesterInfo;
    $mainEnd  = "</div>";

    return $mainBegin .= $mainEnd;
  }

  function renderLecture($lectureName, $whatIHaveLearnedArray, $whatIIntendToLearnArray)
  {
    $lecture = "<div class='lecture'>
      <div class='lecture-header'>
        <h2>$lectureName</h2>
      </div>
      <div class='lecture-content'>
        <div class='row'>
          <div class='col-2 faculty'>
            <div class='faculty-header'>
              <h3>Czego się nauczyłem</h3>
            </div>
            <div class='faculty-content'>
              <div class='list'>
                <ol>
                  <li>$whatIHaveLearnedArray</li>
                  <li>$whatIHaveLearnedArray</li>
                </ol>
              </div>
            </div>
          </div>
          <div class='col-2 faculty'>
            <div class='faculty-header'>
              <h3>Czego chcę się jeszcze nauczyć</h3>
            </div>
            <div class='faculty-content'>
              <div class='list'>
                <ol>
                  <li>$whatIIntendToLearnArray</li>
                  <li>$whatIIntendToLearnArray</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>";
    return $lecture;
      // echo "123";
  }

  function renderSemester($lecturesArray)
  {
    $head = "<div id='lectures'>";
    $tail = "</div>";

    foreach ($lecturesArray as $lecture)
    {
      $head .= $lecture;
    }

    return $head .= $tail;
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
