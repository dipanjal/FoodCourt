<?php
	include 'bar.php';
?>

<style>
#contents
		{
			padding-top: 100px;
		}
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
	    height: 250px;    
	}

</style>

<script>
	function emptychecker()
	{
		//alert("RUNNING");
		var productname = document.getElementById("productname");
		//alert("productname");
		var price = document.getElementById("price");
		var quantity = document.getElementById("stock");

		
		if (productname.value == "" || price.value == "" || quantity.value == "") 
			{
				alert("please fill up all the fields");
				return false;
			}			
	}
</script>

<html>
<body>
<form onsubmit="return emptychecker()" method="post">
	<center>
	<div id='contents'>
		<fieldset id="Corners" style="width: 20%">
			<h3 align="center">Add to My Storage</h3>
			<input type="text" name="productname" id="productname" placeholder="item You want to add" ><br><br>
			<input type="text" name="price" id="price" placeholder="Price of the item" ><br><br>
			<input type="text" name="stock" id="stock" placeholder="Quantity of the item"><br><br>
			<input type="submit" name="store" value="Add to my store"><br><br>
		</center>	
		</fieldset><br>
	</div>
</form>

</body>
</html>

<?php  
	if ($_SERVER['REQUEST_METHOD']=="POST")
	{
		include '../../db/dbcon.php';
		
		$productname = trim($_POST['productname']);
		$price = trim($_POST['price']);
		$store = trim($_POST['stock']);

		$query="SELECT * FROM availableproducts WHERE productname= '".$productname."' ";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)>0)
		{
			echo "ALREDAY IN STORE<br>";
			if($row=mysqli_fetch_assoc($result))
			{
				//echo "<pre>";
				//var_dump($row);
				$finalStock=$row['stock']+$store;
				$query="UPDATE availableproducts SET stock='".$finalStock."', price='".$price."' WHERE productname='".$productname."' ";
				$result=mysqli_query($con,$query);
				if($result)
				{
					echo "<pre>";
					echo '<b>UPDATED</b><br>';
					var_dump($row);
				}
			}
		}
		else
		{
			$query = "INSERT INTO availableproducts (productname, price, stock) VALUES ('".$productname."', '".$price."', '".$store."') ";
			$result = mysqli_query($con, $query);
			if ($result) 
			{
				echo "<center><h2>YOU HAVE SUCCESSFULLY ADDED A PRODUCT TO STORE!!!!";
			}
			else
			{
				echo "PROBLEM WITH INSERTION!!!";
			}
		}
		//$time = new DateTime('now', new DateTimezone('Asia/Dhaka'));

		
	}
?>

