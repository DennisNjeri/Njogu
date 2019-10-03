
<!-- nav bar -->
<nav role="navigation" class="white mainnavbar">
	<div class="nav-wrapper">

		<div class="row">
			
			<div class="col s4 m4 l6">

				<a id="logo-container" href="index.php" 
				class="brand-logo black-text left">
					<span class="left" 
					style="transform: translateY(3px);">
						<img src="tools/siteimages/quantumlogo.png" 
						style="width:60px;height:60px;" 
						class="responsive-img" id="quantumlogo" />
					</span>
					<span class="right">
						
					Quantum Scientific Ltd.
					</span>
				</a>

			</div>

			<div class="col s8 m8 l6">
				
				<ul class="right hide-on-small-only">
					<li>
						<a href="index.php" class="black-text">
							<i class="material-icons left">home</i>
							Home
						</a>
					</li>
					<li>
						<a href="all_products.php" class="black-text">
							<i class="material-icons left">shopping_cart</i> 
							Products
						</a>
					</li>
					<li>
						<a href="about.php" class="black-text" title="View About-Us">
							About Us
						</a>
					</li>

					<?php
						if(!isset($_SESSION['admin']) && !isset($_SESSION['sessCustomerID'])){ 
					?>
						<li>
							
							<a class='dropdown-trigger black-text' 
							href='#' 
							data-target='dropdown1'>
								<i class="material-icons left">account_circle</i>
								Account
							</a>
						</li>
							<ul id='dropdown1' class='dropdown-content'>
							    <li>
							    	<a href="login.php">
							    		<i class="material-icons">account_box</i>
							    		Sign In
							    	</a>
							    </li>
							    <li>
							    	<a href="registration.php">
							    		<i class="material-icons">add_circle_outline</i>
							    		Sign Up
							    	</a>
							    </li>
							</ul>				
					<?php	
						}
						else if(isset($_SESSION['sessCustomerID'])){ ?>
						<li>
							
							<a class='dropdown-trigger black-text' 
							href='#' 
							data-target='dropdown1'>
								<i class="material-icons left">account_circle</i>
								Account
							</a>
						</li>
							<ul id='dropdown1' class='dropdown-content'>
							    <li>
							    	<a href="custprofile.php">
							    		<i class="material-icons">account_box</i>
							    		Profile
							    	</a>
							    </li>
							    <li>
							    	<a href="logout.php">
							    		<i class="material-icons red-text">flight_takeoff</i>
							    		Logout
							    	</a>
							    </li>
							</ul>
						 
						<?php }
						    
					else{	
					?>
						<li>
						<a href="logout.php" class="black-text">
							<i class="material-icons left">account_circle</i>
							Logout
						</a>
					</li>
					<?php
						}
						if(isset($_SESSION['admin']) || isset($_SESSION['sessCustomerID'])){ ?>
				

					<?php	}
					 ?>
					
				</ul>

				<ul id="nav-mobile" class="sidenav">
					<li>
						<a href="index.php" class="black-text">
							<i class="material-icons left">home</i>
							Home
						</a>
					</li>
					<li>
						<a href="all_products.php" class="black-text">
							<i class="material-icons left">shopping_cart</i> 
							Products
						</a>
					</li>
					<?php
						if(!isset($_SESSION['admin']) || !isset($_SESSION['sessCustomerID'])){ 
					?>
						<li>
							<!--<a href="login.php" class="black-text">
								<i class="material-icons left">account_circle</i>
								Sign In
							</a>-->
							<a class='dropdown-trigger black-text' 
							href='#' 
							data-target='dropdown2'>
								<i class="material-icons left">account_circle</i>
								Account
							</a>
						</li>
							<ul id='dropdown2' class='dropdown-content'>
							    <li>
							    	<a href="login.php">
							    		<i class="material-icons">account_box</i>
							    		Sign In
							    	</a>
							    </li>
							    <li>
							    	<a href="registration.php">
							    		<i class="material-icons">add_circle_outline</i>
							    		Sign Up
							    	</a>
							    </li>
							</ul>
					<?php
						}
					?>

					<?php
						if(isset($_SESSION['admin']) || isset($_SESSION['sessCustomerID'])){ 
					?>
					<li>
						<a href="logout.php" class="black-text">
							<i class="material-icons left">account_circle</i>
							Logout
						</a>
					</li>

					<?php
						}// END if-session
					?>
					
					<li>
						<a href="about.php" class="black-text" title="View About-Us">
							About Us
						</a>
					</li>

					<li>
						<a class="sidenav-close red-text text-lighten-2" 
						href="#!" title="Close Menu!">
							Close Menu
							<i class="material-icons right">close</i>
						</a>
					</li>
				</ul>

				<a href="#" data-target="nav-mobile" 
				class="right sidenav-trigger">
					<i class="material-icons black-text">menu</i>
				</a>

			</div>

		</div>

	</div>
</nav><!-- end: nav -->