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
<td align="right"> <input type="text" placeholder="search.." onkeyup="Request(this.value)">

<?php cart();?>
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
	
					    <?php getpro(); ?>
					
					<?php getCatpro(); ?>
					
					<?php getBrandpro(); ?>
					

		
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

<script>
    $(document).ready(function(){
        $('#search').keyup(function(){
                var search = $(this).val();
                if(search != ''){
                $.ajax({
                         url:"user/search.php",
                         method:"post",
                         data:{search:search},
                         dataType:"text",
                         success:function(data){
                         $('#products').html(data);
                         }
                	});
                   } else {
                	window.location.reload();
                }

                });
            });	
</script>