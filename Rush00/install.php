<?php
/*
**  Login and Database information
*/
$servername = "localhost";
$username = "root";
$password = "WTCpass8";
$dbname = "rush00";
$tbl_cart = "cart";
$tbl_cats = "categories";
$tbl_cats2 = "categories_2";
$tbl_prod = "products";
$tbl_cust = "customers";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()."<br>");
}

// Create database if it hasn't been already
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn)."<br>";
}

// Refresh connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()."<br>");
}

// Checkout Cart Table
$sql = "CREATE TABLE IF NOT EXISTS $tbl_cart (
    p_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    ip_add VARCHAR(255) NOT NULL,
    qty INT(10) NOT NULL)";

if (mysqli_query($conn, $sql)) {
    echo " Cart Table created successfully<br>";
} else {
    echo "Error creating table: ".mysqli_error($conn)."<br>";
}

// Category Table
$sql = "CREATE TABLE IF NOT EXISTS $tbl_cats (
	cat_id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, 
	cat_title TEXT NOT NULL)";
	
if (mysqli_query($conn, $sql)) {
	echo "Categories Table created successfully<br>";
} else {
	echo "Error creating table: ".mysqli_error($conn)."<br>";
}

$sql = "INSERT INTO $tbl_cats (cat_id, cat_title) VALUES
(1, 'Contact Lenses'),
(2, 'Wigs'),
(3, 'Outfits'),
(4, 'Accessories')";

if (mysqli_query($conn, $sql)) {
    echo "Categories created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<br>";
}

// Wig Colours Table
$sql = "CREATE TABLE IF NOT EXISTS $tbl_cats2 (
    cats2_id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    cats2_title TEXT NOT NULL)";
    
if (mysqli_query($conn, $sql)) {
    echo "Categories2 Table (aka Wig Colours) created successfully<br>";
} else {
    echo "Error creating table: ".mysqli_error($conn)."<br>";
}

$sql = "INSERT INTO $tbl_cats2 (cats2_id, cats2_title) VALUES
(0, 'Other'),
(1, 'Black'),
(2, 'Red'),
(3, 'Blonde'),
(4, 'Green'),
(5, 'Purple')";

if (mysqli_query($conn, $sql)) {
    echo "Wig Colour records created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<br>";
}

// Details of Products Table
$sql = "CREATE TABLE IF NOT EXISTS $tbl_prod (
    product_id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    product_cat VARCHAR(100) NOT NULL,
    product_cat2 VARCHAR(100) NOT NULL,
    product_title VARCHAR(255) NOT NULL,
	product_price VARCHAR(100) NOT NULL,
	product_desc TEXT NOT NULL,
	product_image TEXT NOT NULL,
	product_keywords TEXT NOT NULL)";

if (mysqli_query($conn, $sql)) {
    echo "Products Table created successfully<br>";
} else {
    echo "Error creating table: ".mysqli_error($conn)."<br>";
}

$sql = "INSERT INTO $tbl_prod (`product_id`, `product_cat`, `product_cat2`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(18, 3, 0, 'Akatsuki Cloak', '500', '<p>Cloak for a member of the notorious Akatsku organization</p>\r\n<p>Anime: Naruto</p>', 'Outfit1.jpg', 'outfits, akatsuki, naruto'),
(19, 3, 0, 'Alucard Outfit', '700', '<p><i>The bird of Hermes is my name; Eating my wings to make me tame.</i></p><br><p>Outfit of the most powerful vampire, and weapon of the Hellsing Organization, Alucard!</p>', 'Alucard-outfit.jpg', 'outfits, hellsing, alucard'),
(20, 3, 0, 'Ichigo Bankai Outfit', '500', '<p><i>BAN...<b>KAI!</b></i><br>Transform into Ichigos Bankai with this outfit from the anime Bleach! </p>', 'Ichigo-bankai.jpg', 'outfits, ichigo, bleach, bankai'),
(21, 2, 3, 'Long Blonde Wig', '300', '<p>Long blonde wig with curly ends</p>', 'long_blonde_wig.jpg', 'wigs, long wigs, blonde wigs'),
(22, 2, 5, 'Long Purple Wig', '300', '<p>Long purple (lilac) wig with wavy ends</p>', 'long_purple_wig.jpg', 'wigs, long wigs, purple wigs'),
(23, 2, 1, 'Short Black Wig (Pigtails)', '200', '<p>Short black wig, with 2 short pigtails</p>', 'short_black_wig.jpeg', 'wigs, short wigs, black wigs, pigtails'),
(24, 2, 1, 'Short Black Wig', '150', '<p>Short black wig. Styled</p>', 'black_short_wig.jpg', 'wigs, short wigs, black wigs'),
(25, 2, 2, 'Short Red Wig (Pigtails)', '200', '<p>Short-medium red wig with short pigtails.</p>', 'medium_short_red.jpg', 'wigs, short wigs, red wigs, pigtails'),
(26, 2, 4, 'Medium Green Wig', '150', '<p>Medium gradient green wig</p>', 'medium_wig_green.jpeg', 'medium wigs, green wigs'),
(27, 4, 0, 'Naruto Konoha Necklace', '100', 'Symbol of Konohagakure\n', 'konoha necklace.jpeg', 'accessories, necklace, naruto'),
(28, 4, 0, 'Naruto Konoha Ring', '120', '<p>Symbol of Konohagakure</p>', 'konoha ring.jpg', 'accessories, rings, naruto'),
(29, 1, 0, 'Natural Colour Lenses', '200', '<p>Natural Colour Contact Lenses</p>', 'natural_lenses.jpg', 'contact lenses')";

if (mysqli_query($conn, $sql)) {
    echo "Products records created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<br>";
}

// User Table
$sql = "CREATE TABLE IF NOT EXISTS $tbl_cust (
	customer_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	customer_ip VARCHAR(255) NOT NULL,
	customer_name TEXT NOT NULL,
  	customer_lname TEXT NOT NULL,
  	customer_email VARCHAR(255) NOT NULL,
  	customer_pass VARCHAR(100) NOT NULL,
  	customer_country TEXT NOT NULL,
  	customer_city TEXT NOT NULL,
  	customer_contact VARCHAR(255) NOT NULL,
  	customer_address TEXT NOT NULL,
  	customer_image TEXT NOT NULL
	)";
	
if (mysqli_query($conn, $sql)) {
	echo "Table Users created successfully<br>";
} else {
	echo "Error creating table: ".mysqli_error($conn)."<br>";
}

mysqli_close($conn);
?>