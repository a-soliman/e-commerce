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