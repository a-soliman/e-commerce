<?php 
	require_once 'core/init.php';


	//set your secret key
	//see your keys here https://dashboard.stripe.com/account/apikeys

	\Stripe\Stripe::setApiKey(STRIPE_PRIVATE);
	// Get all of the credit card details submited by the user
	$token = $_POST['stripeToken'];
	// Get the rest od the information
	$full_name = sanitize($_POST['full_name']);
	$email = sanitize($_POST['email']);
	$street = sanitize($_POST['street']);
	$street2 = sanitize($_POST['street2']);
	$city = sanitize($_POST['city']);
	$state = sanitize($_POST['state']);
	$zip_code = sanitize($_POST['zip_code']);
	$country = sanitize($_POST['country']);
	$tax = sanitize($_POST['tax']);
	$sub_total = sanitize($_POST['sub_total']);
	$grand_total = sanitize($_POST['grand_total']);
	$cart_id = sanitize($_POST['cart_id']);
	$description = sanitize($_POST['description']);
	$charge_amount = number_format($grand_total,2) * 100;
	$metadata = array(
		"cart_id" => $cart_id,
		"tax" => $tax,
		"sub_total" => $sub_total,
		)
?>