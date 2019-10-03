<?php

include 'configcart.php';

session_start();

include 'Cart.php';

require_once ('includes/PHPMailer/src/PHPMailer.php');
require_once ('includes/PHPMailer/src/SMTP.php');
require_once ('includes/PHPMailer/src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$cart = new Cart;

// include database configuration file

if( isset($_REQUEST['action']) && !empty($_REQUEST['action']) ){

    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        //echo $productID;
        // get product details
        $query = $db->query("SELECT * FROM products WHERE id = ".$productID);
        if($query){
            //echo "true";
        }
        $row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'image' =>$row['prod_image'],
            'quantity' => $row['quantity'],
            'qty' => 1
        );
        
        $insertItem = $cart->insert($itemData);
        //echo $insertItem;
       // $redirectLoc = $insertItem?'shopping_cart.php?msg=goodday';
        header("Location: shopping_cart.php");
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
       header("Location: shopping_cart.php");
       
    } elseif( $_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID']) ){
        
        //NJOGU'S INPUT NEEDED
        // insert order details into database
        //echo $_SESSION['sessCustomerID']."   We here";
        
        //printf( "About to insert details of the order into the db.\n " );
    
        $insertOrder = $db->query("INSERT INTO orders (customer_id, total_price, created, created_time,state) 
		VALUES ('".$_SESSION['sessCustomerID']."', '".$cart->total()."', '".date("Y-m-d")."', '".date("H:i:s")."','active')");
        
        if( $insertOrder ){
            //printf( "Successfully inserted into 'orders', proceeding to order-items.\n " );
            
            $orderID = $db->insert_id;
            $sql = '';
			
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";
				
            }
            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);

            if( $insertOrderItems ){
				//echo "<br /><p>Variable insert_order_items: <b>". $insertOrderItems ."</b> .</p>";
				
				//printf( "insertOrderItems valid. " );
				
				$sql2 = '';
				$trolleyItems = $cart->contents();
				
				foreach($trolleyItems as $it){
					$con=mysqli_connect('46.4.101.197','quantums_root','@p5u%YK23$bykh','quantums_quantums') or die("<p>No connection to server</p>");
					//mysql_select_db("quantums") or die("<p>Database, jales NOT selected</p>");
					$get = "select quantity from products where id ='".$it['id']."'";
					$get_res = mysqli_query($con,$get) or die("<p>Couldnt select!!</p>");
					$count = mysqli_num_rows($get_res);
					if($count == 1){
						while($rows = mysqli_fetch_array($get_res, MYSQLI_ASSOC)){
							$prev = $rows['quantity'];
						}
					}else{
						echo "<p>Error: rows retrieved are not one</p>";
					}
			
					$new = $prev - $it['qty'];
				
					$sql2 = "UPDATE products SET quantity=$new where id ='".$it['id']."'";
					$updateItems = mysqli_query($con,$sql2) or die("<p>UPDATE failed</p>");
				}
				//update quantity
				$updateItems = $db->multi_query($sql2);
				
				
				if($updateItems){
					//echo "<p>Variable update_quantity : <b>". $updateItems ."</b> .</p>";
					$good=$cart->total();
					
					// Sending email
					$mail = new PHPMailer(TRUE);
	 				$mail->IsSMTP();
	 				$mail->Host = "mail.quantumscientific.co.ke";//Or root.serverke16.com
	 				$mail -> Port = 587;
	 				$mail -> SMTPSecure = 'mail';
	 				$mail->SMTPAuth = true;
	 				$mail->SMTPDebug = 0;
	 				$mail->Username = "info@quantumscientific.co.ke";
	 				$mail->Password = "4%E_1_xQQ}M9";
	 				$mail->From = "info@quantumscientific.co.ke";
	 				$mail->FromName = "Quantum Scientific Administrator";
	 				$to = $_SESSION['username']; //echo "<br /><br />Sending to [ $to ].<br /><br />";
	 				$email = $_SESSION['email'];
	 				$mail->AddAddress( $email, $to );
	 				$mail->AddReplyTo("support@quantumscientific.co.ke", "Information");
	 				$mail->WordWrap = 50;
	 				$mail->IsHTML(true);
	 				$mail->Subject = "Order Alert";
	 				$amount = $cart->total();
	 				$mail->Body    = "[ $to ]Your order( of $amount ) has been successfully placed. You will soon be directed by our sales team.";
		            $mail->AltBody = "[ $to ]Your order( of $amount ) has been successfully placed. You will soon be directed by our sales team.";
		            
		            if( $mail->Send() ) {
		                $message = "Your order is successfully placed. You will soon be directed by our sales team";
		                $status_mail = " Email to[ $to ] has been SUCCESSFULLY sent!";
		                unset($_SESSION['cart_contents']);
		                echo "<script type='text/javascript'> document.location = 'all_products.php?status=$message&mail=$status_mail'; </script>";
		            } else{
		                $error = $mail->ErrorInfo;
		                $status_mail = "E-Mail Error :: $error .";
		                //echo "<br />$status_mail<br />";
		                echo "<script type='text/javascript'> document.location = 'all_products.php?status=$status_mail'; </script>";
		            }
                    
                    
                    
                   
						
				}else{
					echo "<br />Multi query failed for update_query: (". $db->errno .") .. ". $db->error ." .<br />";
					
					echo "<br /><p>Updating the <b>Products</b> table failed! but order_item table has been 
					inserted(order id: $orderID)</p><br />";
					 header("location:all_products.php?salemsg=$newer");
				}
                
            }else{
				echo "<br />Multi query failed for insert order items_query: (". $db->errno .") .. ". $db->error ." .<br />";
                echo "<br /><p>Insertion into <b>Order Items</b> table failed! but orders table has been inserted</p><br />";
				header("Location: checkout.php");
            }
        }else{
            echo "<br />Insertion into <b>Orders</b> table failed! <br />";
			header("Location: checkout.php");
        }
    } 
    else{
    	echo mysql_error();
     	header("Location: checkout.php");
    }
}

?>