<?php

session_start();
if( !isset($_SESSION['admin']) ){
    $message = "Please login, to gain access";
    echo "<script type='text/javascript'> document.location = 'login_admin.php?status=$message'; </script>";
}

include 'includes/header.php'; 

?>

<?php 

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
			<?php
				if(isset($_GET['id'])){
					$code = $_GET['id'];
					//echo $code;
					$sql = "SELECT * FROM products WHERE id = $code";
					$query = mysqli_query($con,$sql);
					$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
					//echo $row['name'];
					?>
			

			<div class="col m9 center contentwrap">
				<div class="card-panel">
					<span>
						<a href="admin_add_product.php" class="orange-text text-lighten-1">
							<h4 class="center">Edit Product</h4>
						</a>
						<div class="container">
							<form method="POST" action="edit.php?action=edit" 
							enctype="multipart/form-data" id="form_add_product" >
							<input type="hidden" name="id" value="<?php echo $row['id']; ?>"> 
							<div class="input-field">
								<input name="name" id="prod_name" type="text" 
								class="validate" required="required" value ="<?php if(!isset($_POST['name'])) {echo $row['name']; }?>">
								<label for="prod_name">Product Name</label>
							</div>

							<div class="input-field">
								<input name="description" id="prod_description" type="text" 
								class="validate" required="required" value ="<?php if(!isset($_POST['description'])) {echo $row['description']; }?>">
								<label for="prod_description">Description</label>
							</div>
							<div class="input-field">
								<input name="m_code" id="prod_description" type="text" 
								class="validate" value ="<?php if(!isset($_POST['m_code'])) { echo $row['m_code']; }?>">
								<label for="prod_mcode">Manufacturer code</label>
							</div>
							<div class="input-field">
								<input name="q_code" id="prod_description" type="text" 
								class="validate" required="required" value ="<?php if(!isset($_POST['q_code'])) { echo $row['q_code']; }?>">
								<label for="prod_qcodehi">Quantum code</label>
							</div>
								<div class="input-field">
								<input name="quantity" id="prod_description" type="number" 
								class="validate" required="required" value ="<?php if(!isset($_POST['quantity'])) {echo $row['quantity']; }?>">
								<label for="prod_description">Quantity</label>
							</div>


							<div class="input-field">
								<input name="price" id="prod_price" type="number" 
								class="validate" required="required" value ="<?php if(!isset($_POST['price'])) {echo $row['price']; }?>">
								<label for="prod_proce">Price</label>
							</div>
							<p>*** Re-Select the image if only you want to change product image *** 
							<br />
							Previous-Image[<i> 
							<?php echo $row['prod_image']; ?> </i>]
							</p>
							<div class="inpImgWrap">
								<label for="prod_image" id="lbl_prod_image" class="" 
								style="background-image: url('prod_images/15434422762c5d855042065b63b517236f55b6e87f.jpg');">
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

							<p>*** Re-Select the category of the product everytime ***</p>
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
								value="Edit Product" />
							</div>
								
							</form>
						</div>
							
					</span>
					
				</div>
			</div>
		</div>
	<?php }
	?>

</section><!-- end: Content Wrap -->

<?php include 'includes/footer.php'; ?>