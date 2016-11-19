<?php 

$db = mysqli_connect('127.0.0.1', 'root', '', 'redstoneshop');
if (mysqli_connect_erroe()) {
	echo "Database connecton faild with the following error: ".mysqli_connect_erroe();
	die();
}
?>