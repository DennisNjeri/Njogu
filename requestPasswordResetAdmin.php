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
    					    <a href="requestPasswordResetAdmin.php" class="orange-text text-lighten-1">
    					        Request Password Reset<br />[ Admin ]
    					    </a>
    				    </h4>
				    
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

						<form method="POST" action="sendResetLinkAdmin.php?action=requestResetAdmin" 
						id="form_requestPwdReset" class="">
						    <!-- sendResetLinkAdmin.php -->

						<div class="input-field">
							<input name="email" id="email" type="email" 
							class="validate" 
							pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
							<label for="email">Email</label>
						</div>
						
						<div class="input-field center">
							<input id="submit_request_btn" type="submit" 
							class="validate btn" 
							value="Request" />
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