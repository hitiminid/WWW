<?php

  require_once(__DIR__."/BaseGenerator.php");

  class HomePageGenerator extends BaseGenerator
  {

    function generatePanoramaWithInnerImage($backgroundPath, $facePath, $name) {
      $altBackground = substr($backgroundPath, strrpos($backgroundPath, '/') + 1);
      $altFace       = substr($facePath, strrpos($facePath, '/') + 1);
      $content = "
      <div id='panorama'>
        <img src='$backgroundPath' alt='$altBackground'/>
        <div id='panorama-panel'>
          <img src='$facePath' alt='$altFace'/>
          <h2>$name</h2>
        </div>
      </div>\n";
      return $content;

    }

    function generateAboutMe($aboutMe) {
        return "<div id='about-me'><p>$aboutMe</p></div>";
    }

    function generateSubSectionPanels($panels) {
      $content = "
        <div class='row panels'>
          $panels[0]
          $panels[1]
        </div>";
      return $content;
    }

    function generatePanel($description, $link, $buttonText) {
        $content = "
        <div class='col-2 panel'>
          <p>$description</p>
          <a class='menu-button' href='$link'>$buttonText</a>
        </div>";
        return $content;
    }
  }
?>
