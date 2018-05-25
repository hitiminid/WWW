<?php
  require_once(__DIR__. DIRECTORY_SEPARATOR ."HobbyGenerator.php");

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
      $alt = substr($mapFilePath, strrpos($mapFilePath, '/') + 1);
      $content = "
      <div class='col-2 route-panel'>
        <img src='$mapFilePath' alt='$alt'/>
        <div class='map-description'>
          $routeDescription
        </div>
      </div>
      ";
      return $content;
    }
  }
?>
