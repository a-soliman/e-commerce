<?php 
	require_once $_SERVER['DOCUMENT_ROOT'].'tutorial/bootsrap4/core/init.php';
	$name = sanatize($_POST['full_name']);
	$email = sanatize($_POST['email']);
	$street = sanatize($_POST['street']);
	$street2 = sanatize($_POST['street2']);
	$city = sanatize($_POST['city']);
	$state = sanatize($_POST['state']);
	$zip_code = sanatize($_POST['zip_code']);
	$country = sanatize($_POST['country']);
?>