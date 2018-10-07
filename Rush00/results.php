<!DOCTYPE>
<?php
	include("functions/functions.php");
?>
<html>
<head>
	<title>RushedCosplay</title>

	<link rel="stylesheet" href="styles/style.css" media="all" />
</head>
<body>
	<!--Main Container starts here -->
	<div class="main_wrapper">
		<!--Header starts here -->
		<div class="header_wrapper">
			<a href="index.php"><img id="logo" src="images/logo.png"/></a>
			<img id="banner" src="images/banner.jpg"/>
		</div>
		<!--Header ends here -->

				<!--Menu bar starts here -->
				<div class="menubar">
					<ul id="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="index.php">Home</a></li>
						<li><a href="all_products.php">All Products</a></li>
						<li><a href="customer/my_account.php">My Account</a></li>
						<li><a href="customer_registration.php">Register</a></li>
						<li><a href="login.php">Login</a></li>	
						<li><a href="cart.php">Shopping Cart</a></li>
					</ul>
					<!-- Search bar starts here -->
					<div id="form">
						<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="Search a Product"/>
						<input type="submit" name="search" value="Search" />
						</form>
					</div>
					<!-- Search bar ends here -->
				</div>
				<!--Menu bar ends here -->

		<div class="content_wrapper"> 
			<!-- Side bar starts here -->
			<div id="sidebar">
				<div id="sidebar_title">Categories</div>
				<ul id="cats">
					<?php getCats(); ?>
				</ul>
				<div id="sidebar_title">Wig Colours</div>
				<ul id="cats">
					<?php getCats2(); ?>
				</ul>
			</div>
			<!-- Side bar ends here -->
			<!-- Content area ends here -->
			<div id="content_area">
				<?php cart(); ?>
				<div id="shopping_cart">
					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					
					Welcome Guest! 
					<b style="color:yellow">Shopping Cart - </b> 
					Total Items: Total Price:
					<a href="cart.php" style="color:yellow">Go to Cart</a>
					
					</span>
				</div>
				<div id="products_box">
					<?php

						if(isset($_GET['search'])) {
							$search_query = $_GET['user_query'];

							$get_pro = "select * from products where product_keywords like '%$search_query%'";
							$run_pro = mysqli_query($con, $get_pro);
				
							while ($row_pro = mysqli_fetch_array($run_pro)) {
						
								$pro_id = $row_pro['product_id'];
								$pro_cat = $row_pro['product_cat'];
								$pro_title = $row_pro['product_title'];
								$pro_price = $row_pro['product_price'];
								$pro_image = $row_pro['product_image'];
				
								echo "
									<div id='single_product'>
										<h3>$pro_title</h3>
										<img src='admin_area/product_images/$pro_image' width='180' height='180' />
										<p><b> R $pro_price </b></p>
										<a href='details.php?pro_id=$pro_id' style='float:left';>Details</a>
										<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</buton></a>
									</div>
								";
							}
						}
					?>
				</div>
			</div>
			<!-- Content area ends here -->
		</div>
		<div id="footer">
			<h3 style="text-align: center; padding-top: 30px">&copy; 2018 by WeThinkCode</h3>
		</div>
	</div>
	<!--Main Container ends here -->
</body>
</html>
