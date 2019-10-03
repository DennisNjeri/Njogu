<?php

// PHPMailer settings

// Placed settings where there are in use( specific page )

/* // Testing if configuration is working
$email = new PHPMailer(TRUE);
if( $email ){
    echo "Email success,continue. <br />";
}else{
    echo "FAILED email, reconfigure";
}*/


// end-PHPMailer general settings

date_default_timezone_set("Africa/Nairobi");

$con = mysqli_connect('46.4.101.197',"quantums_root",'@p5u%YK23$bykh',"quantums_quantums");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>