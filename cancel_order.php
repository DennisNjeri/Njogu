<?php 
if(isset($_POST)){
    //$id = $_POST['id'];
    include 'dbconnect.php';
    $sql= 1;//"update orders set state = 'Cancelled' where id =$id";
    //$query= mysqli_query($con,$sql);
    if($query){
        $message="You have successfully cancelled your order";
        $text="We are trying to test emailing";
       require_once("includes/PHPMailer_5.2.0/class.phpmailer.php");
       $mail = new PHPMailer();
       
       $mail->IsSMTP();
       $mail->SMTPOptions = array(
          'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
          )
       );
       
       // $mail->Host = "smtp.quantumscientific.co.ke";
        $mail->Host = "46.4.101.197";
        //$mail->Host ="smtp.gmail.com";
        $mail -> Port = 587;
        $mail -> SMTPSecure = 'ssl';
        $mail->SMTPAuth = true; 
        $mail->SMTPDebug = 1;
        $mail->Username = "Quantums";  
        $mail->Password = "support12@Q"; 
        
        $mail->From = "support@quantumscientific.co.ke";
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

       
       
       
       
       
       if($mail->Send()) {
          echo "Message sent!";
        } else {
             echo "Mailer Error: " . $mail->ErrorInfo;
        }
       // header("location:custprofile.php?status=$message");
    }
    
}


?>