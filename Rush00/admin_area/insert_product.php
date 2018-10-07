<!DOCTYPE>

<?php
include("includes/db.php");
?>
<html>
<head>
	<title>Inserting Product</title>
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
	tinymce.init({selector:'textarea'});
</script>
</head>
<body bgcolor="skyblue">
	
	<form action="insert_product.php" method="post" enctype="multipart/form-data">
		<table align="center" width="700" border="black" bgcolor="green">
			<tr align="center">
				<td colspan="7"><h2>Insert New Product</h2></td>
			</tr>
			<tr>
				<td align="center">Product Title:</td>
				<td><input type="text" name="product_title" size="60" required/></td>
			</tr>
			<tr>
				<td align="center">Product Category:</td>
				<td>
					<select name="product_cat" required>
						<option>Select a Category</option>
						<?php
							$get_cats = "select * from categories";
							$run_cats = mysqli_query($con, $get_cats);
						
							while ($row_cats=mysqli_fetch_array($run_cats)) {
								
								$cat_id = $row_cats['cat_id'];
								$cat_title = $row_cats['cat_title'];
						
								echo "<option value='$cat_id'>$cat_title</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="center">Product Image:</td>
				<td><input type="file" name="product_image" required/></td>
			</tr>
			<tr>
				<td align="center">Product Price:</td>
				<td><input type="text" name="product_price" required/></td>
			</tr>
			<tr>
				<td align="center">Product Description:</td>
				<td><textarea name="product_desc" cols="20" rows="10"></textarea></td>
			</tr>
			<tr>
				<td align="center">Product Keywords:</td>
				<td><input type="text" name="product_keywords" size="50" required/></td>
			</tr>
			<tr></tr>
			<tr align="center">
				<td colspan="7"><input type="submit" name="insert_product" value="Insert Now"/></td>
			</tr>
		</table>
	</form>

</body>
</html>

<?php
	if(isset($_POST['insert_product'])) {

		//getting the text data from the form fields
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		$product_price= $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];

		//getting the image from the form field
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];

		move_uploaded_file($product_image_tmp, "product_images/$product_image");

		$insert_product = "insert into products (product_cat, product_title, product_price, product_desc, product_image, product_keywords) values ('$product_cat', '$product_title', '$product_price', '$product_desc', '$product_image', '$product_keywords')";
		$insert_pro = mysqli_query($con, $insert_product);
		
		if($insert_pro) {
			echo "<script>alert('Product has been inserted!')</script>";
			echo "<script>window.open('insert_product.php', '_self')</script>";
		}
	}
?>