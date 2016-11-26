<?php 
require_once 'core/init.php';
include 'includes/head.php';
include 'includes/headerpartial.php';

if ($cart_id !='') {
	$cartQ = $db->query("SELECT * FROM cart WHILE id = '($cart_id)'");
	$result = mysqli_fetch_assoc($cartQ);
	$items = json_decode($result['items'], true);
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
		<?php else: ?>
		<table class="table table-bordered table-condensed table-striped">
			<thead>
				<th>#</th>
				<th>Item</th>
				<th>Prices</th>
				<th>Quantity</th>
				<th>Size</th>
				<th>Sub total</th>
			</thead>
			<tbody>
				<?php 
				foreach ($$item as $item) {
					$product_id = $item['id'];
					$productQ =$db->query("SELECT * FROM products WHERE id = '($product_id)'");
					$product = mysqli_fetch_assoc($productQ);
					$sArray = explode(',',$product['sizes']);
					foreach($sArray as $sizeString) {
						$s =explode(':',$sizeString);
						if($s[0] == $item ['size']) {
							$available = $s[1];
						}
					}
				
				?>
				<tr>
					<td><?=Si;?></td>
					<td><?=Sproduct['item'];?></td>
					<td><?=money($product['price']);?></td>

					<td>
						<button class="btn btn-xs btn-default" onclick="update_cart('removeone', '<?=$product['id'];?>','<?=$item['size'];?>');">-</button>

						<?=$item['quantity'];?>
						<?php if ($item['quantity'] < $available): ?>

						<button class="btn btn-xs btn-default" onclick="update_cart('addone', '<?=$product['id'];?>','<?=$item['size'];?>');">+</button>

					<?php else: ?>
						<span class="text-danger">Max</span>

					<?php endif; ?>

					</td>

					<td><?=$item['size']; ?></td>
					<td><?=money($item['quantity'] * $product['price']); ?></td>
				</tr>

				<?php 
					$i++;
					$item_count += $item['quantity'];
					$sub_total += ($product['price'] * $item['quantity']);

				} //ends the for each on line 42

				$tax = TAXRATE * $sub_total;
				$tax = number_format($tax,2);
				$grand_total = $tax + $sub_total;

				?>
			</tbody>
		</table>
		<table class="table table-bordered table-condensed text-right">
			<legend>Totals</legend>
			<thead class="totals-table-header">
				<th>Total Items</th>
				<th>Sub Total</th>
				<th>Tax</th>
				<th>Grand Total</th>
			</thead>
			<tbody>
				<tr>
					<td><?=$item_count;?></td>
					<td><?=money($sub_total);?></td>
					<td><?=money($tax);?></td>
					<td class="bg-success"><?=money($grand_total);?></td>
				</tr>
			</tbody>
		</table>

		<!-- CHECK Out Button-->

		<button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target="#checkoutModal">
		<span> <i class="fa fa-shopping-cart" aria-hidden="true"></i></span> Check Out</button>

		<!-- Check Out Modal -->

		<div class="modal fade" id="checkoutModal" tabindix="-1" role="dialog" aria-labeledby="checkoutModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="checkoutModalLabel">Shipping Address</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<form action="thankyou.php" method="post" id="payment-form">
								<span class="bg-danger" id="payment-error"></span>
								<input type="hidden" name="tax" value="<?=$tax; ?>">
								<input type="hidden" name="sub_total" value="<?=$sub_total; ?>">
								<input type="hidden" name="grand_total" value="<?=$grand_total; ?>">
								<input type="hidden" name="cart_id" value="<?=$cart_id; ?>">
								<input type="hidden" name="description" value="<?=$item_count.'item'.(($item_count>1)?'s');'').' from RedstoneShop.'; ?>">

								<div id="step1" style="display: block;" >
									<div class="from-group col-md-6">
										<label for="full_name">Full Name:</label>
										<input type="text" class="form-control" id="full_name" name="full_name">
									</div>
									<div class="from-group col-md-6">
										<label for="email">Email:</label>
										<input type="email" class="form-control" id="email" name="email">
									</div>
									<div class="from-group col-md-6">
										<label for="street">Street Address:</label>
										<input type="text" class="form-control" id="street" name="street" data-stripe="address_line1">
									</div>
									<div class="from-group col-md-6">
										<label for="street2">Street Address 2:</label>
										<input type="text" class="form-control" id="street2" name="street2" data-stripe="address_line2">
									</div>
									<div class="from-group col-md-6">
										<label for="city">City:</label>
										<input type="text" class="form-control" id="city" name="city" data-stripe="address_city">
									</div>
									<div class="from-group col-md-6">
										<label for="state">State:</label>
										<input type="text" class="form-control" id="state" name="state" data-stripe="address_state">
									</div>
									<div class="from-group col-md-6">
										<label for="zip_code">Zip Code:</label>
										<input type="number" class="form-control" id="zip_code" name="zip_code" data-stripe="address_zip">
									</div>
									<div class="from-group col-md-6">
										<label for="country">Country:</label>
										<input type="text" class="form-control" id="country" name="country" data-stripe="address_country">
									</div>

									<div id="step2" style="display: none;">
										<div class="form-group col-md-3">
											<label for="name">Name on Card:</label>
											<input type="text" id="name" class="form-control" data-stripe="name">
										</div>
										<div class="form-group col-md-3">
											<label for="number">Card Number:</label>
											<input type="number" id="number" class="form-control" data-stripe="number">
										</div>
										<div class="form-group col-md-3">
											<label for="cvc">CVC:</label>
											<input type="number" id="cvc" class="form-control" data-stripe="cvc">
										</div>
										<div class="form-group col-md-3">
											<label for="exp-month">Expiration Month:</label>
											<select id="exp-month" class="form-control" data-stripe="exp-month">
												<option value=""></option>
												<<?php for($i=1;$i < 13; i++): ?>
												<option value="<?=$i;?>"><?=$i;?></option>
											<?php endfor; ?>
											</select>
										</div>

										<div class="form-group col-md-3">
											<label for="exp-month">Expiration Year:</label>
											<select id="exp-year" class="form-control" data-stripe="exp-year">
												<option value=""></option>
												<<?php $yr = date("Y"); ?>
												<<?php for($i=0;$i < 11; i++): ?>
												<option value="<?=$yr+$i;?>"><?=$yr+$i;?></option>
											<?php endfor; ?>
											</select>
										</div>

									</div>

								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>