<?php
	session_start();
	
	if(!$_SESSION['user'])
	{
		header('Location: login.php');
	}
?>
<!Doctype html>
<html>
	<head>
		<title>User Dashboard</title>
		
		<script src = "login.js"></script>
	</head>
	<body>
	
          <?php include("functions/functions.php"); ?>



<a href="welcome.php">Profile</a>
<a href="order.php">Order</a>
<a href="logout.php">logout</a>
<h1>Order</h1>


<?php

	$sql = "SELECT * FROM user_info WHERE Email='".$_SESSION["user"]. "'";
    $query = mysqli_query(get_db_connection(), $sql);

	while($data = mysqli_fetch_assoc($query)){	
	$first_name=$data['Firstname'];
	$last_name=$data['Lastname'];
	$phone=$data['Phone'];
	$email=$data['Email'];
	$add=$data['Address'];
	}
	
?>

<form method="post" action="order.php">
FULL NAME:
<input type="text" name="Fname" value="<?php echo $first_name."&nbsp;".$last_name; ?>"></input></br></br>
PHONE:
<input type="text" name="phone" value="<?php echo $phone; ?>"></input></br></br>
ADDRESS:
<input type="text" name="address" value="<?php echo $add; ?>"></input></br></br>
QUANTITY:
<input type="text" name="quantity" value="<?php total_items(); ?>"></input></br></br><?php echo @$_GET['qty'];?>
TOTAL PRICE:
<input type="text" name="tprice" value="<?php total_price(); ?>"></input></br></br>

<input type = "submit" name = "send" value = "Send">
</form>

	
	</body>
</html>

<?php
if(isset($_POST['send']))
	{
    $fullname = $_POST['Fname'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$quantity = $_POST['quantity'];
	$totalprice = $_POST['tprice'];
	
	if ($quantity=='' ) {
		  echo "<script>window.open('order.php?qty=No product add','_self')</script>";
	}
	
	$query1 = "INSERT INTO order(FullName,Phone,Address,Quantity,TotalPrice) 
		      VALUES('$fullname','$phone','$address','$quantity','$totalprice')";
	$result=mysqli_query(get_db_connection(), $query1);
	if($result==TRUE){
    echo "<script>alert('Successfully ORDER!')</script>";
	}
	else
	{
		echo "<script>alert('ORDER FAILED!')</script>";
	}
	
	}
	?>