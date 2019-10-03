<?php
if(isset($_POST) && isset($_REQUEST['action'])== 'login'){
				include 'dbconnect.php';

				$email = mysqli_real_escape_string($con,$_POST['email']);
				$password = mysqli_real_escape_string($con,$_POST['password']);

				//$gdpwd=md5($password);

				//$query ="select * from users where email='$email' AND password='$gdpwd'";
				$query ="select * from users where email='$email'";

				$query2 = mysqli_query( $con,$query );

				$row=mysqli_fetch_array( $query2,MYSQLI_ASSOC );

				$got_hash = $row['password'];

				$count = mysqli_num_rows( $query2 );

				if( $count == 1 ) {
				    //printf( 'Credentials Found' );
					if( password_verify( $password, $got_hash ) ){
				        session_start();
						$_SESSION['sessCustomerID']=$row['id'];
						$_SESSION['username']= $row['name'];
						$_SESSION['email']= $row['email'];
					
			  header("location: shopping_cart.php?status='Successful login'");
						
				
						//printf( 'Successful Login' );
					} else{
			header("location: login_cart.php?status='Invalid Password, try again'");
						$message = "Invalid Password, try again";
						printf( $message );
					}
						
	    			
	            } else{
	       header("location: login_cart.php?status='Invalid Credentials, try again'");     
	             	echo 'Invalid Credentials, try again';
	            } 
			}
        ?>