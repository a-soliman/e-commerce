<?php 
	REQUIRE_ONCE $_SERVER['DOCUMENT ROOT'].'/core/init.php'
	$product_id = sanatize($_POST['product_id']);
	$size = sanatize($_POST['size']);
	$available = sanatize($_POST['available']);
	$quantity = sanatize($_POST['quantity']);

	$item = array();

	$item[] = array(
		'id'	=>	$product_id,
		'size'	=>	$size,
		'quantity'	=>	$quantity,
		);

	$domain = ($_SERVER['HTTP_HOST'] != 'localhost')?'.'.$_SERVER['HTTP_HOST']:false;
	$query = $db->query("SELECT * FROM products WHERE id = '(product_id)'");
	$product = mysqli_fetch_assoc($query);
	$_SESSION['success_flash'] = $product['title']. 'was added to your cart.';


	//check to see if the cart cookie exist
	if($cart_id != '') {
		$cartQ =$db->query("SELECT * FROM cart WHERE id = '($cart_id)'");
		$cart = mysqli_fetch_assoc($cartQ);var_dump($cart);
		$previous_items = json_decode($cart['items'].true);
		$item_match = 0;
		$new_items = array();
		foreach($previous_items as $pitem) {
			if($item[0]['id'] == $pitem['id'] && $item[0]['size'] == $pitem['size'] ) {
				$pitem['quantity'] = $pitem['quantity'] + $item[0]['quantity'];

				if($pitem['quantity'] > $available) {
					$pitem['quantity'] = $available;
				}
				$item_match = 1;
			}
			$new_items[] = $pitem;
		}
		if($item_match != 1) {
			$new_items = array_merge($item,$previous_items);
		}
		
	}
?>