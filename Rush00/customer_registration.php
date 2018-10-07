<?php
include("functions/functions.php")
?>
<html>
    <head>
        <title> Rushed Cosplay </title>
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
						<li><a href="customer_registration.php">Login</a></li>
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
					
					</span>
				</div>
				<form action="customer_registration.php" method="post" enctype="multipart/form-data">

  				<table class="content_area" align="centre" width="750">
      			<tr><td><h2>Account Registration</h2></td></tr>

     		   <tr>
     		       <td align="right">Name:</td>
     		       <td><input type="text" name="c_name" required /></td>
     		   </tr>

		        <tr>
		            <td align="right">Last Name:</td>
		            <td><input type="text" name="c_lname" required /></td>
		        </tr>

		        <tr>
		            <td align="right">Email Address:</td>
		            <td><input type="text" name="c_email" required /></td>
		        </tr>

		        <tr>
		            <td align="right">Contact Number:</td>
		            <td><input type="text" name="c_contact" required /></td>
		        </tr>
		        <tr>
		            <td align="right">Password:</td>
		            <td><input type="password" name="c_pass" required /></td>
		        </tr>

		        <tr>
		            <td align="right">Profile Image:</td>
		            <td><input type="file" name="c_image" /></td>
		        </tr>

		        <tr>
		            <td align="right" required >Country:</td>
		            <td>
		            <select name="c_country">
		                    <option>----------------</option>
		                    <option>South Africa</option>
		                    <option>United Kingdom</option>
		                    <option>United States</option>
		                    <option>China</option>
		                    <option>Germany</option>
		                    <option>Russia</option>
		                    <option>----------------</option>
		            </select>
		            </td>
		        </tr>

		        <tr>
		            <td align="right">City</td>
		            <td><input type="text" name="c_contact" required /></td>
		        </tr>

		        <tr>
		            <td align="right">Address</td>
		            <td><textarea cols="20" row="10"name="c_address" required ></textarea></td>
		        </tr>

		    <tr>
		        <td><input type="submit" name="register" value="Create Account" /></td>
		    </tr>
		    <tr>
		        <td><?php
		            $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
		            ?>
		        </td>
		    </tr>
		    </table>
			</form>

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


<?php
    if(isset($_POST['register'])){
        $ip = getIp();
        $c_name = $_POST['c_name'];
        $c_lname = $_POST['c_lname'];
        $c_email = $_POST['c_email'];
        $c_contact = $_POST['c_contact'];
        $c_pass = $_POST['c_pass'];
        $c_country = $_POST['c_country'];
        $c_city = $_POST['c_city'];
        $c_address = $_POST['c_address'];
        $c_image = $_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_name']['tmp_name'];
        move_uploaded_file($c_image_tmp."customer/customer_images/$c_image");
        echo $insert_c = "insert into customers (customer_ip, customer_name, customer_lname, customer_email, customer_pass, customer_country, customer_city, customer_address, customer_image) values ('$ip','$c_name','$c_lname','$c_email','$c_pass','$c_country','$c_city','$c_address','$c_image','$c_image',)";
        $run_c = mysqli_query($con, $insert_c);
        
        if($run_c){
            echo "<script>alert('Registration Complete!')</script>";
        }
    }
?>