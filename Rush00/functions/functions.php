<?php

$con = mysqli_connect("localhost","root","WTCpass8","rush00");

if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//getting the categories

function getCats() {

	global $con;
	$get_cats = "select * from categories";
	$run_cats = mysqli_query($con, $get_cats);

	while ($row_cats=mysqli_fetch_array($run_cats)) {
		
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];

		echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
	}
}

//getting the product details for home page 
function getPro () {
	
	if(!isset($_GET['cat'])) {
		
		global $con;
		$get_pro = "select * from products order by RAND() LIMIT 0,6";
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
}

//getting the product details for categories 
function getCatPro () {
	
	if(isset($_GET['cat'])) {
		
		$cat_id = $_GET['cat'];

		global $con;
		$get_cat_pro = "select * from products where product_cat=$cat_id";
		$run_cat_pro = mysqli_query($con, $get_cat_pro);

		$count_cats = mysqli_num_rows($run_cat_pro);
		
		if($count_cats==0) {
			echo "<h2 style='padding:20px;'>There are no products in this category. Sorry</h2>";
			exit();
		}
		else {
			
			while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
		
				$pro_id = $row_cat_pro['product_id'];
				$pro_cat = $row_cat_pro['product_cat'];
				$pro_title = $row_cat_pro['product_title'];
				$pro_price = $row_cat_pro['product_price'];
				$pro_image = $row_cat_pro['product_image'];

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
	}
}

?>