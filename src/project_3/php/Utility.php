<?php

  class Utility
  {
    public function debugTool($data) {
      $output = $data;
      if (is_array($output)) {
        $output = implode(',', $output);
      }
      echo "<script>console.log('".$output."');</script>";
    }

    function appendElements($begin, $elements, $end) {
      if (is_array($elements)) {
        foreach ($elements as $element) {
          $begin .= $element;
        }
      } else {
        $begin .= $elements;
      }
      return $begin .= $end;
    }
  }
?>
