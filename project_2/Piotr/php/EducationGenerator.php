<?php
  require_once(__DIR__."\BaseGenerator.php");

  class EducationGenerator extends BaseGenerator
  {
      function renderEducationPage()
      {

      }

      function renderTimeline($body)
      {
        $element = "<div class='timeline'>" + $body + renderDivClosingTag();
        return $element;
      }

      function renderTimelineElement($side, $semester, $link)
      {
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
