<?php  
		include 'check-customer-session.php';
		include '../../db/dbcon.php';

		$query="SELECT * FROM cart";
		$result=mysqli_query($con,$query);
		

		if($result)
		{
			while($cart=mysqli_fetch_assoc($result))
			{
				$query2="SELECT * FROM availableproducts WHERE id='".$cart['id']."' ";
				$result2=mysqli_query($con,$query2);

				$x=mysqli_fetch_assoc($result2);

				$finalStock=$x['stock']-$cart['quantity'];

				if(updateStock($cart['id'],$finalStock))
				{
					if(insertIntoOrder($cart))
					{
						$isOderPlaced=true;

					}
					else
					{
						$isOderPlaced=false;
					}
					//echo " UPDATED <br>";
				}
				else
				{
					$isOderPlaced=false;
				}
				//echo "AFTER UPDATE : ".$x['productname']." HAS QUANTITY : ".$finalStock."<br>";
				//echo"----------------------------------<br>";
			}
			if(isset($isOderPlaced)==true)
			{			
				echo "<br><br><br><br><br><br><br><br><br><br><font color='red'><h1 align='center'>THANK YOU FOR ORDERING, ENJOY YOUR WAITING TIME... :)</h1></font>";
				
			}

		}
					echo "<center><a href='logout.php'>LOG OUT</a><br><br> ";
				echo "<center><a href='showproduct.php'>CONTINUE ORDERING</a>";
		//$order = "INSERT into ordertable (id, productname, price, quantity, totalprice) SELECT id, productname, price, quantity, totalprice FROM cart WHERE id=id";

		/*$query1="SELECT stock FROM availableproducts WHERE id=id";
		$query2="SELECT quantity FROM cart WHERE id=id";
		$result1 = mysqli_query($con, $query1);
		$result2 = mysqli_query($con, $query2);

		//$result3 = $result1-$result2;

		echo "<pre>";
		var_dump()*/


		//$stockupdate = "UPDATE availableproducts SET stock=(SELECT stock FROM availableproducts WHERE id=id - SELECT quantity FROM cart WHERE id=id) WHERE id=id";
		//$result2 = mysqli_query($con, $stockupdate);
		/*$result = mysqli_query($con, $order);

		if ($result) 
		{
			$clearcart = "TRUNCATE TABLE cart";
			$tabledelete = mysqli_query($con, $clearcart);
			
		}
		else
		{
			echo "PROBLEM FACING WHEN ORDERING!!";
		}*/

function updateStock($id,$quantity)
{
	
	include '../../db/dbcon.php';
	
	
	$query="UPDATE availableproducts SET stock='".$quantity."' WHERE id='".$id."' ";
	$result=mysqli_query($con,$query);
	if($result)
	{
		//var_dump($row=mysqli_fetch_assoc($result));
		
		return true;
	}
	else
	{
		return false;
	}
}

function insertIntoOrder($cart)
{
	include '../../db/dbcon.php';

	$uid=0;
	$uid = $_SESSION['customer_login'];

	$id=$cart['id'];
	$pname=$cart['productname'];
	$price=$cart['price'];
	$quantity=$cart['quantity'];
	$totalprice=$cart['totalprice'];

	$query="INSERT INTO ordertable (id,productname,price,quantity,totalprice, uid) 
			VALUES ( '".$id."',  '".$pname."',  '".$price."',  '".$quantity."',  '".$totalprice."', '".$uid."' ) ";
	$result=mysqli_query($con,$query);
	if($result)
	{
		//echo "DATA INSERTED";
		//return true;
		$query="TRUNCATE TABLE cart";
		$result=mysqli_query($con,$query);
		if($result)
		{

			return true;
		}
		else
		{
			return false;
		}
	}
	else
	{
		return false;
	}
	//var_dump($cart);
	//echo "-------------------------<br>";
}


?>

