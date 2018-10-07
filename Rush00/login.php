<!DOCTYPE>
<?php
	include("functions/functions.php");
?>
<html>
<head>
	<title>Rushed Cosplay</title>

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
			<!-- Content area starts here -->
			<div id="content_area">
			
			<?php cart(); ?>

				<div id="shopping_cart">
					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					
					Welcome Guest! 
					<b style="color:yellow">Shopping Cart - </b> 
					Total Items: Total Price:
					<a href="cart.php" style="color:yellow">Go to Cart</a>
					
					<?php
					if(!isset($_SESSION['customer_email'])){
						echo "<a href='checkout.php'>Login</a>";
					}
					else{
						echo "<a href='logout.php'>Logout</a>";
					}
					?>


					</span>
				</div>
	
	<form method="post" action=""> 
		
		<table width="500" align="center" bgcolor="grey"> 
			
			<tr align="center">
				<td colspan="3"><h2>Login or Register for Love!</h2></td>
			</tr>
			
			<tr>
				<td align="right"><b>Email:</b></td>
				<td><input type="text" name="email" placeholder="enter email" required/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Password:</b></td>
				<td><input type="password" name="password" placeholder="enter password" required/></td>
			</tr>
			
			<tr align="center">
				<td colspan="3"><a href="checkout.php?forgot_password">Forgot Password?</a></td>
			</tr>
			
			<tr align="center">
				<td colspan="3"><input type="submit" name="Login" value="Login" /></td>
			</tr>

		</table> 
	
			<h2 style="float:right; padding-right:20px;"><a href="customer_registration.php" style="text-decoration:none;">New? Register Here</a></h2>
	
	
	</form>
	
	
	<?php 
	if(isset($_POST['Login'])){
		
		$c_email = $_POST['email'];
		$c_pass = $_POST['password'];
		
		$sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
		
		$run_c = mysqli_query($con, $sel_c);
		
		$check_customer = mysqli_num_rows($run_c); 
		
		if($check_customer==0){
		
		echo "<script>alert('FUCK!!')</script>";
		exit();
		}
		$ip = getIp(); 
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_customer>0 AND $check_cart==0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('You logged in successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		}
		else {
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('You logged in successfully, Thanks!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
		}
	}
	?>
</div>