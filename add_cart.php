<?php 
session_start(); 
ini_set('display_errors', 'On');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
	# Value check for item id, price, and quantity. If item id or price is not null, do not accept the page. If the quantity is null, set 1 as default.
	if(!isset($_REQUEST['item']) || !isset($_REQUEST['price'])){
		echo "error: null value in the request";
		#TODO : return back to the previous page
	}else{ 
		$item = $_REQUEST['item'];
		$price = $_REQUEST['price'];
		$quantity = ($_REQUEST['quantity'])?($_REQUEST['quantity']):1;

		$item_record = array('price' => "$price", 'quantity' => "$quantity");
		if(!isset($_SESSION['cart'])){ //if shopping cart does not exist, create array and assign to 'cart' variable.
			$_SESSION['cart'] = array($item => $item_record);
		}else{
			#TODO: need to add logic to check if there's same item in the shopping cart. If so increase the quantity.
			$_SESSION['cart'][$item] = $item_record;
		}


	}

	if(isset($_REQUEST['url'])) {
?>
<head>
<meta http-equiv="REFRESH" content="0;url=http://<?php echo $_REQUEST['url'] ?>">
</head>
<?php
	}
		#test code - display all the items in the cart
		$cart = $_SESSION['cart'];
		foreach($cart as $key => $vals){
			echo $key;
			echo " ";
			echo $vals['price'];
			echo " ";
			echo $vals['quantity'];
			echo '</br>';
		}
?>
</body>
</html>
