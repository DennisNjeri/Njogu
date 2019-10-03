<?php include 'includes/header.php'; ?>

<?php 

//code

?>

<section class="">
	
	<!-- content -->
	<div class="container">
		<div class="row">
			<div class="col m6 offset-m3">
				
				<br />
				<div class="card-panel hoverable">
					<span>
						<a href="registration.php" class="orange-text text-lighten-1">
							<h4 class="center">Registration</h4>
						</a>

						<form method="POST" action="registration.php?action=register" 
						enctype="multipart/form-data" 
						id="form_reg" class="">

						<div class="input-field">
							<input name="fname" id="first_name" type="text" 
							class="validate">
							<label for="first_name">First Name</label>
						</div>

						<div class="input-field">
							<input name="lname" id="last_name" type="text" 
							class="validate">
							<label for="last_name">Last Name</label>
						</div>


						<div class="input-field">
							<input name="email" id="email" type="email" class="validate">
							<label for="email">Email</label>
						</div>

						
						<div class="input-field">
							<input name="location" id="telephone" type="text" class="validate">
							<label for="location">Location</label>
						</div>
						<div class="input-field">
							<input name="phone" id="telephone" type="tel" class="validate">
							<label for="telephone">Telephone</label>
						</div>

						<div class="input-field">
							<input name="password" id="password" type="password" 
							class="validate">
							<label for="password">Password</label>
						</div>

						<div class="input-field">
							<input name="conpassword" id="cpassword" type="password" 
							class="validate">
							<label for="cpassword">Confirm Password</label>
						</div>

						<div class="input-field center">
							<input id="reg_submit_btn" type="submit" 
							class="validate btn" 
							value="Submit Details" />
						</div>
							
						</form>

						<div class="divider"></div><br />
							<?php
								 //include 'dbconnect.php';
								// echo 'good bad';
								 if(isset($_POST) && isset($_REQUEST['action'])=='register' ){
								 	 //echo 'good bad';
								 	$name = $_POST['fname'];
								 	$fname = $_POST['lname'];
								 	$email = $_POST['email'];
								 	$phone = $_POST['phone'];
								 	$location = $_POST['location'];
								 	$password = $_POST['password'];
								 	$conpass = $_POST['conpassword'];

								 	// check if a user with a similar email value is present.
								 	// if present, deny registration and prompt user to change email
								 	include 'dbconnect.php';

								 	$email = mysqli_real_escape_string( $con,$email );

								 	$stat ="select * from users where email='$email'";
								 	$query = mysqli_query( $con,$stat );

								 	if( $query ){
								 		//c
								 	} else{
								 		// Success alert
							 			$message = "Success, no equal value found, for the provided email"
								 		//printf( $message );
								 	}

								 	/*if($password !== $conpass){
							 				echo 'something';
								 	}
								 	else{
								 		$goodpwd = md5($password);
								 		 $query = "insert into users (fname,lname,email,phone,location,password) values('$name','$fname','$email','$phone','$location','$goodpwd')";
								 		$query2= mysqli_query($con,$query);
								 		if($query2){
								 			echo 'success';
								 		}
								 		else{
								 				echo "ni kubaya".mysqli_error($con);
								 		}

								 	}*/
								 }
						?><br><br>
						<span>
							<a href="login.php" class="btn black-text">
								Have An Account(Sign In)
							</a>
						</span>
					</span>
				</div>

			</div>
		</div>
	</div>

</section><!-- end: Content Wrap -->

<?php include 'includes/footer.php'; ?>