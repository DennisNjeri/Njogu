<?php

//echo "Processing Password Reset";
if( isset($_POST) && isset($_REQUEST['action'])=='resetPwd' ){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conpass = $_POST['conpassword'];
    
    if( $password == $conpass ){
        
        include 'dbconnect.php';
        $email = mysqli_real_escape_string( $con,$email );
        $statement = "select * from users where email='$email'";
        $query = mysqli_query( $con, $statement );
        if( $query ){
            $count = mysqli_num_rows( $query );
            if( $count == 1 ) {
                
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
                
                $update_stat = "update users set password='$goodpwd' where email='$email'";
                $updateQuery = mysqli_query( $con, $update_stat );
                if( $updateQuery ){
                    $message = "Successful password reset! You may now sign In.";
                    echo "<script type='text/javascript'> document.location = 'login.php?status=$message'; </script>";
                } else{
                    $message = "Reset FAILED!";
                    echo "<script type='text/javascript'> document.location = 'reset.php?status=$message'; </script>";
                }// End if-update
            } else{
                $message = "Invalid Credentials[Too Many Occurrences]";
                echo "<script type='text/javascript'> document.location = 'reset.php?status=$message'; </script>";
            }// End if-count
        } else{
            $message = "Invalid Credentials[Failed]";
            echo "<script type='text/javascript'> document.location = 'reset.php?status=$message'; </script>";
        }// End if-Query
        
    } else{
        $message = "Password Mismatch! Try again.";
        echo "<script type='text/javascript'> document.location = 'reset.php?status=$message'; </script>";
    }// End if-Pwd_Check
    
} else{
    $message = "Error! No data received!";
}// End if-POST

?>