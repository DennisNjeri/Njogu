<?php include 'includes/header.php'; ?>

<?php 

//code

?>

<section class="">
	
	<!-- content -->
	<div class="carousel carousel-slider">
		<a class="carousel-item" href="#one!"><img src="tools/siteimages/carousel-1.jpg"></a>
		<a class="carousel-item" href="#two!"><img src="tools/siteimages/carousel-2.jpg"></a>
		<a class="carousel-item" href="#three!"><img src="tools/siteimages/carousel-3.jpg"></a>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col m6 offset-m3">
				
				<br />
				<div class="card-panel hoverable">
					<span>
						<a href="registration_status.php" class="orange-text text-lighten-1">
							<h4 class="center">Registration Status</h4>
						</a>
						<?php
								 include 'dbconnect.php';
								 if(isset($_POST) && isset($_REQUEST['action'])=='register' ){
								 	$name = $_POST['name'];
								 	$fname = $_POST['fname'];
								 	$email = $_POST['email'];
								 	$phone = $_POST['phone'];
								 	$location = $_POST['location'];
								 	$password = $_POST['password'];
								 	$conpass = $_POST['conpassword'];
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
									      "user_images/".time().$_FILES["file"]["name"]);
									      
									      }
									    }
									  }
									else
									  {
									  echo "Invalid file";
									  }
									 $image = "user_images/".time().$_FILES["file"]["name"];
								 	if($password !== $conpass){
							 				echo 'something';
								 	}
								 	else{
								 		$goodpwd = md5($password);
								 		$query = "insert into users (fname,lname,email,phone,location,image,password) values('$name','$email','$phone','$location','$image','$goodpwd')";
								 		$query2= mysqli_query($con,$query);
								 		if($query){
								 			echo 'success';
								 		}
								 		else{
								 				echo "ni kubaya";
								 		}

								 	}
								 }
						?>

						<p>
							Status message here
						</p>

						<span>
							<a href="login.php" class="btn black-text">
								Log In
							</a>
						</span>
					</span>
				</div>

			</div>
		</div>
	</div>

</section><!-- end: Content Wrap -->

<?php include 'includes/footer.php'; ?>