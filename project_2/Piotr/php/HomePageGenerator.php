<?php

  require_once(__DIR__."\BaseGenerator.php");

  class HomePageGenerator extends BaseGenerator
  {
    //TODO: panorama as a <img, not css background
    function generatePanoramaWithInnerImage($backgroundPath, $facePath, $name) {
      $content = "
      <div id='panorama'>
        <img src='$backgroundPath' />
        <div id='person-panel'>
          <img src='$facePath' alt='face'/>
          <h2>$name</h2>
        </div>
      </div>";
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

    function generatePanel($description, $link, $buttonText)
    {
        $content = "
        <div class='col-2 panel'>
          <p>$description</p>
          <a class='menu-button' href='$link'>$buttonText</a>
        </div>";
        return $content;
    }
  }
?>
