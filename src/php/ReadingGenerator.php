<?php
  require_once(__DIR__."\HobbyGenerator.php");

  class ReadingGenerator extends HobbyGenerator
  {

    function generateYearsSection($years) {
      $utilityManager = new Utility();
      return $utilityManager->appendElements("<div id='content'>", $years, "</div>");
    }

    function generateYear($year, $bookPanels) {
      $content = "
      <div class='year'>
        <div class='year-content'>
          <h2 class='year-number'>$year</h2>
          <div class='row'>
            $bookPanels[0]
            $bookPanels[1]
          </div>
        </div>
      </div>";
      return $content;
    }

    function renderDescription($description) {
      $content = "
      <div class='description'>
        <p>$description</p>
      </div>
      ";
      return $content;
    }

    function generateBookPanel($author, $imagePath, $description) {
      $alt = substr($imagePath, strrpos($imagePath, '/'));
      $content = "
      <div class='col-2 book-panel'>
        <div class='author'>
          <h2>$author</h2>
        </div>
        <div class='book-cover'>
          <img src='$imagePath' alt='$alt' />
        </div>
        <div class='description'>
          <p>
            $description
          </p>
        </div>
      </div>";
      return $content;
    }
  }
?>
