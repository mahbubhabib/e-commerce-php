<!DOCTYPE html>
<html>
     <head>
	       <title>Form</title>
		    <script src="form.js"></script>
		 
	 </head>
	 <body>
	 
<a href="index.php">Home</a>
	               <h1>Registration Form</h1>
	           <form name = "myform" action="inputdb.php" onsubmit = "return validate();" method = "post" >
			   
		        First Name <br>
				<input type="text" onkeyup="fncheack()" name="fname" >
				<span id="ferr"> </span><br>
				
				Last Name<br>
				<input type="text" onkeyup="lncheack()" name="lname">
				<span id="lerr"> </span><br>
				
				Phone<br>
				<input type="text" onkeyup="phncheack()" name="phone">
				<span id="perr"> </span><br>
				
				Email<br>
				<input type="text" onkeyup="mailcheack()" name="email">
				<span id="eerr"> </span><br>
				
				Password<br>
				<input type="password" onkeyup="checklength()" name="password">
				<span id="err"> </span><br>
				
				Confirm Password<br>
				<input type="password" onkeyup="passmatch()" name="confirmpassword">
				<span id="cerr"> </span><br>
				<br>
				Address<br>
				<input type="text" onkeyup="addcheack()" name="address">
				<span id="aerr"> </span><br><br>
				<input type="submit" value="submit">
		   </form>
	 </body>
</html>