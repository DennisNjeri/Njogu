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
						
    					<h4 class="center">
    					    <a href="reset.php" class="orange-text text-lighten-1">
    					        Reset Password<br />[ Admin ]
    					    </a>
    				    </h4>
				    
						<?php if( isset( $_GET['key'] ) ){
    						$key_email = $_GET['key'];
    						echo '
    						    <span class="blue-text text-lighten-1">
    						        <h6>
    						            You[ '. $key_email .' ],<br /> may now proced with the reset.
    						        </h6>
    						    </span>
    						';
    					} ?>
    					<?php if( isset( $_GET['status'] ) ){
    						$code = $_GET['status'];
    						echo '
    						    <span class="green-text text-lighten-1">
    						        <h6>
    						            '. $code .'
    						        </h6>
    						    </span>
    						';
    					} ?>

						<form method="POST" action="processPwdRequestAdmin.php?action=resetPwdAdmin" 
						id="form_pwdReset" class="">
						    <!-- processPwdRequestAdmin.php -->

						<input type="hidden" name="email" value="<?php echo $key_email;?>" />
						
						<p>Enter New password</p>
						
						<div class="input-field">
							<input name="password" id="password" type="password" class="validate"
							pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
							title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
							<label for="password">Password</label>
						</div>

						<div class="input-field">
							<input name="conpassword" id="cpassword" 
							type="password" 
							class="validate" 
							pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
							title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
							<label for="cpassword">Confirm Password</label>
						</div>
						
						<div class="input-field center">
							<input id="submit_request_btn" type="submit" 
							class="validate btn" 
							value="Reset" />
						</div>
							
						</form>

						<div class="divider"></div><br />
		
						<br>
						<span>
							<a href="login_admin.php" class="btn black-text">
								Sign in
							</a>
						</span>
					</span>
				</div>

			</div>
		</div>
	</div>

</section><!-- end: Content Wrap -->

<?php include 'includes/footer.php'; ?>