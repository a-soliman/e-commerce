<?php
require_once 'core/init.php';
$id = $_POST['id'];
$id = (int)$id;
$sql = "SELECT * FROM products WHERE id = '$id'";
$result = $db->query($sql);
$product = mysqli_fetch_assoc($result);
$brand_id = $product['brand'];
$sql = "SELECT brand FROM brand WHERE id = '$brand_id'";
$brand_query = $db->query($sql);
$brand = mysqli_fetch_assoc($brand_query);
$sizestring = $product['sizes'];
$sizestring = rtrim($sizestring,',');
$size_array = explode(',', $sizestring);
?>


<!-- Details light box -->
<?php ob_start(); ?>

<div class="modal fade details-1" id="details-1" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" onclick="closemodal()">&times;</span>
				</button>
				<h4 class="modal-title text-center"> <?=$product['title']; ?> </h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<div class="center-block fotorama" data-autoplay="true">
								<?php $photos = explode(',',$product['image']); 
								foreach ($photos as $photo) : ?>
								<img src="<?=$photo; ?>" alt="<?=$product['title']; ?>" class="details img-responsive">
								<?php endforeach ;?>
							</div>
						</div>
						<div class="col-sm-6">
							<h4>Details</h4>
							<p> <?= nl2br($product['description']); ?> </p>

							<hr />

							<p>Price: $<?=$product['price']; ?></p>
							<p>Brand: <?=$product['brand']; ?></p>

							<br />

							<form action="add_cart_php" method="post" id="add_product_form">
								<input type="hidden" name="product_id" value="<?=$id; ?>">
								<input type="hidden" name="available" id="available" value="">
								<div class="col-xs-6">

									<div class="form-group">
										<label for="quantity" id="quantity-label">Quantity</label>
										<input type="text" class="form-control" id="quantity" name="quantity" min="0">
									</div>
									
									<br>

									<viv class="col-xs-9">
										&nbsp;
									</viv>

									<div class="form-group">
										<label for="size">Size:</label>
										<select name="size" id="size" class="form-control">
											<option value=""></option>
											<?php foreach ($size_array as $string) {
												$string_array = explode(':',$string);
												$size = $string_array[0];
												$available =$string_array[1];
												if ($available > 0) {
													echo '<option value"'.$size.'" data-available="'.$available.'">'.size.'('.$available.' Available)</option>';
												}
											}
											?>
										</select>
									</div>
								</div><!-- col-xs-6 -->
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal" onclick="closemodal()">Close</button>
				<button class="btn btn-warning" type="submit"><span> <i class="fa fa-shopping-cart" aria-hidden="true"></i>  </span>Add to cart</button>
			</div>
		</div>
	</div>
</div>

<script>
	//script to refresh the modal every time diffrent product was clicled
	$(function() {
		$('.fotorama').fotorama({'loop':true});
	});

	$('#size').change(function() {
		var available = $('#size option:selected').data("available");
		$('#available').val(available);
	});

	function closemodal() {
		$('#details-1').modal('hide');
		console.log("step one")

		setTimeout(function() {
			$('#details-1').remove();
			console.log("step two")
			$('.modal-backdrop').remove();
			console.log("step three")
		}, 500);
		console.log('done')
	}

</script>

<?php echo ob_get_clean(); ?>
