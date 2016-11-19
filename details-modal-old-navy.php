<div class="modal fade details-4" id="details-4" tableindex="-1" role="dialog" aria-labelledby="details-4" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title text-center">Old Navy Jeans</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<div class="center-block">
								<img src="img/old-navy.png" alt="Levies" class="details img-responsive">
							</div>
						</div>
						<div class="col-sm-6">
							<h4>Details</h4>
							<p>These Jeans are super, You must buy them now!</p>

							<hr />

							<p>Price: $20.00</p>
							<p>Brand: Old Navy Jeans</p>

							<br />

							<form action="add_cart_php" method="post">
								<div class="col-xs-6">

									<div class="form-group">
										<label for="quantity" id="quantity-label">Quantity</label>
										<input type="text" class="form-control" id="quantity" name="quantity">
									</div>

									<div class="form-group">
										<label for="size">Size:</label>
										<select name="size" id="size" class="form-control">
											<option value=""></option>
											<option value="28">28</option>
											<option value="30">30</option>
											<option value="32">32</option>
											<option value="34">34</option>
											<option value="36">36</option>
										</select>
									</div>

								</div><!-- col-xs-6 -->
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal">Close</button>
				<button class="btn btn-warning" type="submit"><span> <i class="fa fa-shopping-cart" aria-hidden="true"></i>  </span>Add to cart</button>
			</div>
		</div>
	</div>
</div>