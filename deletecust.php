<?php
if(isset($_GET['id'])){
	$code = $_GET['id'];
	include 'dbconnect.php';
	$sql = "DELETE FROM customers WHERE id =$code";
	$query = mysqli_query($con,$sql);
	if($query){
		header("location:admin_all_customer.php");
	}
}
?>