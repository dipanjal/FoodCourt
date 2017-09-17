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
		//var productname = document.getElementById("productname");
		//alert("productname");
		var price = document.getElementById("price");
		//var quantity = document.getElementById("stock");

		
		if (price.value == "" ) 
			{
				alert("Price Must Be Filled");
				return false;
			}
			else
			{
				return true;
			}			
	}
</script>

<html>
<body>
<form onsubmit="return emptychecker()" method="post">
	<center>
	<div id='contents'>
		<fieldset id="Corners" style="width: 20%">
			<h3 align="center">UPDATE</h3>
			
			<input type="text" name="price" id="price" placeholder="Price of the item" ><br><br>
			<input type="text" name="stock" id="stock" placeholder="Quantity of the item"><br><br>
			<input type="submit" name="store" value="Update Product"><br><br>
		</center>	
		</fieldset><br>
	</div>
</form>

</body>
</html>

<?php 
	if(isset($_REQUEST['pid']) && !empty($_REQUEST['pid'])) 
	{
		include '../../db/dbcon.php';

		$pid=urldecode($_REQUEST['pid']);

		$query="SELECT * FROM availableproducts WHERE id= '".$pid."' ";
		$result=mysqli_query($con,$query);

		if(mysqli_num_rows($result)>0)
		{
			if($row=mysqli_fetch_assoc($result))
			{
				echo "<center><h2>".$row['productname']."<h2>";
				echo "<center><h2> PREVIOUS PRICE : ".$row['price']."<br>";
			}
		}

		if ($_SERVER['REQUEST_METHOD']=="POST")
		{
			$price = trim($_POST['price']);

			if(empty(trim($_POST['stock']))) //IF QUANTITY IN EMPTY THEN 
			{
				echo "MAKING 0<br>";
				$store = 0; //SET QUANTITY = 0
			}
			else
			{
				$store=trim($_POST['stock']);
			}

			//echo "PRODUCT ID : ".$pid."<br>";
			//echo "PRODUCT PRICE : ".$price."<br>";
			//echo "PRODUCT QUANTITY : ".$store."<br>";
			

			$query="SELECT * FROM availableproducts WHERE id= '".$pid."' ";
			$result=mysqli_query($con,$query);
			if(mysqli_num_rows($result)>0)
			{

				if($row=mysqli_fetch_assoc($result))
				{

					//echo "<pre>";
					//var_dump($row);
					$finalStock=$row['stock']+$store;
					$query="UPDATE availableproducts SET stock='".$finalStock."', price='".$price."' WHERE id='".$pid."' ";
					$result=mysqli_query($con,$query);
					if($result)
					{
						echo "<pre>";
						echo '<b>UPDATED </b>'.$row['productname']."<br>";
						header('location:mystore.php');
						//var_dump($row);
					}
				}
				else
				{
					echo "NOT UPDATED";
				}
			}
			else
			{
				echo "NO PRODUCT FOUND";
			}

		
		
		//$time = new DateTime('now', new DateTimezone('Asia/Dhaka'));

		
		}
	}
	else
	{
		//echo "NO PRODUCT SELECTED";
		header('location:mystore.php');
	}
?>

