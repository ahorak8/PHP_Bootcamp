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

function getCats2() {

	global $con;
	$get_cats2 = "select * from categories_2";
	$run_cats2 = mysqli_query($con, $get_cats2);

	while ($row_cats2=mysqli_fetch_array($run_cats2)) {
		
		$cat2_id = $row_cats2['cat2_id'];
		$cat2_title = $row_cats2['cat2_title'];

		echo "<li><a href='index.php?cat2=$cat2_id'>$cat2_title</a></li>";
	}
}

//getting the product details for home page 
function getPro () {
	
	if(!isset($_GET['cat'])) {
		if(!isset($_GET['cat2'])) {
		
		global $con;
		$get_pro = "select * from products order by RAND() LIMIT 0,6";
		$run_pro = mysqli_query($con, $get_pro);

		while ($row_pro = mysqli_fetch_array($run_pro)) {
		
			$pro_id = $row_pro['product_id'];
			$pro_cat = $row_pro['product_cat'];
			$pro_cat2 = $row_pro['product_cat2'];
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
				$pro_cat2 = $row_cat2_pro['product_cat2'];
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

//getting the product details for categories 2
function getCat2Pro () {
	
	if(isset($_GET['cat2'])) {
		
		$cat2_id = $_GET['cat2'];

		global $con;
		$get_cat2_pro = "select * from products where product_cat2=$cat2_id";
		$run_cat2_pro = mysqli_query($con, $get_cat2_pro);

		$count_cats2 = mysqli_num_rows($run_cat2_pro);
		
		if($count_cats2==0) {
			echo "<h2 style='padding:20px;'>There are no products in this category. Sorry</h2>";
			exit();
		}
		else {
			
			while ($row_cat2_pro = mysqli_fetch_array($run_cat2_pro)) {
		
				$pro_id = $row_cat2_pro['product_id'];
				$pro_cat = $row_cat2_pro['product_cat'];
				$pro_cat2 = $row_cat2_pro['product_cat2'];
				$pro_title = $row_cat2_pro['product_title'];
				$pro_price = $row_cat2_pro['product_price'];
				$pro_image = $row_cat2_pro['product_image'];

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

//Get Ip Address
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

//create cart
function cart() {
	if (isset($_GET['add_cart'])) {
		global $con;
		$ip = getip();
		$pro_id = $_GET['add_car'];
		
		$check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
		$run_check = mysqli_query($con, $check_pro);
		if(mysqli_num_rows($run_check)>0){
		
			echo "";
		}
		else {
		
			$insert_pro = "insert into cart (p_id, ip_add) values ('$p_id','$ip')";
		
			$run_pro = mysqli_query($con, $insert_pro);
			echo "<script>window.open('index.php','_self')</script>";
		}
	}
}

//Total items in cart
function total_items(){
    
    if(iset($_GET['add_cart'])){
        global $con;
        $ip = getIp();
        $get_items ="select * from cart where ip_add='$ip'";
        $run_items = mysqli_query($con, $get_items);
        $count_items = mysqli_num_rows($run_items);
        
        }
        
        else {
        
        $ip = getIp();
        $get_items ="select * from cart where ip_add='$ip'";
        $run_items = mysqli_query($con, $get_items);
        $count_items = mysqli_num_rows($run_items);
        }
    echo $count_items;
}

//Get price total 
function total_price(){
    $total = 0;
    global $con;
    $ip = getIp();
    $sel_price = "select * from cart where ip_add='$ip'";
    $run_price = mysqli_query($con, $sel_price);
    while($p_price=mysqli_fetch_array($run_price)){
        $pro_id = $p_price['p_id'];
        $pro_price = "select * from products where product_id='$pro_id'";
        $run_pro_price = mysqli_query($con, $pro_price);
        while ($pp_price = msqli_fetch_array($run_pro_price)){
        
        $product_price = array($pp_price['product_price']);
        $values = array_sum($product_price);
        $total += $values;
        
        }
    }
    echo "R" .$total;
}

?>