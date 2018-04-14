<?php
  class HobbyGenerator extends BaseGenerator
  {
    function renderPanorama($title, $imagePath)
    {
      $content = "
      <div id='panorama'>
        <img src='$imagePath' alt='' />
        <div id='title-panel'>
          <h2>$title</h2>
        </div>
      </div>";
    }

    function renderHobbyPanel($title, $imagePath)
    {

        return "
        <div class='col-2 hobbies-panel'>
          <a href='reading.html'>
            <div class='button-tile'>
              <img src='$imagePath' alt='reading' />
              <div class='menu-button'>
                <p>$title</p>
              </div>
            </div>
          </a>
        </div>
        "
        ;
    }
  }
?>
