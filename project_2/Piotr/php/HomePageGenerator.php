<?php
  require_once(__DIR__."\BaseGenerator.php");

  class HomePageGenerator extends BaseGenerator
  {
    function renderJumbotron()
    {

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

    function renderSubSectionPanel()
    {
      $content = "";


      return $content;
    }
  }


?>
