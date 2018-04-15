<?php
require_once(__DIR__."\BaseGenerator.php");

  class HobbyGenerator extends BaseGenerator
  {
    function renderWidePicture($title, $imagePath) {
      $content = "
      <div id='panorama'>
        <img src='$imagePath' alt='' />
        <div id='title-panel'>
          <h2>$title</h2>
        </div>
      </div>";
      return $content;
    }

    function renderDescription($content) {
      // $description =
      // $description .= $content;
      return  "<div id='main-description'><p>$content</p></div>";
    }

    function renderHobbiesMenu($rows) {
      $content = "<div id='hobbies-menu'>";
      if (is_array($rows)) {
        foreach ($rows as $row) {
          $content .= $row;
        }
      } else {
        $content .= $rows;
      }
      return $content .= "</div>";
    }

    function renderHobbiesRow($hobbies) {
      $content = "<div class='row'>";
      if (is_array($hobbies)) {
        foreach ($hobbies as $hobby) {
          $content .= $hobby;
        }
      } else {
        $content .= $hobby;
      }
      return $content .= "</div>";
    }

    function renderHobbyPanel($title, $imagePath) {

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
