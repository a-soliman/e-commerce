<?php 

$db = mysqli_connect('127.0.0.1','root','','shop');
if (mysqli_connect_error()) {
	echo "Database connecton faild with the following error: ".mysqli_connect_error();
	die();
}

session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/toturial/bootstrap4/config.php';
require_once BASEURL. 'helpers/helpers.php';

$cart_id = '';
if (isset($COOKIE[CART_COOKIE])) {
	$cart_id = sanitize($_COOKIE[CART_COOKIE]);
}

?>