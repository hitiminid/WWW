<?php
  require_once(__DIR__."\HobbyGenerator.php");


  class CyclingGenerator extends HobbyGenerator
  {

    private $utilityManager;

    public function __construct() {
      $this->utilityManager = new Utility();
    }

    function generateDescription($description) {
      $content = "
      <div id='cycling-description'>
        <p>
          $description
        </p>
      </div>";
      return $content;
    }

    function generateMapSection($mapPanels) {
      return $this->utilityManager->appendElements("<div id='maps' class='row'>", $mapPanels, "</div>");
    }

    function generateRoutePanel($mapFilePath, $routeDescription) {
      $content = "
      <div class='col-2 route-panel'>
        <img src='$mapFilePath' />
        <div class='map-description'>
          $routeDescription
        </div>
      </div>
      ";
      return $content;
    }
  }
?>
