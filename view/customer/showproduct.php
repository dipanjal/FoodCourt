<?php 
	//session_start();
	include 'check-customer-session.php';
 	include '../../db/dbcon.php';
 	$query= "SELECT id, productname, price, stock FROM availableproducts";
 	$result=mysqli_query($con, $query);
 	$productList=array();
 	if ($result) 
 	{
 		$i=0;
 		while ($row= mysqli_fetch_assoc($result)) 
 		{
 			$productList[$i]=$row;
 			$i++;
 			
 		}	 	
 	}

 	/*echo "<pre>";
 	var_dump($productList);*/

 	$_SESSION['productList']=$productList;
 	if(count($productList)>0)
 	{
 		foreach ($productList as $row) {
 			//echo "<pre>";
 			//var_dump($product);
 			//echo "-----------------------<br>";


 			$id = $row['id'];
 			$productname = $row['productname'];
 			$price = $row['price'];
 			$stock = $row['stock'];
 			echo "<center>";

 			echo "<h3><b>$productname</b></h3>";
 			echo "$price Taka </br>";

 			if ($stock>0) 
 			{
 				echo "<span style='color: green'> $stock Available</span><br/>";
 				echo "<a href='addtocart.php?pid=$id'>Add to Cart</a><br/>";
 				echo "............................</br>";
 			}
 			else
 			{
 				echo "<span style='color: red'> SOLD OUT</span><br/>";
 				echo "............................</br>";
 			}
 		}
 		echo "<center><a href=cart.php>View Cart</a></center>";
 		echo "<center><a href=logout.php>Logout</a></center>";
 	}
 ?>