<?php
session_start();
include 'includes/header.php'; ?>


<?php 

//code

include 'dbconnect.php';
if($_SERVER[REQUEST_METHOD]== "POST"){
$email= mysqli_real_escape_string($con, $_POST['email']);
echo $email;
}

	?>

<section class="" style="height:auto;">

	

	<div class="container">

		<div class="row">
			
			<div class="col m6 offset-m3">
				<div class="row">
					<div class="col s12 m12">
						<a href="details_product.php" class="black-text">
							<h5 class="center">Forgot Password</h5>
						</a>
					</div>
				</div>
			</div>

		</div>

		<div class="row">
			
			<div class="col m3">
				
			</div>

			<div class="col m6">
				<div class="card-panel">
					<span>
					    <p>Enter your email to receive password reset link</p>
					<form method="POST" action="forgot_password.php">
					    <div class="input-field">
							<input type="text" name="email"
								class="validate" required="required">
								<label for="email">Email</label>
							</div>
					   <div class="input-field center">
					         <input type="submit" name="submit" value="Reset Password" class="waves-effect waves-light btn">
					  </div>       
					</form>
					</span>
				</div>
			</div>
         
		</div>

	</div><!-- end: container -->

</section><!-- end: Content Wrap -->

<?php include 'includes/footer.php'; ?>