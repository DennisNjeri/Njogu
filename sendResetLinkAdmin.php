<?php

require_once ('includes/PHPMailer/src/PHPMailer.php');
require_once ('includes/PHPMailer/src/SMTP.php');
require_once ('includes/PHPMailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

date_default_timezone_set("Africa/Nairobi");
	
if( isset($_POST) && !empty($_POST) && isset($_REQUEST['action'])=='requestResetAdmin' ){
    
    include 'dbconnect.php';
    $email = mysqli_real_escape_string( $con, $_POST['email'] );
    
    $statement = "select * from admin where email='$email'";
    $query = mysqli_query( $con, $statement );
    $row = mysqli_fetch_array( $query, MYSQLI_ASSOC );
    $count = mysqli_num_rows( $query );
    if( $count == 1 ) {
        $got_fname = $row['fname'];
        $got_email = $row['email'];
        //echo "<br>Got first-name[ $got_fname ].<br>";
        //echo "<br>Got Email-Address[ $got_email ( $email ) ].<br>";
        
        $mail = new PHPMailer(TRUE);
	    $mail->IsSMTP();
	    $mail->Host = "mail.quantumscientific.co.ke";//Or root.serverke16.com
	    $mail -> Port = 587;
	    $mail -> SMTPSecure = 'mail';
	    $mail->SMTPAuth = true;
	    $mail->SMTPDebug = 0;
	    $mail->Username = "info@quantumscientific.co.ke";
	    $mail->Password = "4%E_1_xQQ}M9";
	    $mail->From = "info@quantumscientific.co.ke";
	    $mail->FromName = "Quantum Scientific Administrator";
	    $to = $row['fname']."-".$row['lname']; //echo "<br /><br />Sending to [ $to ].<br /><br />";
	    $to_email = $email;
	    $mail->AddAddress( $to_email, $to );
	    $mail->AddReplyTo("support@quantumscientific.co.ke", "Information");
	    $mail->WordWrap = 50;
	    $mail->IsHTML(true);
	    $mail->Subject = "Password Reset Request";
	    $secure = md5( $email );
	    $link = "<a href='https://www.samplerun.quantumscientific.co.ke/resetAdmin.php?key=". $email ."'>Click To Reset password</a>";
	    //echo "<br />link :: $link .<br />";
	    $mail->Body    = "<p>You[ $to ] have requested to reset your password. Please use the following link to do so.</p><br /><p>[ $link ]</p>";
	    $mail->AltBody = "<p>You[ $to ] have requested to reset your password. Please use the following link to do so.</p><br /><p>[ $link ]</p>";
	    if( $mail->Send() ) {
	        $message = "Email to[ $to ] has been SUCCESSFULLY sent! Check, to proceed with the password reset";
	        echo "<script type='text/javascript'> document.location = 'requestPasswordResetAdmin.php?status=$message'; </script>";
	    } else{
	        $message = $mail->ErrorInfo;
	        echo "<script type='text/javascript'> document.location = 'requestPasswordResetAdmin.php?status=$message'; </script>";
	    }
        
    } else{
        $message = "Invalid Email, Try Again";
        echo "<script type='text/javascript'> document.location = 'requestPasswordResetAdmin.php?status=$message'; </script>";
    }//End if-count
    
} else{
    $message = "No data received";
    echo "<script type='text/javascript'> document.location = 'requestPasswordResetAdmin.php?status=$message'; </script>";
}// End if-POST

?>