<?php
   require_once(__DIR__."\BaseGenerator.php");

  class SemestersGenerator extends BaseGenerator
  {

    private $imagePath = "../../img/logo.png";
    private $mainPagePath = "../index.php";
    private $semestersPrefix = "";
    private $hobbyPath = "../hobbies/hobbies.php";

    function getNavbar()
    {
        return parent::renderNavbar($this->mainPagePath, $this->imagePath, $this->semestersPrefix, $this->hobbyPath);
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

    //semestr 1 2015/2016
    function renderHeader()
    {
      return null;
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
    }
  }
?>
