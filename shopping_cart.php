<?php 
session_start();
include 'includes/header.php'; ?>

<?php
// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;
if(!isset($_SESSION['sessCustomerID']) && !isset($_SESSION['username']) ){
    
    echo "<script type='text/javascript'> document.location = 'login_cart.php'; </script>";
   
}

?>


	 <script>
    function updateCartItem(obj,id){
        $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
    </script>

<section class="" style="height:auto;">	

	<div class="container">

		<div class="row">
			
			<div class="col m6 offset-m3">
				<div class="row">
					<div class="col s12 m12">
						<div class="row">
							<div class="col s10 m10">
								<a href="shopping_cart.php" class="black-text green">
									<h3 class="center">Shopping Cart</h3>
								</a>
							</div>
							<div class="col s2 m2">
								<br />
								<span class="kib_center_wrap">
									<a href="checkout.php" 
									title="Proceed To Check-Out" 
									class="btn-floating green lighten-2">
										<i class="material-icons black-text">
											shopping_cart
										</i>
									</a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div><!-- end: shopping-cart-title -->

		<div class="row">
			<div class="m12 s12">
				
			<table class="responsive-table" 
				id="tblcart">
					<caption>In Cart</caption>
					<tr>
						<th>ITEM</th>
						<th>QUANTITY</th>
						<th>UNIT PRICE</th>
						<th>SUBTOTAL</th>
						<th>Remove Item</th>
					</tr><!-- end: table-headings-->
					 <?php
					        if($cart->total_items() > 0){
					            //get cart items from session
					            $cartItems = $cart->contents();
					            foreach($cartItems as $item){
					        ?>
					<tr>
						<td>
							<div class="card horizontal">
								<div class="card-image">
									<img src='<?php echo $item["image"]; ?>' 
									style="width:250px;">
								</div>

									<div class="card-stacked">
									<div class="card-content">
										<p>
											<?php echo $item["name"]; ?>
										</p>
									</div>

									<div class="card-action">
										<a href="#">This is a link</a>
									</div>
								</div>
							</div>							
						</td><!-- item-card -->

						<td>
							<div class="input-field">
								<input type="number" name="qty_value" 
								placeholder="1" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')" />
							</div>
						</td><!-- quantity -->

						<td>
							<p>
								<?php echo 'KSH '.$item["price"].' '; ?>
							</p>
						</td><!-- unit-price -->

						<td>
							<p >
								<?php echo 'KSH '.$item["subtotal"].' '; ?>
							</p>
						</td><!-- unit-price -->
						<td>
							 <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="button" onclick="return confirm('Are you sure?')">		<i class="medium material-icons red-text">delete</i></a>
					   </td>

					</tr><!-- end: item-row :: for loopping -->
					<?php }?>
					<tr>
						<td colspan="4">
							<table class="responsive-table hightlight right"
							style="width:50%;border-collapse: collapse;outline:0px;">
								
								<tr>
									<?php if($cart->total_items() > 0){ ?>

									<td>Total</td>
									<td class="right-align orange-text">
										<strong>Total <?php echo 'KSH '.$cart->total().' '; ?></strong>
									</td>
									 <?php } }?>
								</tr>
								<tr>
									<td colspan="2" class="center-align">
										<small>Delivery fees not included</small>
									</td>
								</tr>
							</table>
						</td>
					</tr><!-- end: total-cost -->

					<tr>
						<td colspan="2">
							<a href="all_products.php" class="btn green accent-2 black-text">
								Back To Shopping
							</button>
						</td>
						<td colspan="2">
							<a href="checkout.php" class="btn right cyan lighten-3 black-text">
								To Checkout
							</button>
						</td>
					</tr><!-- end: back-btn to-check-out-btn-->

				</table>

			</div>
		</div>

	</div><!-- end: container -->

</section><!-- end: Content Wrap -->

<?php include 'includes/footer.php'; ?>
 

