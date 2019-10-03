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
    					    <a href="login.php" class="orange-text text-lighten-1">
    					        Sign In
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

						<form method="POST" action="logcart_process.php?action=login" enctype="multipart/form-data" 
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
		
						<br><br>
						<span>
							<a href="registration.php" class="btn black-text">
								No Account(Sign Up)
							</a>
						</span>
					</span>
				</div>

			</div>
		</div>
	</div>

</section><!-- end: Content Wrap -->

<?php include 'includes/footer.php'; ?>