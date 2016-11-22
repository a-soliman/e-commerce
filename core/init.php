<?php 

$db = mysqli_connect('127.0.0.1','root','','shop');
if (mysqli_connect_error()) {
	echo "Database connecton faild with the following error: ".mysqli_connect_error();
	die();
}
?>