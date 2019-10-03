<?php
session_start();
include 'includes/header.php'; ?>

<?php 

//code
include 'dbconnect.php';
?>

<section class="" style="height:auto;">

	

	<div class="container">

		<div class="row">
			
			<div class="col m6 offset-m3">
				<div class="row">
					<div class="col l12 m12">
						<a href="all_products.php" class="black-text">
							<h3 class="center">All Products</h3>
						</a>
						<?php
						
						if( isset( $_GET['status'] ) ){
						    $status = $_GET['status'];
						    echo '
						    <h5 class="green-text center-align">
						        '.$status.'
						    </h5>
						    ';
						}// end if-status-check
						
						?>
					</div>
				</div>
				<div class="row">
					<div class="m3">
						
					</div>
					<div class="m6">
						<p>Search using either name, Manufacturers' code or quantums code</p>
					</div>
				</div>
				<div class="row">
					<form method="POST" action=all_products.php?action=search" 
					id="form_search_products" 
					style="width:100%;"> 
						<div class="col m9">
							<div class="input-field">
								<input type="text" name="searchtext" 
								id="searchtext" />
								<label for="searchtext">
									<i class="material-icons">search</i>
								</label>
							</div>
						</div>
						<div class="col m3">
							<div class="input-field">
								<button class="btn" type="submit">
									<i class="material-icons">send</i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
		<?php
		if(isset($_POST) && isset($_REQUEST['action']) =='search'){
			$name = $_POST['searchtext'];
			$sql ="SELECT * FROM products WHERE name LIKE '%".$_POST['searchtext']."%' OR m_code LIKE '%".$_POST['searchtext']."%' OR  q_code LIKE '%".$_POST['searchtext']."%'";
			$query = mysqli_query($con, $sql);
			$count =mysqli_num_rows($query);
		   if($count < 1){
		   echo "<h5>Search Item not found or does not match any criteria</h5><br><br>";

		   } else{
		        
		        ?>
		   		<div class="row">
		   		
		   		<?php
		   		    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){ 
		   		?>
    		   		<div class="col m5">
    		   		
    		   			<div class="card horizontal blue-grey lighten-5" style="height:200px;">
    		   			
        					<div class="card-image red" style="">
        						<img src="<?php echo $row['prod_image'];?>" 
        						alt="Product Image" 
        						style="max-height:100% !important;height:99.999%;" class="" />
        					</div>
        					
        					<div class="card-stacked">
        						
        						<div class="card-content" style="overflow:hidden;text-overflow: ellipsis;white-space: nowrap;">
        							<h5 class="" style="font-size: 20px;">
        								<?php echo $row['name'];?>								
        							</h5>
        							<p style="font-size: 12px;" class="truncate">
        								<?php echo $row['description'];?>
        							</p>
        						</div>
        						
        						<div class="card-action">
        							<a href="details_product.php?id=<?php echo $row['id'];?>" 
        								title="More Information" 
        								class="btn btn-small green accent-2 right">
        								<i class="material-icons black-text">details</i>
        							</a>
        						</div>
        						
        					</div>
    				</div>
				    <div class="divider"></div>
			</div>


		   		<?php }

		   }
		}



			?>
		</div>

		<div class="row prodwrap" 
		style="">
			
			<?php
			$sql = "select * from products";
			$query =mysqli_query($con,$sql);
			$count = mysqli_num_rows($query);
			//echo $count;
			$items_per_page = 12;
				
		   $number_of_pages = ceil($count/$items_per_page);
		   if(!isset($_GET['pages'])){
		    $pages = 1;
	     	}
		    else{
		    $pages = $_GET['pages'];
	       	}
		//echo $number_of_pages;
		 $start_point = ($pages - 1)*$items_per_page;
		//echo $start_point."br".$items_per_page;
		 $sql1 = "select * from products LIMIT ".$start_point.','.$items_per_page;
		$query1 =mysqli_query($con,$sql1);
		if($query1){
		   // echo "true";
		}
			while($row = mysqli_fetch_array($query1,MYSQLI_ASSOC)){?>
			
			<div class="col m4">
				
				<div class="card horizontal hoverable" style="">
					<div class="card-image light-blue lighten-4" 
					style="">
						<img src="<?php echo $row['prod_image'];?>" 
						alt="Product Image" 
						style="max-height:100% !important;height:99.999%;" class="" />
					</div>
					<div class="card-stacked">
						<div class="card-content" style="overflow:hidden;text-overflow: ellipsis;white-space: nowrap;">
							<h5 class="" style="font-size: 20px;">
								<?php echo $row['name'];?>								
							</h5>
							<p style="font-size: 12px;" class="truncate">
								<?php echo $row['description'];?>
							</p>
						</div>
						<div class="card-action">
							<a href="details_product.php?id=<?php echo $row['id'];?>" 
								title="More Information" 
								class="btn btn-small">
								<i class="material-icons">details</i>
							</a>
						</div>
					</div>
				</div>
				
			</div>
		<?php }
		
	
		?>
		</div>

		<div class="row">
			<div class="col m6 offset-m4">

				<ul class="pagination">
					<li class="disabled">
						<a href="#!">
							<i class="material-icons">chevron_left</i>
						</a>
					</li>
				<?php for($pages=1; $pages<=$number_of_pages; $pages++){ ?>
				    
				    	<li class="waves-effect"><a href="all_products.php?pages=<?php echo $pages ?>"><?php echo $pages ?></a></li>
				
			<?php	} ?>
				
					
					<li class="waves-effect">
						<a href="#!">
							<i class="material-icons">chevron_right</i>
						</a>
					</li>
				</ul>

			</div>
		</div>

	</div><!-- end: container -->

</section><!-- end: Content Wrap -->


<div class="fixed-action-btn">
	<a class="btn-floating btn-large blue-grey lighten-3">
		<i class="large material-icons black-text">link</i>
	</a>

	<ul>
		<li>
			<a class="btn-floating  orange lighten-2" href="all_products.php" title="refresh page">
				<i class="material-icons black-text">refresh</i>
			</a>
		</li>
		<li>
			<a class="btn-floating green lighten-1" href="index.php" title="Back to main page">
				<i class="material-icons">home</i>
			</a>
		</li>
	</ul>
</div>

<?php include 'includes/footer.php'; ?>