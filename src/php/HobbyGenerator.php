<?php
require_once(__DIR__. DIRECTORY_SEPARATOR . "BaseGenerator.php");

  class HobbyGenerator extends BaseGenerator
  {
    function generateDescription($content) {
      return  "<div id='main-description'><p>$content</p></div>";
    }

    function generateHobbiesMenu($rows) {
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

    function renderHobbyPanel($title, $pagePath, $imagePath) {

        return "
        <div class='col-2 hobbies-panel'>
          <a href='$pagePath'>
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
