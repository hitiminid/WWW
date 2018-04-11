<?php
  class HobbyGenerator extends BaseGenerator
  {
    function renderPanorama($title, $imagePath) {
      $content = "
      <div id='panorama'>
        <div id='title-panel'>
          <h2>$title</h2>
        </div>
      </div>";
    }
  }
?>
