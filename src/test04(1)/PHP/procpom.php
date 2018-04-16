<?php

function GetVisitCounter($file) {
  $count = -1;
  try {
    if (file_exists($file)) {
      $fp = fopen($file, "r");
      $i = fgets($fp, 10);  //max 10 znaków
      if ($i===NULL){
        $i = "0";
      }
      $count = intval($i);
      fclose($fp);
      $count=  $count + 1 ;
    }
    $fp = fopen($file,"w");
    fwrite($fp, $count);
    fclose($fp);
  } catch(Exception $e) {
    echo 'Wyjątek: ',  $e->getMessage(), "\n";
  }
  return $count;
}

function LogClientVisit($file=""){
  $date   = date('Y/m/d H:i:s ', time());
  $client = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP);
  $fp     = fopen("log.txt","a");
  fwrite($fp, $date . " : " . $client . " : " . $file ."\n");
  fclose($fp);
}

class ExecutionTime
{
     private $startTime;
     private $endTime;
 
     public function start(){
         $this->startTime = microtime(true); //true === zwraca float
     }
     public function stop(){
         $this->endTime =  microtime(true);
     }
     public function diff(){
         return $this->endTime - $this->startTime;
     }
}

?>