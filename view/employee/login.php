<html>
<head>
	<title>Login</title></head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
#Corners 
	{
	    border-radius: 25px;
	    border: 2px solid #73AD21;
	    padding: 20px; 
	    width: 200px;
	    height: 200px;    
	}
#Buttons
	{
	    border-radius: 15px;
	    border: 2px solid #73AD21;
	    padding: 5px; 
	    width: 80px;
	    height: 30px;
	    font-size: 15px;    
	}
#Buttons:hover
{
	background-color: white;
	cursor: pointer;
	color: #73AD21;
}

</style>
	<script>
		function fieldchecker()
		{

			var x=document.getElementById("email");
			var y=document.getElementById("password");

			if (x.value == "" || y.value == "") 
			{
				alert("please insert your email and password properly");
				return false;
			}
		}
	</script>
</head>
	<body>
		<form onsubmit="return fieldchecker()" method="POST">
			<center>
				<fieldset id="Corners" style="width: 20%">
					<h2 align="center">Login</h2>

					<input type="text" name="email" id="email" placeholder="email"><br><br>
					<input type="password" name="password" id="password" placeholder="password"><br><br>
					<input id="Buttons" type="submit" name="login" value="Login"><br><br>
					
				</fieldset><br>
			<a href="../index.php">Back</a>	
			</center>
		</form>
	</body>
</html>
<?php

session_start();
if(isset($_SESSION['employee_login']))
{
	header("location:admin.php");
}
else
{

}

if ($_SERVER['REQUEST_METHOD']=="POST")
{
	include '../../db/dbcon.php';
	if(trim($_POST['email'])=="" || trim($_POST['password'])=="")
	{
		die('Fields can not be empty');
	}
	else
	{
		$email=trim($_POST['email']);	
		$pass=trim($_POST['password']);

		$query="SELECT * FROM adminlogindb WHERE email='".$email."' and password='".$pass."'";
		$result=mysqli_query($con,$query);
		
		if($result)
		{
			//$rowData=mysqli_fetch_array($result,MYSQLI_ASSOC);

			$rowData=mysqli_fetch_assoc($result);
			if($rowData)
			{
				//echo "<pre>";
				//var_dump($rowData);
				echo "Login Success : ".$rowData['email'];
				$_SESSION['employee_login']=$rowData['email']; //sessting a session variable
				header("location:admin.php");
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