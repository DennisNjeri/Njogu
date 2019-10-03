<?php include 'includes/header.php'; ?>

<?php 
 if(!isset($_SESSION['admin'])){
	  header("location:login_admin.php");
} 
//
include 'dbconnect.php';
 $sql = "select * from admin where id = '".$_SESSION['admin_id']."'";
 $query =mysqli_query($con,$sql);
 $result = mysqli_fetch_array($query,MYSQLI_ASSOC);

//code

?>

<section class="">
	
	<!-- content -->
	
	
		<div class="row">
			<div class="col m3">
				
				<div class="card-panel header_links" >
					<span>
						<a href="admin_home.php" class="black-text">
							<h4>
								Welcome
							</h4>
						</a>
						<div class="chip">
							<img src='<?php echo $result['image']; ?> '
							alt="Contact Person">
							<?php echo $_SESSION['admin']; ?>
						</div>
					</span>
				</div>

				
				<ul class="collapsible admin_links">
					<li>
						<div class="collapsible-header">
							<i class="material-icons">account_circle</i>
							Your Account
						</div>
						<div class="collapsible-body">
							<span>
								<ul style="">
									<li>
										<a href="#" 
										class="btn">
											View Profile
										</a>
									</li>
								</ul>
							</span>
						</div>
					</li>

					<li>
						<div class="collapsible-header">
							<i class="material-icons">account_circle</i>
							Accounts
						</div>
						<div class="collapsible-body">
							<span>
								<ul style="">
									<li>
										<a href="admin_add_admin.php" 
										class="btn">
											Add Admin
										</a>
									</li><br />
									<li>
										<a href="admin_all_admin.php" 
										class="btn">
											All Admin
										</a>
									</li>
								</ul>
							</span>
						</div>
					</li>

					<li>
						<div class="collapsible-header">
							<i class="material-icons">settings</i>
							Products
						</div>
						<div class="collapsible-body">
							<span>
								<ul style="">
									<li>
										<a href="admin_add_product.php" 
										class="btn">
											Add Product
										</a>
									</li><br />
									<li>
										<a href="admin_all_product.php" 
										class="btn">
											All Products
										</a>
									</li><br />
									<li>
										<a href="admin_all_category.php" 
										class="btn">
											All Category
										</a>
									</li><br />
									<li>
										<a href="admin_add_category.php" 
										class="btn">
											Add Category
										</a>
									</li>
								</ul>
							</span>
						</div>
					</li>

					<li>
						<div class="collapsible-header">
							<i class="material-icons">person</i>
							Customers
						</div>
						<div class="collapsible-body">
							<span>
								<ul style="">
									<li>
										<a href="admin_add_customer.php" 
										class="btn">
											Add Customer
										</a>
									</li><br>
									<li>
										<a href="admin_all_customer.php" 
										class="btn">
											All Customers
										</a>
									</li>
								</ul>
							</span>
						</div>
					</li>
				</ul>				

			</div><!-- end: link-segment -->

			<div class="col m9 center contentwrap">
				<div class="card-panel">
					<span>
						<a href="admin_add_product.php" class="orange-text text-lighten-1">
							<h4 class="center">Reset Password</h4>
						</a>
						<div class="container">
							<form method="POST" action="admin_add_product.php?action=resetpassword" 
							enctype="multipart/form-data" id="form_reset_password" >

							<div class="input-field">
								<input name="newpassword" id="newpassword" type="password" 
								class="validate">
								<label for="newpassword">New Password</label>
							</div>

							<div class="input-field">
								<input name="cpassword" id="cpassword" type="password" 
								class="validate">
								<label for="cpassword">Confirm Password</label>
							</div>

							<div class="input-field center">
								<input id="resetpwd_btn" type="submit" 
								class="validate btn" 
								value="Reset Password" />
							</div>
								
							</form>
						</div>
					</span>
<?php
	
    if(isset($_POST) && isset($_REQUEST['action']) =='resetpassword'){
    	
    	//c

    }

?>
				</div>
			</div>
		</div>


</section><!-- end: Content Wrap -->

<?php include 'includes/footer.php'; ?>