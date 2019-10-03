<?php
session_start();
include 'includes/header.php'; ?>


<?php 

//code
$id=$_GET['id'];
include 'dbconnect.php';

	$sql = "select * from products where id = $id";
	$query =mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query,MYSQLI_ASSOC);

	$search = "select name from categories where id = '".$row['category']."' ";
	$query2 =mysqli_query($con,$search);
	$cat = mysqli_fetch_array($query2,MYSQLI_ASSOC);
	?>

<section class="" style="height:auto;">

	

	<div class="container">

		<div class="row">
			
			<div class="col m6 offset-m3">
				<div class="row">
					<div class="col s12 m12">
						<a href="details_product.php" class="black-text">
							<h3 class="center">Product Details</h3>
						</a>
					</div>
				</div>
			</div>

		</div>

		<div class="row">
			
			<div class="col m6">
				<div class="carousel carousel-slider">
					<a class="carousel-item" href="#one!" style="">
						<img src='<?php echo $row['prod_image']; ?>' alt="Image One" 
						class="" style="border-radius:8px; border:1px solid black;" />
					</a>
					<a class="carousel-item" href="#one!">
						<img src="tools/siteimages/index-image-1-old.jpeg" alt="Image Two" 
						class="" style="border-radius:8px; border:1px solid black;" />
					</a>
				</div>
			</div>

			<div class="col m6">
				<div class="card-panel">
					<span>
						<table class="responsive-table highlight centered">
							<tbody>
								<tr>
									<td>Name:</td>
									<td><?php echo $row['name']; ?></td>
								</tr>
								<tr>
									<td>Description:</td>
									<td><?php echo $row['description']; ?></td>
								</tr>

						<?php if(isset($_SESSION['sessCustomerID']) ||isset($_SESSION['Admin'])){ ?>
								<tr>
									<td>Price:</td>
									<td><?php echo $row['price']." KSH"; ?></td>
								</tr>
						<?php } ?>

								<tr>
									<td>Category:</td>
									<td><?php echo $cat['name']; ?></td>
								</tr>
								<tr>
									<td>
										<a href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>" 
										title="To Shopping Cart" 
										class="btn green lighten-2 black-text waves-effect waves-green" 
										style="border-radius:10px;">
												Add To Cart
										</a>
									</td>
									<td>
										<a href="all_products.php" 
										title="Back To All Products" 
										class="btn waves-effect waves-light">
												Back
										</a>
									</td>
								</tr>
							</tbody>
						</table>
					</span>
				</div>
			</div>

		</div>

	</div><!-- end: container -->

</section><!-- end: Content Wrap -->

<?php include 'includes/footer.php'; ?>