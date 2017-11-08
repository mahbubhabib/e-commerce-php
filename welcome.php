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
<h1>PROFILE</h1>


<?php

	$sql = "SELECT * FROM user_info WHERE Email='".$_SESSION["user"]. "'";
    $query = mysqli_query(get_db_connection(), $sql);

	while($data = mysqli_fetch_assoc($query)){	
	$first_name=$data['Firstname'];
	$last_name=$data['Lastname'];
	$phone=$data['Phone'];
	$email=$data['Email'];
	$add=$data['Address'];
    echo '<table>

                     <tr>
                       <td><b><span>First Name:</span></b></td>
                       <td align="center">'.$first_name.'</td>
                     </tr>
					 
					 <tr>
                       <td><b><span>Last Name:</span></b></td>
                       <td align="center">'.$last_name.'</td>
                     </tr>
					 <tr>
                       <td><b><span>Phone:</span></b></td>
                       <td align="center">'.$phone.'</td>
                     </tr>
					 <tr>
                       <td><b><span>Email:</span></b></td>
                       <td align="center">'.$email.'</td>
                     </tr>
					  <tr>
                       <td><b><span>Address:</span></b></td>
                       <td align="center">'.$add.'</td>
                     </tr>
					 </tr>';
	}
	echo ' </table>';
	
?>


	
	</body>
</html>