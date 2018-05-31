<?php

  class Utility {
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
