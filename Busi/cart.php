<?php session_start();?>
<?php 

include("functions/functions.php"); 

?>

<html>
	<head>
		<title>Cart</title>
		
		<link rel="stylesheet" href="styles/style.css" media="all"/>
	</head>

<body>

<!-------------Main Container starts here-------------->
	<div class="main_wrapper">
	
      <!-------------Header starts here-------------->	
		<div class="header_wrapper">
		
				<p><img src="images/ecommerce.png" width="130px" height="130px"  style="float:left" /><h1 style="color:white; padding-top:55px;font-family:COMIC SANS MS;">E-COMMERCE</h1></p>
					
					<div id="form" >
					   <form method="get" action="results.php" enctype="multipart/form-data">
							<input type="text" name="user-query" placeholder="Search products"/>
							<input type="submit" name="search" value="search"/>
					   </form>
					</div>
<!-------------Menu starts here-------------->				
<ul id="nav">
        <li><a href="index.php">HOME</a></li>
        <li><a href="all_products.php">ALL PRODUCTS</a></li>
		<li><a href="#">MY ACCOUNT</a></li>
		<li><a href="#">SHOPPING CART</a></li>
		<li><a href="#">CONTACT US</a></li>
        <li style='float:right'><a href="#">SIGN UP</a></li>
        <li style='float:right'><a href="#">LOGIN</a></li>

  
</ul>
<!-------------Menu ends here-------------->
		
		</div>
		<!-------------Header Ends here-------------->
		
		<!-------------Main Content starts here-------------->
		<div class="content_wrapper">
		
		<!-------------Sidebar starts here-------------->
			<div id="sidebar">

				<!-------------sidebar_title starts here-------------->				
				<div id="sidebar_title">Catagories</div>
			
					<ul id="cats">
					
					<?php getCats(); ?>
		  
					</ul>

			  	<div id="sidebar_title">Brands</div>
			
					<ul id="cats">

					<?php getBrands(); ?>
					

						  
					</ul>
					<!-------------sidebar_title ends here-------------->
			
			</div>
        <!-------------Sidebar Ends here-------------->
	
			<!-------------Content area starts here-------------->			
			<div id="content_area">
			<?php cart();?>
			
			<div id="shopping_cart">
			   <span style="float:right; font-size:18px; padding:5px; line-height:40px">

			   Welcome Guest!
			   <b style="color:yellow">Shopping Cart-</b> Total Items: <b style="color:red"><?php total_items();?></b> Total Price: <b style="color:red"> TK.<?php total_price();?></b>  <a href="cart.php" style="color:yellow">GO TO CART</a>
			   
			   
			   
			   </span>
			</div>
			
			
				<div id="products_box"><br>

		<form method="post" action="" enctype="multipart/form-data">
			<table align="center" width="800px" bgcolor="skyblue">
			
			
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
				<img src="admin_area/product_images/<?php echo $product_image;?>" width="60px" height="60px"/></td>
				<td><input type="text" size="3" name="qtyi" value=""/></td>

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
				<td><a id="button" href="checkout.php" style="color: white;padding: 5px 30px;border-radius: 4px;cursor: pointer;font-family:COMIC SANS MS;text-decoration:none">Check Out</a></td>
				
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
				</div>
			
			</div>		
			<!-------------Content area Ends here-------------->
			
		</div>
		<!-------------Main Content Ends here-------------->
		
		
		<!-------------Footer starts here-------------->
		<div id="footer">
		
			<h2 style="text-align:center; padding-top:30px;">&copy; 2016 by mahbubhabib.com</h2>
		
		</div>
		<!-------------Footer Ends here-------------->
		</div><!--------------Main Container Ends here-------------->	
		</body>
		</html>