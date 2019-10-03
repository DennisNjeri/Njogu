<?php

session_start();
include 'includes/header.php';
if( isset( $_POST['code'] ) ){
	$status = $_POST['code'];

}
include 'dbconnect.php';

$tafuta = "select * from users where id = $status ";
$matokeo = mysqli_query($con,$tafuta);
$jibu = mysqli_fetch_array($matokeo, MYSQLI_ASSOC);

//echo $_SESSION['admin_id']." hakuna mambo";
//echo $_SESSION['admin']." hakuna mambo kdsfek";

if( !isset( $_SESSION['admin'] ) ){
   echo "<script type='text/javascript'> document.location = 'login_admin.php'; </script>";
    
    //echo "<script type='text/javascript'> document.location = 'login_admin.php'; </script>";
    
    //header( "Location: login_admin.php?status=access-denied" );
    //header('Location: https://samplerun.quantumscientific.co.ke/login_admin.php?status=access-denied');
} 


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

			<div class="col m9 contentwrap">
				
				<div class="card-panel">
					<span>
						
						<a href="admin_home.php" class="blue-text text-lighten-1">
							<h4 class="center">
								Customer Details 
							</h4>
						</a>

					<table class="striped">
					    <caption class="green-text">Your Details</caption>
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<th>Location</th>
								<th>Telephone</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td> <?php echo $jibu['fname']; ?> </td>
								<td> <?php echo $jibu['lname']; ?> </td>
								<td> <?php echo $jibu['email']; ?> </td>
									<td> <?php echo $jibu['location']; ?> </td>
										<td> <?php echo $jibu['phone']; ?> </td>
							
							</tr>
						</tbody>
					</table>

					</span>
				</div>

			</div><!-- end: content-segment -->
		</div>
	

</section><!-- end: Content Wrap -->

<?php include 'includes/footer.php'; ?>