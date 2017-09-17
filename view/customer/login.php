<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	    width: 200px;
	    height: 200px;    
	}
</style>
	<title>Login</title>
	<script>
		function fieldchecker()
		{

			var x=document.getElementById("username");
			var y=document.getElementById("password");

			if (x.value == "" || y.value == "") 
			{
				alert("please insert your username and password properly");
				return false;
			}
		}
	</script>
</head>
	<body id="Background">
		<form onsubmit="return fieldchecker()" method="POST">
			<center>
				<fieldset id="Corners" style="width: 20%">
					<h2 align="center">Customer Login</h2>

					<input type="text" name="username" id="username" placeholder="username"><br><br>
					<input type="password" name="password" id="password" placeholder="password"><br><br>
					<input type="submit" name="login" value="Login"><br><br>
					<a href="signup.php">Signup</a>

				</fieldset><br>
				<a href="../index.php">Back</a>	
			</center>
		</form>
	</body>
</html>

<?php

session_start();
if(isset($_SESSION['customer_login']))
{
	header("location:showproduct.php");
}
else
{

}

if ($_SERVER['REQUEST_METHOD']=="POST")
{
	include '../../db/dbcon.php';
	if(trim($_POST['username'])=="" || trim($_POST['password'])=="")
	{
		die('Fields Can not be empty');
	}
	else
	{
		$userName=trim($_POST['username']);	
		$pass=trim($_POST['password']);

		$query="SELECT * FROM customerlogindb WHERE username='".$userName."' and password='".$pass."'";
		$result=mysqli_query($con,$query);
		
		if($result)
		{
			//$rowData=mysqli_fetch_array($result,MYSQLI_ASSOC);

			
			if($rowData=mysqli_fetch_assoc($result))
			{
				//echo "<pre>";
				//var_dump($rowData);
				echo "Login Success : ".$rowData['username'];
				$_SESSION['customer_login']=$rowData['username']; //sessting a session variable
				header("location:showproduct.php");
			}
			else
			{
				echo "<font color='red'><h1 align='center'>Wrong Credential</h1></font>";
			}
			//echo "Good To Go";
		}
		else
		{
			echo "DB Error";
		}
	}
	//echo "successful";
}
?>