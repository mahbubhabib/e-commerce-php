<?php include("functions/functions.php"); ?>
<html>
	<head>
		<title>Search Results</title>
		
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
			
			<div id="shopping_cart">
			   <span style="float:right; font-size:18px; padding:5px; line-height:40px">

			   Welcome Guest!
			   <b style="color:yellow">Shopping Cart-</b> Total Items: Total Price: <a href="cart.php" style="color:yellow">GO TO CART</a>
			   
			   
			   
			   </span>
			</div>
			
				<div id="products_box">
							<?php
							if(isset($_GET['search'])){
								
								$search_query=$_GET['user-query'];
								
									$get_pro = "select *from products where product_keywords like '%$search_query%'";
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
											<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
											
											<p><b> Tk. $pro_price</b></p>
											<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
											<a href='index.php?pro_id=$pro_id'><button style='float:right;'> Add To Cart</button></a>
											
										
										</div>
									   
									   ";
									}
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
	
	
	
	
	
	</div>
<!--------------Main Container Ends here-------------->	
</body>
</html>