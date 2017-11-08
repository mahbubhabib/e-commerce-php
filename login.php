<?php
	session_start();
?>

		<?php
		$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "webtech";

					
					$conn = new mysqli($servername, $username, $password, $dbname);
					
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					} 
		?>
		
		<?php
		
			if(isset($_POST["Login"]))
			{
				
				if(!empty($_POST["user"]) && !empty($_POST["userpass"]))
				{
					
					 $sql = "SELECT * FROM user_info WHERE Email='".$_POST["user"]. "' AND Password= '" .$_POST["userpass"]."'";
                     $query = mysqli_query($conn, $sql);
					$res = mysqli_fetch_assoc($query);
					 if($res)
					 {
						 if(!empty($_POST["remember"]))
						 {
							 setcookie ("Email", $_POST["user"], time() + 200);
							 setcookie ("Password", $_POST["userpass"], time() + 200);
						 }
						 else
						 {
							 if(isset($_COOKIE["Email"]))
							 {
								 setcookie ("Email", "");
							 }
							 if(isset($_COOKIE["Password"]))
							 {
								 setcookie ("Password", "");
							 }
						 }
						 $_SESSION['user']=$_POST["user"];
						 header("Location:welcome.php");
					 }
					 else
					 {
							   echo "<script>alert('Invalid username or password!')</script>";	
					 }

				

					
				}
			}
			
		?>
<!Doctype html>
<html>
	<head>
		<title>Student Login Form</title>
		
		<script src = "login.js"></script>
	</head>
	<body>
		
<a href="index.php">Home</a>

		
		<form name = "loginForm"  action = "login.php" onsubmit = "return loginCheck();" method = "post">
			<h1>User Login Page</h1>
			
			<h3 style = "color:red"><?php if(!empty($submitErr)) echo "<center>".$submitErr . "</center><br />"; ?></h3>
			<br /><br />
			<div id = "showForm">
			Email:<br>
			<input onkeyup = "userCheck()" type = "text" name = "user" value="<?php if(isset($_COOKIE["Email"])) {echo $_COOKIE["Email"];} ?>">
			<span id = "userErr"></span>
			
			
			<br /><br />
			Password:<br>
			<input onkeyup = "userPassCheck()" type = "password" name = "userpass" value = "<?php if(isset($_COOKIE["Password"])){ echo $_COOKIE["Password"];}?>">
			<span id = "loginPassErr"></span>
			
			
			
			
			<br /><br />
			<input type = "checkbox" name = "remember" <?php if(isset($_COOKIE["Email"])){ ?> checked <?php } ?> >Remember me <br><br>
			<input type = "submit" name = "Login" value = "Login">
			
		</form>	
		<br>
		<h3>Not Registered????</h3><br>
		<a href="register.php">Registration Here</a>
		</div>

		
	</body>
</html>	