<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
	
#Background
	{
		background-image: url("1.jpg");
		background-repeat: no-repeat;
		background-position: center;
	}

#Corners 
	{
	    border-radius: 25px;
	    border: 2px solid #73AD21;
	    padding: 20px; 
	    width: 200px;
	    height: 150px;    
	}
#Buttons
	{
	    border-radius: 15px;
	    border: 2px solid #73AD21;
	    padding: 5px; 
	    width: 100px;
	    height: 50px;
	    font-size: 18px;    
	}
#Buttons:hover
{
	background-color: white;
	cursor: pointer;
	color: #73AD21;
}
</style>
</head>
	<body id="Background" >
		<form method="post">
			<center>
				<fieldset id="Corners" style="width: 30%">
					<h1 align="center">Who Are You?</h1>
					<input id="Buttons" type="submit" name="customer" value="Customer">
					<input id="Buttons" type="submit" name="employee" value="Employee">
				</fieldset>
			</center>
		</form>
	</body>
</html>
<?php

if($_SERVER['REQUEST_METHOD']=="POST")
{
	if(isset($_POST['customer']))
	{
		header("location:customer/login.php");
		//echo "CUSTOMER";
	}
	else
	{
		header("location:employee/login.php");
		//echo "EMPLOYEE";
	}
	//echo "POST";

	//echo "<pre>";
	//var_dump($GLOBALS);
}

?>