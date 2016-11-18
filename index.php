<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Bootstrap 4</title>
		<!-- Custom Google Fonts --> 
		<!-- <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,700|BenchNine:300" rel="stylesheet"> -->
		<!-- Font Awesome -->
		<script src="https://use.fontawesome.com/2415393c0d.js"></script>
		<!-- Animate.css -->
		<!-- <link rel="stylesheet" type="text/css" href="css/animate.css"> -->
		<!-- Bootstrap.css -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<!-- Custom Style Sheet -->
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<!-- ******Jquery GOOGLE CDN***** -->
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
	</head>

	<body>
		<!-- NaV -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<a href="index.php" class="navbar-brand">Red Stone Shop</a>
				
				<!-- Dropdown menu -->
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-tggle" data-toggle="dropdown" id="text">Men <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="#">Shirts</a>
							</li>
							<li>
								<a href="#">Shoes</a>
							</li>
							<li>
								<a href="#">Accessories</a>
							</li>
							<li>
								<a href="#">Pants</a>
							</li>
						</ul>
					</li>	
				</ul>
			</div>
		</nav>

		<!-- inserting images -->
		<div id="background-image">
			<div id="image-1"></div>
			<div id="image-2"></div>
		</div>

		<!-- Main Content -->
		<div class="container-fluid featured-products">
			<div class="col-md-8 col-md-offset-2">
				<div class="row">
					<h2 class="text-center">Featured Products</h2>
					<div class="col-md-3">
						<h4>Levi's Jeans</h4>
						<img src="img/levis.png" alt="Levis">
						<p class="list-price text-danger">List Price: <s>$24.99</s></p>
						<p class="price">Price: $19.99</p>
						<button type="button" class="btn btn-success" data-toggle="model" data-target="details-1">Details</button>
					</div>

					<div class="col-md-3">
						<h4>AgJeans</h4>
						<img src="img/ag-jeans.png" alt="ag-jeans">
						<p class="list-price text-danger">List Price: <s>$215.00</s></p>
						<p class="price">Price: $129.99</p>
						<button type="button" class="btn btn-success" data-toggle="model" data-target="details-2">Details</button>
					</div>

					<div class="col-md-3">
						<h4>Mecy's Jeans</h4>
						<img src="img/macys.png" alt="macys">
						<p class="list-price text-danger">List Price: <s>$66.99</s></p>
						<p class="price">Price: $39.99</p>
						<button type="button" class="btn btn-success" data-toggle="model" data-target="details-3">Details</button>
					</div>

					<div class="col-md-3">
						<h4>Old Navy Jeans</h4>
						<img src="img/old-navy.png" alt="old-navy">
						<p class="list-price text-danger">List Price: <s>$34.99</s></p>
						<p class="price">Price: $20.00</p>
						<button type="button" class="btn btn-success" data-toggle="model" data-target="details-4">Details</button>
					</div>
				</div> <!-- row -->
			</div> <!-- col-8 -->
		</div>

		<!-- Footer -->
		<footer class="text-center" id="footer">
			<p>$copy; Copyright 2016-2017 Ahmed Soliman</p>
			
		</footer>


	</body>
	
</html>

