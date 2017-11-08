<?php include("functions/functions.php"); ?>
<?php
	$key = $_GET['q'];
	$query1 = "SELECT * FROM products where product_id like '%{$key}%' OR product_title like '%{$key}%' OR product_price like '%{$key}%'
	OR product_image like '%{$key}%'";
	$result=mysqli_query($conn, $query1);
if (mysqli_num_rows($connect_result)>0) {
while($row_pro = mysqli_fetch_assoc($connect_result)) 
 
{
	$pro_id=$row_pro['product_id'];
		
						   $pro_title=$row_pro['product_title'];
						   $pro_price=$row_pro['product_price'];
						   $pro_image=$row_pro['product_image'];
						
						 
						   
						   echo "
						   
							<div id='single_product'>
							
								<h3>$pro_title</h3>
								<img src='product_images/$pro_image' width='400' height='300'/>
								
								<p><b> Tk. $pro_price</b></p>
								<a href='index.php' style='float:left;'>Go Back</a>
								<a href='index.php?pro_id=$pro_id'><button style='float:right;'> Add To Cart</button></a>
								
							
							</div>
						   
						   ";
						}
						}
						?>
