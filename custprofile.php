<?php

session_start();
include 'includes/header.php';
include 'dbconnect.php';

$tafuta = "select * from users where id = '".$_SESSION['sessCustomerID']."' ";
$matokeo = mysqli_query($con,$tafuta);
$jibu = mysqli_fetch_array($matokeo, MYSQLI_ASSOC);



if( !isset( $_SESSION['sessCustomerID'] ) ){
   echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    
 
} 

?>

<section class="">
	
	<!-- content -->
	
		<div class="row">
			<div class="col m3">
				
				<div class="card-panel header_links" >
					<span>
						<a href="#" class="black-text">
							<h4>
								Welcome
							</h4>
						</a>
						<div class="chip">
							<!--<img src='<?php echo $result['image']; ?> '
							alt="Contact Person">-->
							<?php echo $jibu['fname']." ".$jibu['lname']; ?>
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
										<a href="admin_change_pswd.php" 
										class="btn">
											Change Password
										</a>
									</li>
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
								Your Details 
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
                <div class="row">
                    <div class="col m12 contentwrap">
                    <div class="card-panel">
					<span>
						
						<a href="admin_home.php" class="blue-text text-lighten-1">
							<h4 class="center">
								Your Orders 
							</h4>
						</a>

					<table class="striped">
					    <caption class="green-text">Your Orders and their status</caption>
						<thead>
						<tr>
								<th>Order total</th>
								<th>Order date</th>
								<th>Order time</th>
								<th>Status</th>
								<th>Order Products</th>
								<th>Cancel</th>
							</tr>
						</thead>
						<tbody>
						    <?php 
					$saka = "select * from orders where customer_id = '".$_SESSION['sessCustomerID']."' ORDER BY id DESC";
                    $tokea = mysqli_query($con,$saka);
                    while($majibu = mysqli_fetch_array($tokea, MYSQLI_ASSOC)){
						    ?>
							
							<tr>
								<td> <?php echo $majibu['total_price']; ?> </td>
								<td> <?php echo $majibu['created']; ?> </td>
								<td> <?php echo $majibu['created_time']; ?> </td>
								
							<td>  <?php echo "
<a class='waves-effect waves-light btn blue-grey darken-4'>".$majibu['state']."</a>"; ?> 
</td>
									<?php
									$prod_search = "select * from order_items where order_id = '".$majibu['id']."' ";
									$prod_result = mysqli_query($con, $prod_search);
									
									?>
										<td> 
										<table>
										    <tr>
										        <th>Product</th>
										        <th>Quantity</th>
										    </tr>
									<?php	while($prod_tokea=mysqli_fetch_array($prod_result, MYSQLI_ASSOC)){ ?>
									    
									    <tr>
									        <td><?php 
									        $sqlprod = "select * from products where id = '".$prod_tokea['product_id']."'";
									    $jina = mysqli_query($con,$sqlprod);
									    while($jinatoa = mysqli_fetch_array($jina,MYSQLI_ASSOC)){
									       echo $jinatoa['name'];
									    } ?>
									       </td>
									        <td><?php echo $prod_tokea['quantity'];?></td>
									    </tr>
									    
								<?php	} ?>
									</table>
										</td>
								<td>
								    <form method="POST" action="cancel_order.php">
								        <input type="hidden" name="id" value="<?php echo $majibu['id'];?>">
								        
								       <input type="submit" name="submit" value="Cancel"class='waves-effect waves-light btn red' onclick="return confirm('Are you sure?')"> 
								    </form>
								   
								</td>
							
							</tr>
							<?php } ?>
						</tbody>
					</table>

					</span>
				</div>
                        
                    </div>
                </div>
			</div><!-- end: content-segment -->
		</div>
	

</section><!-- end: Content Wrap -->

<?php include 'includes/footer.php'; ?>