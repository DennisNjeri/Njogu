<?php include 'includes/header.php'; ?>

<section class="">
	
	<!-- content -->
	<div class="container">
		<div class="row">
			<div class="col m6 offset-m3">
				
				<br />
				<div class="card-panel hoverable">
					<span>
			
                		<h4 class="center">
                		    <a href="registration.php" class="orange-text text-lighten-1">
                		        Registration
                		    </a>
                	    </h4>
                        	<?php if( isset( $_GET['status'] ) ){
    						$code = $_GET['status'];
    						//echo "<span class='green-text text-darken-2'><h5>".$code."</h5></span>";
    						echo '
    						    <span class="red-text text-darken-2">
    						        <h6>
    						            '. $code .'
    						        </h6>
    						    </span>
    						';
    					} ?>
						<form method="POST" action="register.php?action=register" 
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
							<input name="email" id="email" type="email" class="validate" 
							pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
							title="Enter a valid email address">
							<label for="email">Email</label>
						</div>

						
						<div class="input-field">
							<input name="location" id="telephone" type="text"
							class="validate" 
							list="kenya_town_list" />
							<datalist id="kenya_town_list"></datalist>
							<label for="location">Location</label>
						</div>
						<div class="input-field">
							<input name="phone" id="telephone" type="tel" 
							class="validate"
							pattern="+2547[0-9]{8}" 
							placeholder="+2547XXxxxXXX">
							<label for="telephone">Telephone</label>
						</div>

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
							<input id="reg_submit_btn" type="submit" 
							class="validate btn" 
							value="Submit Details" />
						</div>
							
						</form>

						<div class="divider"></div>
				
						<br><br>
						<span>
							<a href="login.php" class="btn black-text">
								Have An Account(Sign In)
							</a>
						</span>
					</span>
				</div>
				
				<br />
                <!--<p><button onclick="find">Show my location</button></p>
                <div id="out">...</div>-->

			</div>
		</div>
	</div>

</section><!-- end: Content Wrap -->
<?php include 'includes/footer.php'; ?>