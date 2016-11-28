<?php 
	require_once $_SERVER['DOCUMENT_ROOT'].'/toturial/bootstrap4/core/init.php';
	$mode = sanitize($_POST['mode']);
	$edit_size = sanitize($_POST['edit_size']);
	$edit_id = sanitize($_POST['edit_id']);
	$cartQ = $db->query("SELECT * FROM cart WHERE id = '{$cart_id}'");
	$result = mysqli_fetch_assoc($cartQ);
	$items = json_decode($result['items'],true);var_dump($result);
	$updated_items = array();
	$domain = (($_SERVER['HTTP_HOST'] != 'localhost')?'.'.$_SERVER['HTTP_HOST'];false);
?>