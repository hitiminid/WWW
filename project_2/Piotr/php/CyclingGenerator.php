<?php
  require_once(__DIR__."\HobbyGenerator.php");


  class CyclingGenerator extends HobbyGenerator
  {
    function renderDescription($description)
    {
      $content = "
      <div id='cycling-description'>
        <p>
          $description
        </p>
      </div>";
      return $content;
    }

    function renderRoutePanel($mapFilePath, $routeDescription)
    {
      $content = "
      <div class='col-2 route-panel'>
        <img src='$mapFilePath' />
        <div class='map-description'>
          $routeDescription
        </div>
      </div>
      ";
    }
  }
?>
