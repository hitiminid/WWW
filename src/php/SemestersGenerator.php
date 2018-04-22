<?php
   require_once(__DIR__. DIRECTORY_SEPARATOR ."BaseGenerator.php");

  class SemestersGenerator extends BaseGenerator
  {

    private $utilityManager;
    private $mainPagePath = "../index.php";
    private $imagePath = "../../img/logo.png";
    private $semestersPrefix = "";
    private $hobbyPath = "../hobbies/hobbies.php";

    public function __construct() {
      $this->utilityManager = new Utility();
    }

    public function generateSemesterWithHeader($semester, $time, $lectures) {
      return $this->utilityManager->appendElements("<div id='lectures'><h1 id='semester-number'>$semester</h1><h2 id='semester-time'>$time</h2>", $lectures, "</div>");
    }

    public function generateLectures($lectures) {
      return $this->utilityManager->appendElements("", $lectures, "");
    }

    public function generateLecture($lectureName, $whatIHaveLearnedArray, $whatIIntendToLearnArray) {
      $lecture = "
      <div class='lecture'>
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
                    <li>$whatIHaveLearnedArray[0]</li>
                    <li>$whatIHaveLearnedArray[1]</li>
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
                    <li>$whatIIntendToLearnArray[0]</li>
                    <li>$whatIIntendToLearnArray[1]</li>
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
