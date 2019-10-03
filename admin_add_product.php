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
						<a href="admin_add_product.php" class="orange-text text-lighten-1">
							<h4 class="center">Add Product</h4>
						</a>
						<div class="container">
							<form method="POST" action="admin_add_product.php?action=addprod" 
							enctype="multipart/form-data" id="form_add_product" >

							<div class="input-field">
								<input name="name" id="prod_name" type="text" 
								class="validate" required="required"> 
								<label for="prod_name">Product Name</label>
							</div>

							<div class="input-field">
								<input name="description" id="prod_description" type="text" 
								class="validate" required="required">
								<label for="prod_description">Description</label>
							</div>
							<div class="input-field">
								<input name="m_code" id="prod_description" type="text" 
								class="validate" required="required">
								<label for="prod_description">Manufacturer code</label>
							</div>
							<div class="input-field">
								<input name="q_code" id="prod_description" type="text" 
								class="validate" required="required">
								<label for="prod_description">Quantum code</label>
							</div>
								<div class="input-field">
								<input name="quantity" id="prod_description" type="number" 
								class="validate" required="required">
								<label for="prod_description">Quantity</label>
							</div>


							<div class="input-field">
								<input name="price" id="prod_price" type="number" 
								class="validate " required="required">
								<label for="prod_proce">Price</label>
							</div>

							<div class="inpImgWrap">
								<label for="prod_image" id="lbl_prod_image" class="">
									<span class="labelText">
									    Product Image
								    </span>
								</label>
								
								<input name="file" id="prod_image" type="file" class="validate right" 
								accept='image/*' onchange='postPic(event)'/>
					<script>
					    function postPic(event){
                    		var input = event.target;
                    		var reader = new FileReader();
                    		reader.onload = function(){
                    			var dataURL = reader.result;
                    			var output = document.getElementById('lbl_prod_image');
                    			//output.src = dataURL;
                    			output.style.backgroundImage = "url('"+ dataURL +"')";
                    		};
                    		reader.readAsDataURL(input.files[0]);
	                    }
					</script>
								
							</div><br /><br />

							
								<label>Category Options</label>
							<div class="input-field">
								
								<?php 
										include 'dbconnect.php';
										$query ="select * from categories";
										$result = mysqli_query($con,$query);
										$count= mysqli_num_rows($result);
										if($count < 1){ ?>
										<h1>add category</h1>
							<?php
							}
							else{
						?>
		         <select id="prod_category" class="" name="category">
				<?php
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ echo $row['id']; ?>

				<option value='<?php echo $row['id']; ?>' ><?php echo $row['name']; ?></option>

			<?php	}
			}
		?>
		</select>
	   </div><br>
								
							<div class="input-field center">
								<input id="add_product_btn" type="submit" 
								class="validate btn" 
								value="Add Product" />
							</div>
								
							</form>
						</div>
					</span>
					<?php
	
    if(isset($_POST) && isset($_REQUEST['action']) =='addprod'){
    	$name = $_POST['name'];
    	$price = $_POST['price'];
    	$description = $_POST['description'];
    	$m_code = $_POST['m_code'];
    	$q_code = $_POST['q_code'];
    	$category = $_POST['category'];
    	$quantity = $_POST['quantity'];
    	
    	#echo "right";
    	
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
	    //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	   // echo "Type: " . $_FILES["file"]["type"] . "<br>";
	   // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	   // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
	    if (file_exists("prod_images/" . $_FILES["file"]["name"]))
	      {
	      echo $_FILES["file"]["name"] . " already exists. ";
	      }
	    else
	      {
	      move_uploaded_file($_FILES["file"]["tmp_name"],
	      "prod_images/".time().$_FILES["file"]["name"]);
	      //echo "Stored in: " . "prod_images/" . $_FILES["file"]["name"];
	      }
	    }
	  }
	else
	  {
	  echo "Invalid file";
	  }
	$wakati = date("d-m-Y");
	$path = "prod_images/".$name."__".$wakati."_".$_FILES["file"]["name"];
	$query ="insert into products (name,description,m_code,q_code,quantity,prod_image,price,category) values('$name','$description','$m_code','$q_code',$quantity,'$path',$price,'$category')";
	$query2 = mysqli_query($con, $query);
	if($query2){
		//echo 'success';
		$message = "Successfully Added Product[ $name ]";
	    echo "<script type='text/javascript'> document.location = 'admin_home.php?status=$message'; </script>";
	}
	

    }
    
   

	?>
				</div>
			</div>
		</div>


</section><!-- end: Content Wrap -->

<?php include 'includes/footer.php'; ?>