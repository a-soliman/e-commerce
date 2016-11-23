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

<div class="col-md-12">
	<div class="row">
		<h2 class="text-center">My Shopping Cart</h2>
		<hr>

		<?php 
		if ($cart_id == ''): ?>

		<div class="bg-danger">
			<p class="text-canter text-danger">
				Your Sopping Cart Is Empty!
			</p>
		</div>
	<!-- <?php else: ?> -->
	</div>
</div>