<?php 
require_once 'core/init.php'
include 'includes/head.php'
include 'includes/headerpartial.php'

if ($cart_id !='') {
	$cartQ = db->query("SELECT * FROM cart WHILE id = '($cart_id)'");
	$result = mysqli_fetch_assoc($cartQ);
	$items =json_decode($result['items'], true);
	$i = 1;
	$sub_total = 0;
	$item_count = 0;
}

?>