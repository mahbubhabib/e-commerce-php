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
	
					   <form method="post" action="" enctype="multipart/form-data">
			<table align="center" width="800px">
			
			
			<tr  align="center">
				<th><b>Remove</b></th>
				<th><b>Product(s)</b></th>
				<th><b>Quantity</b></th>
				<th><b>Total Price</b></th>
			</tr>
						<?php		
							$total=0;
							$ip=getIp();
								
							$sel_price="select *from cart where ip_add='$ip'";
							$run_price= mysqli_query(get_db_connection(), $sel_price);
								
							while($p_price=mysqli_fetch_assoc($run_price))
								{
								   $pro_id=$p_price['p_id'];
								   $qty=$p_price['qty'];
								   
								   $pro_price="select *from products where product_id='$pro_id'";
								   
								   $run_pro_price= mysqli_query(get_db_connection(), $pro_price);
								   
								   while($pp_price=mysqli_fetch_assoc($run_pro_price))
										{
										   $product_price=array($pp_price['product_price']);
										   
										   $product_title=$pp_price['product_title'];
											
										   $product_image=$pp_price['product_image'];
											 
										   $single_price=$pp_price['product_price'];
										   
										   $values=array_sum($product_price);
				   
				                           $total +=$values;

									
						?>


			<tr align="center">
				<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>" /></td>
				<td><?php echo $product_title; ?><br>
				<img src="product_images/<?php echo $product_image;?>" width="60px" height="60px"/></td>
				<td><input type="text" size="3" name="qtyi" value="<?php echo $qty; ?>"/></td>

				<?php
				 	      if(isset($_POST['update_cart']))
								{
									$qty=$_POST['qtyi'];
												
									$update_qty="UPDATE cart SET qty='$qty'";
												
									$run_qty=mysqli_query(get_db_connection(),$update_qty);
									
									$_SESSION['qtyi']=$qty;
												
									$total=$total*$qty;
	

								}

				?>
				
				
				<td><?php echo "TK.". $single_price; ?></td>
			</tr>
			
<?php } } ?>

			<tr align="right">
				<td colspan="5">Sub Total:</td>
				<td><?php echo "TK.". $total; ?></td>
			</tr>
			<tr align="right">
			   <td colspan="1"><input type="submit" name="delete" value="Item Delete"/></td>
				<td><input type="submit" name="update_cart" value="Update Cart"/></td>
				<td><input type="submit" name="continue" value="Continue Shopping"/></td>
				<td><a id="button" href="login.php" >Check Out</a></td>
				
			</tr>
			</table>
	</form>
	
		<?php

		$ip=getIp();
		
		if(isset($_POST['delete']))
			{
			   foreach($_POST['remove'] as $remove_id)
			   {
				   	$delete_product = "DELETE FROM cart WHERE p_id='$remove_id' and ip_add='$ip'";
					$run_delete= mysqli_query(get_db_connection(), $delete_product);
					
					
					if($run_delete)
					{
						echo "<script>window.open('cart.php','_self')</script>";
					}
			   }			   
			}
			
			if(isset($_POST['continue']))
			{
				echo "<script>window.open('index.php','_self')</script>";
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

