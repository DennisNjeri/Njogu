<?php
	
    if(isset($_POST) && isset($_REQUEST['action']) =='edit'){
    	
    	$id = $_POST['id'];
    	$name = $_POST['name'];
    	$price = $_POST['price'];
    	$description = $_POST['description'];
    	$m_code = $_POST['m_code'];
    	$q_code = $_POST['q_code'];
    	$category = $_POST['category'];
    	$quantity = $_POST['quantity'];
    	
    	#echo "right";
    	include 'dbconnect.php';
    	if($_FILES["file"]["size"] == 0){
    		$sql = "UPDATE products SET name = '$name', description = '$description', price =$price, 
    		quantity = $quantity, m_code = '$m_code', q_code = '$q_code', category ='$category'  WHERE id = $id";
    		$query = mysqli_query($con,$sql);
    		if($query){
    			header("location:admin_all_product.php?message=Updated Successfully");
    		}
    		else{
    			echo "<br><br>Ni kubaya".mysqLi_error($con);
    		}

    	}
    	else{
    	
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
		
	$path = "prod_images/".time().$_FILES["file"]["name"];
	$sql = "UPDATE products SET name = '$name', description = '$description',  m_code = '$m_code', q_code = '$q_code', price = $price, quantity = $quantity, q_code = '$q_code', category ='$category', prod_image ='$path'  WHERE id = $id";
	$query = mysqli_query($con, $sql);
	if($query){

		header("location:admin_all_product.php?message=Updated Successfully");
	}
	else{
		echo "<br>shinda ni <br>".mysqLi_error($con);
	}
	
		}
    }
    
   

	?>