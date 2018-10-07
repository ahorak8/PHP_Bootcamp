<?php 
include("includes/db.php");
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
						<li><a href="customer_login.php">Login</a></li>	
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
			
<div id="content_area"> 
	
	<form method="post" action=""> 
		<table width="500" align="center"> 
			<tr align="center">
				<td colspan="3"><h2>Login or Register to Buy!</h2></td>
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
			<h2 style="float:right; margin-right:40px;"><a href="customer_registration.php" style="text-decoration:none;">New? Register Here</a></h2>

	</form>
	</div>
	<div id="footer">
		<h3 style="text-align: center; padding-top: 30px">&copy; 2018 by WeThinkCode</h3>
	</div>
	</div>
	<!--Main Container ends here -->
</body>
</html>
	<?php 
	if(isset($_POST['login'])){
	
		$customer_email = $_POST['customer_email'];
		$customer_pass = $_POST['customer_pass'];
		
		$sel_c = "SELECT * FROM customers WHERE customer_pass='$customer_pass' AND customer_email='$customer_email'";
		
		$run_c = mysqli_query($con, $sel_c);
		
		$check_customer = mysqli_num_rows($run_c); 
		
		if($check_customer==0){
		
		echo "<script>alert('Password or email is incorrect, please try again!')</script>";
		exit();
		}
		$ip = getIp(); 
		
		$sel_cart = "SELECT * FROM cart WHERE ip_add='$ip'";
		
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
	