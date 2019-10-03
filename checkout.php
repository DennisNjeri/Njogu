<?php
session_start();
include 'includes/header.php';

include 'Cart.php';

$cart = new Cart;

if(!isset($_SESSION['sessCustomerID']) && !isset($_SESSION['Admin'])){
   
    echo "<script type='text/javascript'> document.location = 'login.php?status=sign-In-to-Gain-access'; </script>";
    
}// End if-session check

?>

<section class="" style="height:auto;">	

	<div class="container">

		<div class="row">
			
			<div class="col m6 offset-m3">
				<div class="row">
					<div class="col s12 m12">
						<div class="row">
							<div class="col s10 m10">
								<a href="checkout.php" class="black-text green">
									<h3 class="center">Check Out</h3>
								</a>
							</div>
							<div class="col s2 m2 ">
								<br />
								<span class="kib_center_wrap">
									<a href="shopping_cart.php" 
									title="Back To Shopping Cart" 
									class="btn-floating">
										<i class="material-icons">arrow_back</i>
									</a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div><!-- end: check-out-title -->

		<div class="row">
			
			<div class="col m8">
				<ul class="collapsible collapsibleCheckout expandable">
					<li class="active">
						<div class="collapsible-header">
							<i class="material-icons">check</i>
							Payment Method
						</div>
						<div class="collapsible-body">
							<span>
								<form method="POST" action="">
									<div class="row">
										<div class="input-field col m7 l7">
											<input type="tel" id="phonenumber" 
											name="phonenumber" class="validate"
											required />
											<label for="phonenumber">					Phone number
											</label>
										</div>
										<div class="input-field col m5 s5">
											<button class="btn" type="submit">
												<i class="material-icons">send</i>
											</button>
										</div>
									</div>
								</form><!-- end: paymentform -->
							</span>
						</div>
					</li>
				</ul>				
			</div><!-- end: payment-stuf -->

			<div class="col m4">
				<div class="card-panel">
					<table>
						<tbody>

							<tr>
								<td colspan="2">
									<div class="card horizontal">
										<div class="card-image">
											<img src="tools/siteimages/index.png" 
											style="width:200px;height:100%;">
										</div>

										<div class="card-stacked">
											<div class="card-content">
												<p>
												 Order Totals. Pay to checkout.
												</p>
												<small class="orange-text">
													<?php echo ''.$cart->total().' KSH'; ?>
												</small><br />
												<small class="grey-text">
													
												</small>
											</div>
										</div>
									</div>
								</td>
							</tr>

							<tr>
								<td>Subtotal</td>
								<td class="right-align">
									<?php echo ''.$cart->total().' KSH'; ?>
								</td>
							</tr>
							</tr>
							   <?php
							        if($cart->total_items() > 0){
							            //get cart items from session
							            $cartItems = $cart->contents();
							            foreach($cartItems as $item){
							            	if($item['quantity']<1){ ?>

							           <tr>
											<td><?php echo $item['name'];?></td>
											<td class="right-align">
												<p>Consignment in two weeks</p>
											</td>
							           </tr>	
							            	<?php }
							            }
							        }
							        ?>
								<tr>

							<tr>
								<td>Delivery fee</td>
								<td class="right-align">
									Ksh 00
								</td>
							</tr>

							<tr>
								<td>Total</td>
								<td class="right-align orange-text">
								<?php echo ''.$cart->total().' KSH'; ?>
								</td>
							</tr>
								<tr>
								<td>
								    <a href="cartAction.php?action=placeOrder"
								    class="btn btn-success orderBtn">
								        Place Order 
								        <i class="arrow_forward"></i>
								    </a>
								</td>
								
							
							</tr>

						</tbody>
					</table>
				</div>
				<a href="shopping_cart.php" 
				class="btn orange-text white right" 
				title="Go back & modify cart" >
					Modify Cart
				</a>
			</div><!-- end: summary-order-stuf -->

		</div><!-- end: check-out-content -->

	</div><!-- end: container -->

</section><!-- end: Content Wrap -->

<?php include 'includes/footer.php'; ?>
