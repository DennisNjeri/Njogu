<?php
$message="You have successfully cancelled your order";
$text="We are trying to test emailing";
echo "<br>".$message;
echo "<br>".$text;

require_once ('PHPMailer-master/src/PHPMailer.php');
require_once ('PHPMailer-master/src/SMTP.php');
require_once ('PHPMailer-master/src/Exception.php');
   echo "<br>Bado tunazidi na life polepole";    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
echo "<br>Bado tunazidi na life polepole 3"; 
       $mail = new PHPMailer();
       
       $mail->IsSMTP();/*
       $mail->SMTPOptions = array(
          'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
          )
       );*/
       
       // $mail->Host = "smtp.quantumscientific.co.ke";
        $mail->Host = "mail.quantumscientific.co.ke";//Or root.serverke16.com
        //$mail->Host ="smtp.gmail.com";
        $mail -> Port = 587;
        $mail -> SMTPSecure = 'mail';
        $mail->SMTPAuth = true; 
        $mail->SMTPDebug = 3;
        $mail->Username = "info@quantumscientific.co.ke";
        $mail->Password = "4%E_1_xQQ}M9";
        
        $mail->From = "info@quantumscientific.co.ke";
        //$mail->From = "dennisnjogu95@gmail.com";
        $mail->FromName = "Leena";
        $mail->AddAddress("dennisnjogu95@gmail.com", "Josh Adams");
        //$mail->AddAddress("ellen@example.com");                 
        $mail->AddReplyTo("support@quantumscientific.co.ke", "Information");
        
        $mail->WordWrap = 50;
        //$mail->AddAttachment("/var/tmp/file.tar.gz");       
        //$mail->AddAttachment("/tmp/image.jpg", "new.jpg");   
        $mail->IsHTML(true);
        
        $mail->Subject = "Here is the subject";
        $mail->Body    = "This is the HTML message body in bold!";
        $mail->AltBody = "This is the body in plain text for non-HTML mail clients";

       echo "<br>Bado tunazidi na life polepole";
       
       
       
       
       if($mail->Send()) {
          echo "Message sent!";
        } else {
             echo "Mailer Error: " . $mail->ErrorInfo;
        }
        
        
        
        
        ?>