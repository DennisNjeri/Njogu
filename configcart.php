<?php

date_default_timezone_set("Africa/Nairobi");

//DB details
$dbHost = '46.4.101.197';
$dbUsername = 'quantums_root';
$dbPassword = '@p5u%YK23$bykh';
$dbName = 'quantums_quantums';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}

// PHPMailer settings

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Exception class. */
require 'includes/PHPMailer/src/Exception.php';

/* The main PHPMailer class. */
require 'includes/PHPMailer/src/PHPMailer.php';

/* SMTP class, needed if you want to use SMTP. */
require 'includes/PHPMailer/src/SMTP.php';

/* // Testing if configuration is working
$email = new PHPMailer(TRUE);
if( $email ){
    echo "Email success,continue";
}else{
    echo "FAILED email, reconfigure";
}
*/

// end-PHPMailer general settings

?>