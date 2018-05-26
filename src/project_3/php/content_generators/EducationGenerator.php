w<?php
  require_once(__DIR__. DIRECTORY_SEPARATOR . "BaseGenerator.php");

  class EducationGenerator extends BaseGenerator
  {
      private $utilityManager;

      public function __construct() {
        $this->utilityManager = new Utility();
      }

      function generateDescription($description) {
        return "<div id='about-me'>\n<p>$description</p>\n</div>\n";
      }

      function generateTimeline($timelineElements) {
        return $this->utilityManager->appendElements("<div class='timeline'>\n", $timelineElements, "</div>\n");
      }

      function generateTimelineElement($side, $semester, $link) {
        $element = "<div class='container $side'>
                      <div class='content timeline-element'>
                        <h2>$semester</h2>
                        <a href='$link' class='timeline-button'>Sprawdź</a>
                      </div>
                    </div>";
        return $element;
      }
  }
?>
