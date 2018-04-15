<?php
  require_once(__DIR__. DIRECTORY_SEPARATOR . "BaseGenerator.php");

  class EducationGenerator extends BaseGenerator
  {
      function renderEducationPage() {

      }

      function generateDescription($description) {
        return "<div id='about-me'><p>$description</p></div>";
      }

      function generateTimeline($timelineElements) {
        return $this->appendElements("<div class='timeline'>", $timelineElements, "</div>");
      }

      function generateTimelineElement($side, $semester, $link) {
        $element = " <div class='container $side'>
                      <div class='content timeline-element'>
                        <h2>$semester</h2>
                        <a href='$link' class='timeline-button'>Sprawdź</a>
                      </div>
                    </div>";
        return $element;
      }
  }
?>
