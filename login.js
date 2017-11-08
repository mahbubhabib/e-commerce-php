function userCheck()
{
	var username = document.forms["loginForm"]["user"].value;
	
	if(username == null || username == "")
	{
		document.getElementById("userErr").innerHTML = "Username is required";
	}
	else
	{
		document.getElementById("userErr").innerHTML = "";
	}
}

function userPassCheck()
{
	var pw = document.forms["loginForm"]["userpass"].value;
	
	if(pw == null || pw == "")
	{
		document.getElementById("loginPassErr").innerHTML = "Password is required";
	}
	else
	{
		document.getElementById("loginPassErr").innerHTML = "";
	}
}

function loginCheck()
{
	var username = document["loginForm"]["user"].value;
	var pw = document["loginForm"]["userpass"].value;
	var flag = false;
	
	if(username == null || username == "" || pw == null || pw == "")
	{
		if(username.length < 1)
			document.getElementById("userErr").innerHTML = "Username is required";
		if(pw.length < 1)
			document.getElementById("loginPassErr").innerHTML = "Password is required";
		
	}
	else
	{
		flag = true;
	}
	
	return flag;
}

function submitErr()
{
	document.getElementById("submitErr").innerHTML = "Incorrect username and password";
}
