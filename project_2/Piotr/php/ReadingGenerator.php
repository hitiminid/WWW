<?php
  require_once(__DIR__."\HobbyGenerator.php");

  class ReadingGenerator extends HobbyGenerator
  {

    function renderYears($years)
    {
      foreach ($years as $$year)
      {
        echo $year;
      }
    }

    function renderYear($year, $bookPanels)
    {
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

    function renderDescription($description)
    {
      $content = "
      <div class='description'>
        <p>$description</p>
      </div>
      ";
      return $content;
    }

    function renderBookPanel($author, $imagePath, $description)
    {
      $content = "
      <div class='col-2 book-panel'>
        <div class='author'>
          <h2>$author</h2>
        </div>
        <div class='book-cover'>
          <img src='$imagePath' alt='zrozumiec_programowanie' />
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
