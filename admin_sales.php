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
						<a href="admin_sales.php" class="orange-text text-lighten-1">
							<h4 class="center">View Sales</h4>
						</a>
						<div class="container">
							<form method="POST" action="admin_sales.php" 
							enctype="multipart/form-data" >

							<div class="input-field">
								<input name="from" id="first_name" type="date" 
								class="validate" required="required">
								<label for="first_name">From</label>
							</div>

							<div class="input-field">
								<input name="to" id="email" type="date" class="validate" required="required">
								<label for="to">To</label>
							</div>

						

							<div class="input-field center">
								<input id="add_customer_btn" type="submit" 
								class="validate btn" 
								value="Generate Report" />
							</div>
								
							</form>
						</div>
					</span>
					<?php
                    
                        if($_POST){
				        $from = $_POST['from'];
				    	$to = $_POST['to'];
				    
				    	$query ="select * from orders where created BETWEEN '$from' AND '$to' ORDER BY id DESC";
					     $query2 = mysqli_query($con, $query);
					     $count =mysqli_num_rows($query2);
					  
					     if($count < 1){
					         echo "<h1> No Transactions Yet</h1>";
					     }
					     else{ ?>
					     <h1>Orders Placed !</h1>
					     <table>
					         <tr>
					         <th>Order_Id</th>
					         <th>Order total</th>
					         <th>Order Created</th>
					         <th>Customer</th>
					         <th>Order Items</th>
					         <th>Status</th>
					         <th>Validate</th>
					         </tr>
					         <?php 
					         while($row = mysqli_fetch_array($query2, MYSQLI_ASSOC)){ ?>
					         <tr>
					             <td><?php echo $row['id'];?></td>
					             <td><?php echo $row['total_price'];?></td>
					             <td><?php echo $row['created'];?></td>
					             <td>
					                 <form method="POST" action="customer_profile.php">
					                     <input type="hidden" name="code" value="<?php echo $row['customer_id'];?>">
					                     <input type="submit" name="submit" value="View customer" class="waves-effect waves-light btn">
					                     
					                 </form>
					                 
					             <td>
					                 <table>
					                     <tr>
					                         <th>Product</th>
					                         <th>Quantity</th>
					                     </tr>
					                     <?php 
					                    $search  =$row['id'];
					       $tafuta = "select * from order_items where order_id = '$search'";
					       $results = mysqli_query($con,$tafuta);
					       while($rows = mysqli_fetch_array($results, MYSQLI_ASSOC)){
					       
					       
					                     
					                     
					                     ?>
					                     <tr>
					           
					           <?php
					           $tool = $rows['product_id'];
					           $saka = "select name from products where id ='$tool'";
					           $toa = mysqli_query($con,$saka);
					           while($ros=mysqli_fetch_array($toa, MYSQLI_ASSOC)){?>
					               <td><?php echo $ros['name'];?></td>
					         <?php  }
					           ?>
					           <td><?php echo $rows['quantity'];?></td>
					       <?php    } ?>
					                 </table>
					            <td><?php echo $row['state'];?></td> 
					            <td><a href="order_validate.php?id=<?php echo $row['id'];?>" class="waves-effect waves-light btn">Validate</a></td> 
					         </tr>
					         
					             
					       <?php  }
					         
					         
					         ?>
					     </table>
					         
					  <?php   }
					     
					 }

?>

				</div>
			</div>
		</div>


</section><!-- end: Content Wrap -->

<?php include 'includes/footer.php'; ?>