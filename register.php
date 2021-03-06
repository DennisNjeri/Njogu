<?php

ob_start();

require_once ('includes/PHPMailer/src/PHPMailer.php');
require_once ('includes/PHPMailer/src/SMTP.php');
require_once ('includes/PHPMailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST) && isset($_REQUEST['action'])=='register' ){
    
 	$fname = $_POST['fname'];
 	$lname = $_POST['lname'];
 	$email = $_POST['email'];
 	$phone = $_POST['phone'];
 	$location = $_POST['location'];
 	$password = $_POST['password'];
 	$conpass = $_POST['conpassword'];

 
 	include 'dbconnect.php';

 	$email = mysqli_real_escape_string( $con,$email );

 	$stat = "select * from users where email='$email'";
 	$query = mysqli_query( $con,$stat );

 	if( $query ){
 		$row_cnt = mysqli_num_rows( $query );
 		if( $row_cnt > 0 ){
            $message = "FAILED, the provided email already exists, try another email account";
			//header( "location: registration.php?status=$message" );
			echo "<script type='text/javascript'> document.location = 'registration.php?status=$message'; </script>";

 		} elseif ( $row_cnt == 0 ) {
 			// Success alert
 			$message = "Approved, the provide email is unique in Quantum Scientific Web Application.";

	 		// proceed with login
	 		if($password == $conpass){

	 			$timeTarget = 0.05;
	 			$cost = 8;
	 			do {
	 				$cost++;
	 				$start = microtime(true);
	 				password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
	 				$end = microtime(true);
	 			} while (($end - $start) < $timeTarget);
	 			$options = [
				    'cost' => $cost,
				];
	 			$goodpwd = password_hash( $password, PASSWORD_BCRYPT, $options );
	 			$query = "insert into users (fname,lname,email,phone,location,password) values('$fname','$lname','$email','$phone','$location','$goodpwd')";
	 			$query2= mysqli_query( $con,$query );
	 			if( $query2 ){
	 				
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
	 				$to = $fname."-".$lname; //echo "<br /><br />Sending to [ $to ].<br /><br />";
	 				$mail->AddAddress( $email, $to );
	 				$mail->AddReplyTo("support@quantumscientific.co.ke", "Information");
	 				$mail->WordWrap = 50;
	 				$mail->IsHTML(true);
	 				$mail->Subject = "Registration Alert";
	 				
	 				// START body
		    
		    $mail->Body    = '<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Simple Transactional Email</title>
    <style>
    /* -------------------------------------
        INLINED WITH htmlemail.io/inline
    ------------------------------------- */
    /* -------------------------------------
        RESPONSIVE AND MOBILE FRIENDLY STYLES
    ------------------------------------- */
    @media only screen and (max-width: 620px) {
      table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
      }
      table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
        font-size: 16px !important;
      }
      table[class=body] .wrapper,
            table[class=body] .article {
        padding: 10px !important;
      }
      table[class=body] .content {
        padding: 0 !important;
      }
      table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
      }
      table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
      }
      table[class=body] .btn table {
        width: 100% !important;
      }
      table[class=body] .btn a {
        width: 100% !important;
      }
      table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
      }
    }

    /* -------------------------------------
        PRESERVE THESE STYLES IN THE HEAD
    ------------------------------------- */
    @media all {
      .ExternalClass {
        width: 100%;
      }
      .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
        line-height: 100%;
      }
      .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
      }
      .btn-primary table td:hover {
        background-color: #34495e !important;
      }
      .btn-primary a:hover {
        background-color: #34495e !important;
        border-color: #34495e !important;
      }
    }
    </style>
  </head>
  <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
    <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
      <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
          <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">Your registration status report.</span>
            <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Hi '. $to .',</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            You have successfully registered into Quantum Scientific Web Application.
                        </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            You may now login to access your account.
                        </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                            Welcome!
                        </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
              <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                    <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Quantum Scientific Ltd</span>
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                    Powered by <a href="#" style="color: #999999; font-size: 12px; text-align: center; text-decoration: none;">NDMK Systems</a>.
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
      </tr>
    </table>
  </body>
</html>
';
		    
		    // END body
	 				
	 				//$mail->Body    = "You[ $to ] have successfully registered into Quantum Scientific Web Application, you may now login to access your account. Welcome!";
	 				
		            $mail->AltBody = "You[ $to ] have successfully registered into Quantum Scientific Web Application, you may now login to access your account. Welcome!";
		            
		            if( $mail->Send() ) {
		                $status = "Successful-Registration ";
		                $status_mail = " Email to[ $to ] has been SUCCESSFULLY sent!";
		                //echo "<br /><br />$status_mail<br />";
		                header("location: login.php?status=$status&mail=$status_mail");
		                exit();
		                //echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
		            } else{
		                $error = $mail->ErrorInfo;
		                $status_mail = "E-Mail Error :: $error .";
		                echo "<br />$status_mail<br />";
		            }
	 				
	 			} else{
	 				echo( "FAILED registration!: " . mysqli_error( $con ) );
	 				// final output should not have this technical error output
	 			}
	 		} else{
	 			$message = "Password Mismatch";
	 			header("location: registration.php?status=$message");
	 		}
 		} else{
            //code
 		}
    } else{
        echo( "FAILED query!: " . mysqli_error( $con ) ); 		
    }
								 	
}// end of if-isset()

ob_end_flush();

?>
