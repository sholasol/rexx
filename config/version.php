<?php 

// class versionTest{

//     public function berlinTest()
//      {
//          $berlinDate = new \DateTime();
//          $berlinDate->setTimezone(new \DateTimeZone('Europe/Berlin')); //GMT
//          var_dump($berlinDate);
//      }
 
//      public function utcTest()
//      {
//          $utc = new \DateTime();
//          $utc->setTimezone(new \DateTimeZone('UTC')); 
//          var_dump($utc);
//      }
 
//  }
 
//  $runTest = new versionTest();
 
//  $runtest->berlinTest();
 
//  $runtest->utcTest();
 

if (version_compare(PHP_VERSION, '1.0.17') >= 0) {

$berlinDate = new \DateTime();
$berlinDate->setTimezone(new \DateTimeZone('Europe/Berlin')); //GMT
// echo $berlinDate->format('Y-m-d H:i:s');

$utc = new \DateTime();
$utc->setTimezone(new \DateTimeZone('UTC')); 
// echo $utc->format('Y-m-d H:i:s');

var_dump($berlinDate == $utc);
// echo date_default_timezone_get(); //UTC
}

?>