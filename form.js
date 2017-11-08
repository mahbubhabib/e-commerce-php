
		    function load(url,cfunction)
			{
				var xhttp;
				if(window.XMLHttpRequest)
				{
					xhttp=new XMLHttpRequest();
				}
				else
				{
					xhttp=new ActiveXObject("Microsoft.XMLHttp");
				}
				xhttp.onreadystatechange=function()
				{
					if (this.readyState==4 && this.status==200 )
					{
						cfunction(this);
					}
					
				};
				xhttp.open("POST",url,true);
				xhttp.send();
				
			}
			function myfunction(xhttp)
			{
				document.getElementById("change").innerHTML=xhttp.responseText;
			}
			
			
			
			
			
			function validate()
		   {
			   var fn=document.forms["myform"]["fname"].value;
			   var ln=document.forms["myform"]["lname"].value;
			   var phn=document.forms["myform"]["phone"].value;
			   var mail=document.forms["myform"]["email"].value;
			   var pass=document.forms["myform"]["password"].value;
			   
			   var conpass=document.forms["myform"]["confirmpassword"].value;
			   var add=document.forms["myform"]["address"].value;
			   var flag = false;
			   
			   if(fn == null || fn == "" || ln == null || ln == "" || phn==null || phn == "" || mail == null || mail == "" || pass == null || pass == "" || conpass == null || conpass == "" || add == null || add == "")
			   {
				   if(fn.length < 1)
				   
					   document.getElementById("ferr").innerHTML = "First name is empty";
				   
				   if(ln.length < 1)
				   
					   document.getElementById("lerr").innerHTML = "Last Name is Empty";
				   
				   if(phn.length < 1)
				   
					   document.getElementById("perr").innerHTML="Phone number is empty";
				   
				   if(mail.length < 1)
				   
					   document.getElementById("eerr").innerHTML="Mail Is empty";
				   
				   if(pass.length < 1)
				   
					   document.getElementById("err").innerHTML="Password is empty";
				   
				   if(conpass.length < 1)
				   
					   document.getElementById("cerr").innerHTML="Confirm password is empty";
					   
				   if(add.length < 1)
				   
					   document.getElementById("aerr").innerHTML="Address is empty";
				   
			   }
			   else
			   {
				   if(pass.length > 6 && pass == conpass)
					   flag = true;
				   if(pass != conpass)
				   
					   document.getElementById("cerr").innerHTML = "password didn't matched";
				   
				   var phnmatch = /^[0-9]\d{10}$/;
				   
				 if(phn.length > 0)
		    {
				 if(phn.match(phnmatch))
				 {
					 document.getElementById("perr").innerHTML= "ok";
				 }
				 else
				 {
					 document.getElementById("perr").innerHTML= "***Not Valid [enter 11 digit]";
					 flag=false;
			     }
			 }
			 else
			 {
				 flag=false;
				// document.getElementById("perr").innerHTML="phn number is empty";
		     }
			 

				 var at= mail.indexOf("@");
				 var dot= mail.lastIndexOf(".");
				 if(at < 1 || dot < at + 2 || dot + 2 >= mail.length)
				 {
				   document.getElementById("eerr").innerHTML="Not VAlid";
				   flag=false;
			     }
				 else
				 
					 document.getElementById("eerr").innerHTML="ok";
				 
			 
			  }
			 return flag;
			 }
			   
			   
	
		   
		   
		   
		   
         function checklength()
		   { 
		       var pass=document.forms["myform"]["password"].value;
			  var conpass=document.forms["myform"]["confirmpassword"].value;
		       flag=true;
		       if(pass.length>6 && pass.length<11)
		   {
				 document.getElementById("err").innerHTML="ok";
		   }else{
			   flag=false;
			   document.getElementById("err").innerHTML="Password length must be 7-10 digits";
			      
			    return flag;
				 
				 
		    }		
		 }

		 
         function fncheack()
		 {
			  var fn=document.forms["myform"]["fname"].value;
			   if(fn.length>1)
			 {
				 document.getElementById("ferr").innerHTML="ok";
			 }else{
				 document.getElementById("ferr").innerHTML="Error";
				 }
		 }
				 
				 
				 
				 
		 function lncheack()
		    {
			  ln=document.forms["myform"]["lname"].value;
			  if(ln.length>1)
			 {
				 document.getElementById("lerr").innerHTML="ok";
			 }else{
				 document.getElementById("lerr").innerHTML="Error";
				  }
			 }
			 
			 
			  function phncheack()
		    {
			  var phn=document.forms["myform"]["phone"].value;
			  var phnmatch= /^[0-9]\d{10}$/;
			  
			  
			  if(phn.length>0)
			 {
				 if(phn.match (phnmatch))
				 {
					 document.getElementById("perr").innerHTML="ok";
				 }
				 else
				 {
					 document.getElementById("perr").innerHTML="***Not Valid [enter 11 digit]";
			     }
			 }
			 else
			 {
				 document.getElementById("perr").innerHTML="phn number is empty";
		     }
			 
			 }
			 
			   function mailcheack()
		    {
			  var mail=document.forms["myform"]["email"].value;
			  
			  if(mail.length > 0)
			 {
				 var at= mail.indexOf("@");
				 var dot= mail.lastIndexOf(".");
				 if(at < 1 || dot < at + 2 || dot + 2 >= mail.length)
				 {
				   document.getElementById("eerr").innerHTML="Not VAlid";
			     }
				 else
				 {
					 document.getElementById("eerr").innerHTML="ok";
				 }
			 }
			 else
			 {
				 document.getElementById("eerr").innerHTML="empty";
			 }
			 }
		 
		 
		   function passmatch(){
			var pass=document.forms["myform"]["password"].value;
			  var conpass=document.forms["myform"]["confirmpassword"].value;
			   
			   if(pass==conpass)
			   {
				   document.getElementById("cerr").innerHTML="Password Matched";
			   }else{
				   document.getElementById("cerr").innerHTML="password not matched";
			   }
			   
		function addcheack()
		 {
			  var add=document.forms["myform"]["address"].value;
			   if(add.length>1)
			 {
				 document.getElementById("aerr").innerHTML="ok";
			 }else{
				 document.getElementById("aerr").innerHTML="Error";
				 }
		 }
			
		}
		   
		