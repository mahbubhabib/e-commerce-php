<?php include("functions/functions.php"); ?>
<!Doctype html>
<html>
	<head>
		<title>Confirmation</title>
		<link rel="stylesheet" type="text/css" href="design.css" />
	</head>
	<body>
		
		
		<?php
		
		$ip=getIp();
			$firstname = $_POST["fname"];
			$lastname = $_POST["lname"];
			$phone = $_POST["phone"];
			$email = $_POST["email"];
			$pass = $_POST["password"];
			$add = $_POST["address"];
			
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "webtech";
			
			$conn = new mysqli($servername,$username,$password,$dbname);
			
			if($conn->connect_error)
			{
				die("Connection failed" . $conn->connect_error);
			}
			
			$sql = "INSERT INTO user_info(customer_ip,Firstname,Lastname,Phone,Email,Password,Address) VALUES('$ip','$firstname','$lastname','$phone','$email','$pass','$add')";
			
			if($conn->query($sql) == TRUE)
			{
				echo "Your account has been created successfully. You can now login with your username and password. Your user id is: ";
				header("Location:login.php");
				$sql2 = "SELECT Email FROM user_info";
				$result = $conn->query($sql2);
				if ($result->num_rows > 0) 
				{
					while($row = $result-> fetch_assoc()) 
					{
						if($email == $row["Email"])
							echo $row["Email"];
					}	
				}
			}
			else
			{
				echo "Error ".$sql."<br />".$conn->error;
			}
			
			$conn->close();
			
			
		?>
		
		
	</body>	
</html>