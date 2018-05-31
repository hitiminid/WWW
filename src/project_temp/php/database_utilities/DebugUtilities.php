<?php 

  class DebugUtilities {
    public function debugLog($data) {
      $output = $data;
      if (is_array($output)) {
        $output = implode(',', $output);
      }
      echo "<script>console.log('".$output."');</script>";
    }
  }

?>