<?php 
session_start();
include 'includes/header.php'; 
if(isset($_SESSION['admin'])){
	header("location:admin_home.php");
}

?>

<section class="">
	
	<!-- content -->
	<div class="container">
		<div class="row">
			<div class="col m6 offset-m3">
				
				<br />
				<div class="card-panel hoverable">
					<span>
						<a href="login_admin.php" class="orange-text text-lighten-1">
							<h4 class="center">Administrator Log In</h4>
						</a>
						
						<?php
						
						if( isset( $_GET['status'] ) ){
						    $status = $_GET['status'];
						    echo '
						    <p>
						    '. $status .'
						    </p>
						    ';
						}
						
						?>

						<form method="POST" action="login_admin.php?action=login" enctype="multipart/form-data" 
						id="form_login" class="">

						<div class="input-field">
							<input name="email" id="email" type="email" 
							class="validate">
							<label for="email">Email</label>
						</div>

						<div class="input-field">
							<input name="password" id="password" type="password" 
							class="validate">
							<label for="password">Password</label>
						</div>	

						<div class="input-field center">
							<input id="reg_submit_btn" type="submit" 
							class="validate btn" 
							value="Gain Access" />
						</div>
							
						</form>

						<div class="divider"></div><br />

						<span>
							<a href="index.php" class="btn black-text">
								Home
							</a>
							<a href="admin_home.php" class="btn black-text">
								Admin Home
							</a>
							<a href="requestPasswordResetAdmin.php" class="btn black-text right">
								Forgot Password
							</a>
						</span>
					</span>
				</div>
	<?php
		if(isset($_POST) && isset($_REQUEST['action'])== 'login'){
            include 'dbconnect.php';

			$email = mysqli_real_escape_string($con,$_POST['email']);
			$password = mysqli_real_escape_string($con,$_POST['password']);
			
			//$gdpwd=md5($password);
            //echo $email ." ".$gdpwd;

			//$query ="select * from admin where email='$email' AND password='$gdpwd'";
			$query ="select * from admin where email='$email'";
			
			$query2 = mysqli_query( $con,$query );
			
			$row=mysqli_fetch_array( $query2,MYSQLI_ASSOC );
			
			$got_hash = $row['password'];
			
			$count = mysqli_num_rows( $query2 );
			
			if( $count == 1 ) {
			    if( password_verify( $password, $got_hash ) ){
			        
			        
			        $_SESSION['admin']=$row['lname'];
			        $_SESSION['username']= $row['fname'];
			        $_SESSION['admin_id'] = $row['id'];
			        $message = 'Login Successful';
			        echo "<script type='text/javascript'> document.location = 'admin_home.php?status=$message'; </script>";
			        
			    }// END if-password-verify
			    else{
			        $message = 'Invalid Password, Try Again';
			        echo "<script type='text/javascript'> document.location = 'login_admin.php?status=$message'; </script>";
			    }// END else-password-verify
			}// END if-count==1
			else{
			    $message = 'Invalid Email Credential, Try Again';
			    echo "<script type='text/javascript'> document.location = 'login_admin.php?status=$message'; </script>";
			}// END else-count==1

			/*if($query2){
				echo "Something Good<br>";
			}
			else{
			    echo "Something bad<br>";
            }
						
			$row=mysqli_fetch_array($query2,MYSQLI_ASSOC);
			echo $row['id']."<br>";
			$count = mysqli_num_rows( $query2 );
			if($count > 0) {
				session_start();
				$_SESSION['admin']=$row['lname'];
				$_SESSION['username']= $row['fname'];
				$_SESSION['admin_id'] = $row['id'];
				echo "<script type='text/javascript'> document.location = 'admin_home.php'; </script>";
				printf( "Login Successful, you can now access your account" );
			}
		    else{
				echo 'Invalid Credentials';
				echo "<script type='text/javascript'> document.location = 'login_admin.php?status=Invalid-Credentials-Try-Again'; </script>";

            }*/ 
        }
	?>
			</div>
		</div>
	</div>

</section><!-- end: Content Wrap -->

<?php include 'includes/footer.php'; ?>