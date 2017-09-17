<html>
<head>
<style>
#Background
	{
		background-image: url("key.jpg");
		background-repeat: no-repeat;
		background-position: bottom;
	}
#Corners 
	{
	    border-radius: 25px;
	    border: 2px solid #73AD21;
	    padding: 20px; 
	    width: 300px;
	    height: 330px;    
	}

</style>
	<title>Customer Sign up</title>
	<script type="text/javascript">
		var namePat=/^(([A-z]+[.]?)+ ([A-z]+[.]?)+)*$/g;
		var emailPat=/^[a-zA-Z0-9]+([._-][a-zA-Z0-9]+)?@[a-zA-Z0-9]{2,50}([.][a-z]{2,5})+$/g;
		var numPat=/^([+]88)?01[6789][0-9]{8}$/g;
		var userNamePat=/^([A-z0-9]{5,8})$/g;
		var passwordPat=/[A-Za-z0-9]{4,}/g;


		function validate()
		{
			var fullName=document.getElementById("fullName");
			if (fullName.value=="")
			{
				alert("Name can not be left empty");
			}
			else
			{
				if(!(fullName.value.match(namePat)))
				{
					alert("Wrong name format, Example is given in the box");
					fullName.value="";
					fullName.placeholder="Sakib khan";
					return false;
				}
				else 
					{
						var email=document.getElementById("email");
						if(email.value=="")
						{
							alert("Email address Is Necessary");
						}
						else
						{
							if (!(email.value.match(emailPat))) 
							{
								alert("Wrong Email format");
								email.value="";
								email.placeholder="name@domain.com";
								return false;
							}
							else
							{
								var number=document.getElementById("mobile");
								if (number.value=="")
								{
									alert("Number Can not be left empty");
								}
								else
								{
									if(!(number.value.match(numPat)))
									{
										alert("Wrong number format")
										number.value="";
										number.placeholder="01*********";
										return false;
									}
									else
									{
										var userName=document.getElementById("username");
										if (userName.value=="")
										{
											alert("Username is necesary");
										}
										else
										{
											if (!(userName.value.match(userNamePat)))
											{
												alert("User name must contain 5-8 character");
												userName.value="";
												userName.placeholder="john123";
												return false;
											}
											else
											{
												var password=document.getElementById("newpass");
												if (password.value=="")
												{
													alert("password can't be left empty");
												}
												else
												{
													if (!(password.value.match(passwordPat))) 
												{
													alert("Password must contain minimum four characters!!");
													password.value="";
													return false;
												}
												else
												{
													var retpass=document.getElementById("retpass");
													if (retpass.value=="") 
													{
														alert("You must must enter password twice");
													}
													if (!(retpass.value.match(password.value))) 
													{
														alert("Password does not match!!");
														password.value="";
														retpass.value="";
														return false
													}
													else
													{
														return true;
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}



	</script>
</head>
<body>
<form onsubmit="return validate()" method="post">
	<center>
		<fieldset id="Corners" style="width: 20%">
			<h3 align="center">Sign up</h3>
			<input type="text" name="fullname" id="fullName" placeholder="Your full name" title="ex: Jhon Doe"><br><br>
			<input type="text" name="email" id="email" placeholder="Your email address" title="example@sample.com"><br><br>
			<input type="text" name="mobile" id="mobile" placeholder="Your phone number" title="ex: 01644775577"><br><br>
			<input type="text" name="username" id="username" placeholder="Username" title="ex: john123"><br><br>
			<input type="password" name="newpass" id="newpass" placeholder="New password"><br><br>
			<input type="password" name="retpass" id="retpass" placeholder="Retype password"><br><br>
			<input type="submit" name="signup" value="Create Account"><br><br>
		</fieldset><br>
		<a href="login.php">Back</a>
	</center>
</form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD']=="POST")
{
	include '../../db/dbcon.php';
	if(trim($_POST['fullname'])=="" || trim($_POST['email'])==""||trim('number')==""||trim('username')==""||trim('password')==""||trim('retpass')=="")
	{
		die('Fields Can not be empty');
	}
	else
	{
		$fullname=trim($_POST['fullname']);
		$email=trim($_POST['email']);
		$number=trim($_POST['mobile']);
		$username=trim($_POST['username']);
		$password=trim($_POST['newpass']);
		

		//$query="INSERT INTO (fullname,email,phone,username,password) VALUES ('prottay', 'prottay@gmail', '011', 'pro', '1234')";
		$querytoinfo="INSERT INTO customerinfodb (name, email, phone, username, password) VALUES ('".$fullname."', '".$email."', '".$number."', '".$username."', '".$password."')";
		$querytologin="INSERT INTO customerlogindb (username, password) VALUES ('".$username."', '".$password."')";
		$querycheck="SELECT * FROM customerlogindb WHERE username='".$username."'";
		
		//var_dump($query1);
		$checkinfo=mysqli_query($con, $querycheck);

		//$insert=mysqli_fetch_assoc($con, $query);
		

		if(mysqli_num_rows($checkinfo)>0)
		{
			echo "<font color='red'><h1 align='center'>You are a member already, Please visit the shop kindly</h1></font>";
		}
		
		else
		{
			$inserttoinfo=mysqli_query($con, $querytoinfo);
			$inserttologin=mysqli_query($con, $querytologin);
			if ($inserttoinfo) 
				{
					
				 	if ($inserttologin) 
				 	{
				 		echo "<font color='red'><h1 align='center'>Your Registration has been completed</h1></font>";
				 	}
				}
				else
				{
					echo "Not Inserted In Info DB";
				}	 
		}
		
		//mysqli_fetch_assoc($insert); 

	}
}

?>