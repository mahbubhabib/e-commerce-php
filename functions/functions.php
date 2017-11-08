<?php include("dbcon.php"); ?>

<?php

//getting the user IP address
function getIp() {

    $ip = $_SERVER['REMOTE_ADDR'];

 

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

        $ip = $_SERVER['HTTP_CLIENT_IP'];

    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

    }

 

    return $ip;

}

//creating the shopping cart
function cart()
{
	if(isset($_GET['add_cart']))
	{
		$ip=getIp();
		$pro_id=$_GET['add_cart'];
		
		$check_pro="select *from cart where ip_add='$ip' and p_id='$pro_id'";
		
		$run_check= mysqli_query(get_db_connection(), $check_pro);
		
		if(mysqli_num_rows($run_check)>0)
		{
			echo "";
		}
		else
		{
			
			$insert_pro="insert into cart(p_id,ip_add,qty) values ('$pro_id','$ip','1')";
			
			$run_pro= mysqli_query(get_db_connection(), $insert_pro);
			
			echo "<script>window.open('index.php','_self')</script>";
		}
	}
}

//getting the total added items
function total_items()
{
	if(isset($_GET['add_cart']))
	{
		$ip=getIp();
		
		$get_items="select *from cart where ip_add='$ip'";
		
		$run_items= mysqli_query(get_db_connection(), $get_items);
		
		$count_items=mysqli_num_rows($run_items);
	}
		else{
			$ip=getIp();
		
		$get_items="select *from cart where ip_add='$ip'";
		
		$run_items= mysqli_query(get_db_connection(), $get_items);
		
		$count_items=mysqli_num_rows($run_items);
		}
		
		echo $count_items;
	
}

//getting the total added price in the cart
function total_price()
{
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
				   $values=array_sum($product_price);
				   
				   $total +=$values;
				}
		}
		
		echo $total;
	
}

//getting the catagories
	function getCats(){
		$get_cats = "select *from catagories";
		$run_cats= mysqli_query(get_db_connection(), $get_cats);
		
		while($row_cats=mysqli_fetch_assoc($run_cats))
		{
		   $cat_id=$row_cats['cat_id'];
		   $cat_title=$row_cats['cat_title'];
		   
		   echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
		}
	}
	
	
//getting the brands	
function getBrands(){
		$get_brands = "select *from brands";
		$run_brands= mysqli_query(get_db_connection(), $get_brands);
		
		while($row_brands=mysqli_fetch_assoc($run_brands))
		{
		   $brand_id=$row_brands['brand_id'];
		   $brand_title=$row_brands['brand_title'];
		   
		   echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
		}
	}


	
	
//displaying latest product	
function getpro(){
	
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
		$get_pro = "select *from products order by RAND() LIMIT 0,3";
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
				<a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add To Cart</button></a>
				
			
			</div>
		   
		   ";
		}
		}
	}
	}
	
//getting catagories menu item	
function getCatpro(){
	
	if(isset($_GET['cat'])){
		
		$cat_id=$_GET['cat'];

		$get_cat_pro = "select *from products where product_cat='$cat_id'";
		$run_cat_pro= mysqli_query(get_db_connection(), $get_cat_pro);
		
		$count_rows=mysqli_num_rows($run_cat_pro);
		
		if($count_rows==0)
		{
			echo "<h1 style='color:red; font-size:80px'>NO PRODUCTS IN THIS CATAGORIES</h1>";
		}
		
		while($row_cat_pro=mysqli_fetch_assoc($run_cat_pro))
		{
		   $pro_id=$row_cat_pro['product_id'];
		   $pro_cat=$row_cat_pro['product_cat'];
		   $pro_brand=$row_cat_pro['product_brand'];
		   $pro_title=$row_cat_pro['product_title'];
		   $pro_price=$row_cat_pro['product_price'];
		   $pro_image=$row_cat_pro['product_image'];
		 
		   
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
		}
	}

//getting brands menu item	
function getBrandpro(){
	
	if(isset($_GET['brand'])){
		
		$brand_id=$_GET['brand'];

		$get_brand_pro = "select *from products where product_brand='$brand_id'";
		$run_brand_pro= mysqli_query(get_db_connection(), $get_brand_pro);
		
		$count_rows=mysqli_num_rows($run_brand_pro);
		
		if($count_rows==0)
		{
			echo "<h1 style='color:red; font-size:80px'>NO PRODUCTS IN THIS BRANDS</h1>";
		}
		
		while($row_brand_pro=mysqli_fetch_assoc($run_brand_pro))
		{
		   $pro_id=$row_brand_pro['product_id'];
		   $pro_cat=$row_brand_pro['product_cat'];
		   $pro_brand=$row_brand_pro['product_brand'];
		   $pro_title=$row_brand_pro['product_title'];
		   $pro_price=$row_brand_pro['product_price'];
		   $pro_image=$row_brand_pro['product_image'];
		 
		   
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
		}
	}

?>