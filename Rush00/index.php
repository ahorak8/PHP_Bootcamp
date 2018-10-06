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
			<img id="logo" src="images/logo.png"/>
			<img id="banner" src="images/banner.jpg"/>
		</div>
		<!--Header ends here -->

				<!--Menu bar starts here -->
				<div class="menubar">
					<ul id="menu">
						<li><a href="#">Home</a></li>
						<li><a href="#">All Products</a></li>
						<li><a href="#">My Account</a></li>
						<li><a href="#">Sign Up</a></li>
						<li><a href="#">Contact Us</a></li>
						<li><a href="#">Shopping Cart</a></li>
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
			</div>
			<!-- Side bar ends here -->
			<div id="content_area">Content area</div>
		</div>
		<div id="footer">
			<h3 style="text-align: center; padding-top: 30px">&copy; 2018 by WeThinkCode</h3>
		</div>
	</div>
	<!--Main Container ends here -->
</body>
</html>
