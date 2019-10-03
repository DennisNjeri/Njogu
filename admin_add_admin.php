<?php
session_start();
include 'includes/header.php'; ?>

<?php
 if(!isset($_SESSION['admin'])){
	echo "<script type='text/javascript'> document.location = 'login_admin.php?status='Access Denied, Please Sign In.''; </script>";
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
									</li><br>
									<li>
										<a href="admin_all_product.php" 
										class="btn">
											All Products
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
				<div class="card-panel hoverable">
					<span>
						<a href="admin_add_admin.php" class="orange-text text-lighten-1">
							<h4 class="center">Add New Administrator</h4>
						</a>
						
						<?php
						
						if( isset( $_GET['status'] ) ){
						    $status = $_GET['status'];
						    echo '
						        <p class="green-text center-align">
						        '.$status.'
						        </p>
						    ';
						}
						
						?>

						<form method="POST" action="admin_add_admin.php?action=adminadd" 
						enctype="multipart/form-data" 
						id="form_add_admin" class="">

						<div class="input-field">
							<input name="fname" id="first_name" type="text" 
							class="validate" required="required">
							<label for="first_name">First Name</label>
						</div>

						<div class="input-field">
							<input name="lname" id="last_name" type="text" 
							class="validate" required="required">
							<label for="last_name">Last Name</label>
						</div>

						<div class="input-field">
							<input name="password" id="password" type="password" 
							class="validate" required="required">
							<label for="password">Password</label>
						</div>

						<div class="input-field">
							<input name="cpassword" id="cpassword" type="password" 
							class="validate" required="required">
							<label for="cpassword">Confirm Password</label>
						</div>

						<div class="input-field">
							<input name="email" id="email" type="email" class="validate" required="required">
							<label for="email">Email</label>
						</div>

						<div class="">
							<label for="accountimage" class="left">
								Image
							</label>
							<input name="file" id="accountimage" type="file" class="validate right">
						</div><br /><br />

						<div class="input-field">
							<input name="tel" id="telephone" type="tel" class="validate" required="required">
							<label for="telephone">Telephone</label>
						</div>	
                            <input name="status" id="status" type="hidden" class="validate" value="regular">
						<div class="input-field center">
							<input id="add_admin_btn" type="submit" 
							class="validate btn" 
							value="Add Admin" />
						</div>
							
						</form>

						<div class="divider"></div><br />

						<span>
							<a href="admin_home.php" class="btn black-text">
								Back To Admin Home
							</a>
						</span>
					</span>
					<?php
					if($_POST && isset($_REQUEST['action'])=="adminadd"){
							$fname = $_POST['fname'];
					    	$lname = $_POST['lname'];
					    	$email = $_POST['email'];
					    	$password = $_POST['password'];
					    	$cpassword = $_POST['cpassword'];
					    	$tel = $_POST['tel'];
					    	$status = $_POST['status'];
    	
    	
    	
    	$allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/jpg")
	|| ($_FILES["file"]["type"] == "image/pjpeg")
	|| ($_FILES["file"]["type"] == "image/x-png")
	|| ($_FILES["file"]["type"] == "image/png"))
	&& ($_FILES["file"]["size"] < 5000000)
	&& in_array($extension, $allowedExts))
	  {
	  if ($_FILES["file"]["error"] > 0)
	    {
	    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	    }
	  else
	    {
	   
	    if (file_exists("prod_images/" . $_FILES["file"]["name"]))
	      {
	      echo $_FILES["file"]["name"] . " already exists. ";
	      }
	    else
	      {
	      move_uploaded_file($_FILES["file"]["tmp_name"],
	      "admin_images/".time().$_FILES["file"]["name"]);
	      //echo "Stored in: " . "prod_images/" . $_FILES["file"]["name"];
	      }
	    }
	  }
	else
	  {
	  echo "Invalid file";
	  }
	  if($cpassword !== $password){
	  	//echo "password mismatch";
	  	$message = "Password Mismatch, Try Again";
	  	echo "<script type='text/javascript'> document.location = 'admin_add_admin.php?status=$message'; </script>";
	  }
	  
	  //$passwordc =md5($password);
	  
    $timeTarget = 0.05;
    $cost = 8;
    do {
        $cost++;
        $start = microtime(true);
        password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
        $end = microtime(true);
    } while (($end - $start) < $timeTarget);
    $options = [
        'cost' => $cost,
    ];
    $goodpwd = password_hash( $password, PASSWORD_BCRYPT, $options );
		
	$path = "admin_images/".time().$_FILES["file"]["name"];
	$query ="insert into admin (fname,lname,email,image,telephone,status,password) values('$fname','$lname','$email','$path','$tel','$status','$goodpwd')";
	$query2 = mysqli_query($con, $query);
	if($query2){
		//echo 'success';
		$message = 'Successfully Added A New Administrator.';
		echo "<script type='text/javascript'> document.location = 'admin_add_admin.php?status=$message'; </script>";
	}
	else{
	    //echo "fail".mysqli_error($con);
	    $message = 'Failed To Add New Administrator.';
		echo "<script type='text/javascript'> document.location = 'admin_add_admin.php?status=$message'; </script>";
	}
					}
					?>
				</div>

			</div>
		</div>
	

</section><!-- end: Content Wrap -->

<?php include 'includes/footer.php'; ?>