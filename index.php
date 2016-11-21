<?php 
	require_once 'core/init.php';
	$sql = "SELECT * FROM products WHERE featured = 1";
	$featured = $db->query($sql);
	?>


	<?php 
	$sql = 'SELECT * FROM categories WHERE parent = 0';
	$pquery = $db->query($sql);
	?>
		<!-- NaV -->
		<nav class="navbar navbar-fixed-top">
			<div class="container">
				<a href="index.php" class="navbar-brand">Red Stone Shop</a>
				
				<!-- Dropdown menu -->
				<ul class="nav navbar-nav">
					<?php while($parent = mysqli_fetch_assoc($pquery)): ?>
					<?php 
					$parent_id = $parent ['id'];
					$sql2 = "SELECT * FROM categories WHERE parent = '$parent_id'";
					$cquery = $db->query($sql2);
					?>
					<li class="dropdown">
						<a href="#" class="dropdown-tggle" data-toggle="dropdown" id="text"><?php echo $parent['category']; ?><span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<?php while($child = mysqli_fetch_assoc($cquery)) :?>
							<li>
								<a href="#"><?php echo $child['category']; ?></a>
							</li>
							<?php endwhile; ?>
						</ul>
					</li>
					<?php endwhile; ?>	
				</ul>
			</div>
		</nav>

		

		<!-- Main Content -->
		<div class="container-fluid featured-products">
			<div class="col-md-8 col-md-offset-2">
				<div class="row">
					<h2 class="text-center">Featured Products</h2>
					<?php while($product = mysqli_fetch_assoc($featured)) : ?>
					<div class="col-sm-3">
						<h4><?= $product['title']; ?></h4>
						<img src="<?=$product['image']; ?>" alt="<?=$product['title']; ?>" id="images">
						<p class="list-price text-danger">List Price: <s>$<?=$product['list_price']; ?></s></p>
						<p class="price">Price: $<?=$product['price']; ?></p>
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-1">Details</button>
					</div>
					<?php endwhile; ?>

				</div> <!-- row -->
			</div> <!-- col-8 -->
		</div>

		<!-- Footer -->
		<footer class="text-center" id="footer">
			<p>&copy; Copyright 2016-2017</p>
			<p>Ahmed Soliman</p>
			
		</footer>


		<!-- Details Modul -->
		<?php include 'details-modal-LevisJeans.php';
		      include 'details-modal-ag-jeans.php';
		      include 'details-modal-macys.php';
		      include 'details-modal-old-navy.php'; 
		?>
			


	</body>
</html>