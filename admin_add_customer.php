<?php 
session_start();
include 'includes/header.php'; ?>
<?php 
 if(!isset($_SESSION['admin'])){
	 	 echo "<script type='text/javascript'> document.location = 'login_admin.php'; </script>";
} 
//
include 'dbconnect.php';
 $sql = "select * from admin where id = '".$_SESSION['admin_id']."'";
 $query =mysqli_query($con,$sql);
 $result = mysqli_fetch_array($query,MYSQLI_ASSOC);

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
										<a href="admin_home.php" 
										class="btn">
											View Profile
										</a>
									</li><br />
									<li>
										<a href="admin_change_pswd.php" 
										class="btn">
											Change Password
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
						<li>
						<div class="collapsible-header">
							<i class="material-icons">business_center</i>
							Sales Report
						</div>
						<div class="collapsible-body">
							<span>
								<ul style="">
									<li>
										<a href="admin_sales.php" 
										class="btn">
											Generate Report
										</a>
									</li><br>
									
								</ul>
							</span>
						</div>
					</li>
				</ul>				

			</div><!-- end: link-segment -->

			<div class="col m9 center contentwrap">
				<div class="card-panel">
					<span>
						<a href="admin_add_customer.php" class="orange-text text-lighten-1">
							<h4 class="center">Add Customer</h4>
						</a>
						<div class="container">
							<form method="POST" action="admin_add_customer.php" 
							enctype="multipart/form-data" >

							<div class="input-field">
								<input name="name" id="first_name" type="text" 
								class="validate" required="required">
								<label for="first_name">Customer Name</label>
							</div>

							<div class="input-field">
								<input name="email" id="email" type="email" class="validate" required="required">
								<label for="email">Email</label>
							</div>

							<div class="input-field">
								<input name="tel" id="telephone" type="tel" class="validate" required="required">
								<label for="telephone">Telephone</label>
							</div>

							<div class="input-field center">
								<input id="add_customer_btn" type="submit" 
								class="validate btn" 
								value="Add Customer" />
							</div>
								
							</form>
						</div>
					</span>
					<?php
                    
                        if($_POST){
				        $name = $_POST['name'];
				    	$email = $_POST['email'];
				    	$telephone = $_POST['tel'];
				    	$query ="insert into customers (name, email, telephone) values('$name','$email','$telephone')";
					     $query2 = mysqli_query($con, $query);
					     if($query2){
					     	echo "Success";
					     }
					 }

?>

				</div>
			</div>
		</div>


</section><!-- end: Content Wrap -->

<?php include 'includes/footer.php'; ?>