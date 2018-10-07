<?php
include("index.php")
?>
<html>
    <head>
        <title> Rushed Cosplay </title>
    <link rel="stylesheet" href="styles/style.css" media="all" />
    </head>

<body>
<form action="customer_registration.php" method="post" enctype="multipart/form-data">

    <table class="menubar" align="centre" width="750">

        <tr>
            <td><h2>Account Registration</h2></td>
        </tr>

        <tr>
            <td align="right">Customer Name:</td>
            <td><input type="text" name="c_name" required /></td>
        </tr>

        <tr></tr>
            <td align="right">Customer Lastname:</td>
            <td><input type="text" name="c_lname" required /></td>
        </tr>

        <tr>
            <td align="right">Customer Email:</td>
            <td><input type="text" name="c_email" required /></td>
        </tr>

        <tr>
            <td align="right">Customer Contact:</td>
            <td><input type="text" name="c_contact" required /></td>
        </tr>
        <tr>
            <td align="right">Customer Password:</td>
            <td><input type="password" name="c_pass" required /></td>
        </tr>

        <tr>
            <td align="right">Customer Image:</td>
            <td><input type="file" name="c_image" /></td>
        </tr>

        <tr>
            <td align="right" required >Customer Country:</td>
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
            <td align="right">Customer City</td>
            <td><input type="text" name="c_contact" required /></td>
        </tr>

        <tr>
            <td align="right">Customer Address</td>
            <td><textarea cols="20" row="10"name="c_address" required ></textarea></td>
        </tr>

    <tr>
        <td><input type="submit" name="register" value="Create Account" /></td>
    </tr>
    <tr>
        <td><?php
            $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
            echo "<a href='$url'>Home</a>"; 
            ?>
        <td>
    </tr>

    </table>
</form>
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