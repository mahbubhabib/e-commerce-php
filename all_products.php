<?php include("functions/functions.php"); ?>
<!DOCTYPE html>
<html>

<head>

<title>E-Commerce</title>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #dddddd;
}

li {
    float: left;
}

li a {
    display: block;
    padding: 8px;
}
#product
{
	width:100%;
	text-align:center;
	margin-left:30px;
	margin-bottom:10px;
}
</style>

</head>
<body>


<table align="center" border="1" height="20" width="1000" cellpadding="5" cellspacing="0">
<td><h2>Online Shop</h2></td>
<td align="right"> <input type="text" name="search" id="search" placeholder="Search..">
<!-- user/login.php -->
<b>Shopping Cart-</b> Total Items: <b><?php total_items();?></b> Total Price: <b> TK.<?php total_price();?></b>  <a href="cart.php">GO TO CART</a>
 </td>
</table>

<table align="center" border="1" height="40" width="1000" cellpadding="5" cellspacing="0">
<td align="left">
<div id="menu">

<ul id="nav">
<li><a href="index.php">Home</a>
<li><a href="all_products.php">All Details</a></li>
<li><a href="cart.php">Your bag</a></li>
<li style='float:right'><a href="login.php">Login</a></li>
<li style='float:right'><a href="register.php">Registration</a></li>
</ul>

</div>
</td>
</table>

<table align="center" border="1" height="450" width="1000" cellpadding="5" cellspacing="0">

  <tr>
    <td width="150" valign="top"><b>Advertise</b><br>
	
	</td>
	<td id="product">
	
<?php
											$get_pro = "select *from products";
									$run_pro= mysqli_query(get_db_connection(), $get_pro);
									
									while($row_pro=mysqli_fetch_assoc($run_pro))
									{
									   $pro_id=$row_pro['product_id'];
									   $pro_cat=$row_pro['product_cat'];
									   $pro_brand=$row_pro['product_brand'];
									   $pro_title=$row_pro['product_title'];
									   $pro_price=$row_pro['product_price'];
									   $pro_image=$row_pro['product_image'];
									 
									   
									   echo "
									   
										<div id='single_product'>
										
											<h3>$pro_title</h3>
											<img src='product_images/$pro_image' width='180' height='180'/>
											
											<p><b> Tk. $pro_price</b></p>
											<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
											<a href='index.php?pro_id=$pro_id'><button style='float:right;'> Add To Cart</button></a>
											
										
										</div>
									   
									   ";
									}

									?>

		
</td>
	 
	<td width="150" valign="top"><b>Advertise</b><br>
	
	</td>
	</tr>
	
</table>
<table align="center" border="1" height="50" width="1000" cellpadding="5" cellspacing="0">
<td align="center"><h4>Copyright</h4></td>
</table>
</body>
</html>

