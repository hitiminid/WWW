<?php
  require_once(__DIR__."\BaseGenerator.php");

  class HomePageGenerator extends BaseGenerator
  {
    //TODO: panorama as a <img, not css background
    function renderJumbotron($imagePath, $name)
    {
      $content = "
      <div id='panorama'>
        <div id='person-panel'>
          <img src='$imagePath' alt='face'/>
          <h2>$name</h2>
        </div>
      </div>"
    }

    function renderAboutMe($aboutMe)
    {
      $content = "
        <div id='about-me'>
          <p>
            $aboutMe
          </p>
        </div>";
        return $content;
    }

    function renderSubSectionSection($panels)
    {
      $content = "
        <div class='row panels'>
          $panels[0]
          $panels[1]
        </div>";
      return $content;
    }

    function renderSubSectionSection($description, $link, $buttonText)
    {
        $content = "
        <div class='col-2 panel'>
          <p>$subSectionDescription</p>
          <a class='menu-button' href='$link'>$buttonText</a>
        </div>";
        return $content;
    }

  }


?>
