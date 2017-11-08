<?php include("functions/dbcon.php"); ?>
<html>
	<head>
		<title>Inserting Product</title>
		
     <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
     <script>tinymce.init({ selector:'textarea' });</script>
	</head>

<body bgcolor="skyblue">


	<form method="post" action="insert_product.php" enctype="multipart/form-data">
			<table align="center" width="800px" border="2" bgcolor="#00B54F">
			
			<tr>
				<td colspan="2" align="center"><h2>Insert New post here</h2></td>
			</tr>
			
			<tr>
				<td align="center"><b>Product Title:</b></td>
				<td><input type="text" name="product_title" required/></td>
			</tr>
			<tr>
				<td align="center"><b>Product Catagory:</b></td>
				<td>
								
					<select name="product_cat">
					
						<option>Select a Catagory</option>
						<?php
						
								$get_cats = "select *from catagories";
								$run_cats= mysqli_query(get_db_connection(), $get_cats);
								
								while($row_cats=mysqli_fetch_assoc($run_cats))
								{
								   $cat_id=$row_cats['cat_id'];
								   $cat_title=$row_cats['cat_title'];
								   
								   echo "<option value='$cat_id'>$cat_title</option>";
								}
					?>
					</select>
				
				
				</td>
			</tr>
			<tr>
				<td align="center"><b>Product Brand:</b></td>
				<td>
				   <select name="product_brand" >
					<option>Select a Brand</option>
						<?php
						
								$get_brands = "select *from brands";
								$run_brands= mysqli_query(get_db_connection(), $get_brands);
								
								while($row_brands=mysqli_fetch_assoc($run_brands))
								{
								   $brand_id=$row_brands['brand_id'];
								   $brand_title=$row_brands['brand_title'];
								   
								   echo "<option value='$brand_id'>$brand_title</option>";
								}
					?>
					</select>
				
				</td>
			</tr>
			<tr>
				<td align="center"><b>Product Image:</b></td>
				<td><input type="file" name="product_image" required/></td>
			</tr>
			<tr>
				<td align="center"><b>Product Price:</b></td>
				<td><input type="text" name="product_price" required/></td>
			</tr>
			<tr>
				<td align="center"><b>Product Description:</b></td>
				<td><textarea name="product_desc" cols="20" rows="10"></textarea></td>
			</tr>

			<tr>
				<td colspan="2" align="center"><input type="submit" name="insert_post" value="Insert Now"/></td>
			</tr>
			</table>
	</form>





</body>
</html>

<?php
 
	if(isset($_POST['insert_post']))
	{
		$product_title=$_POST['product_title'];
		$product_cat=$_POST['product_cat'];
		$product_brand=$_POST['product_brand'];
		$product_price=$_POST['product_price'];
		$product_desc=$_POST['product_desc'];
		
		$product_image=$_FILES['product_image']['name'];
		$product_image_tmp=$_FILES['product_image']['tmp_name'];
		
		move_uploaded_file($product_image_tmp,"product_images/$product_image");
		
		$insert_product="Insert into products
		(product_cat,product_brand,product_title,product_price,product_desc,product_image)
		values('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image')";
		
		$insert_pro= mysqli_query(get_db_connection(), $insert_product);
		
		if($insert_pro)
		{
			echo "<script>alert('Successfully Product Inserted!!')</script>";
			echo "<script>window.open('insert_product.php','_self')</script>";
		}
		
		
	}
	
?>