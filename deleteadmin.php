<?php
if(isset($_GET['id'])){
	$code = $_GET['id'];
	session_start();
	//echo $_SESSION['admin_id'];
	
	include 'dbconnect.php';
	$search = "select * from admin where id =$code";
	$results = mysqli_query($con, $search);
	$row = mysqli_fetch_array($results,MYSQLI_ASSOC);
	//echo $row['status'];
	if($_SESSION['admin_id'] == $code){
	    echo "<script type='text/javascript'> document.location = 'admin_all_admin.php'; </script>";
	    
	}
	else if($row['status']=='superadmin'){
	     echo "<script type='text/javascript'> document.location = 'admin_all_admin.php'; </script>";
	}
	else{
	$sql = "DELETE FROM admin WHERE id =$code";
	$query = mysqli_query($con,$sql);
	if($query){
		header("location:admin_all_admin.php?status=admin deleted successfully");
    	}
	}
}

?>