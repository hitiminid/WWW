<?php 
  function myDiv($txt, $class){
    $s = "<div class=\"wider {$class}\">\n";
    $s.= "  " . $txt;
    $s.= "\n</div>\n";
    return $s;
  }
  
  function myCard($title, $info, $img=""){
    $title = trim($title);
    $img   = trim($img);
    $s = "<div class=\"card-info\">\n";
    if ($title !==""){
      $s.= "  <header>{$title}</header>\n";
    }
    if ($img !== ""){
      $s.= "  <img src=\"img/{$img}\">\n";
    }
    $s.= "  <p>{$info}</p>\n";
    $s.= "</div>\n";
    return $s;
  }
?>