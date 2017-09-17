<?php
include 'bar.php';
?>

<html>
<head>
	<title>Admin</title>
</head>
	<style type=>
#contents{
			padding-top: 50px;
		}
	</style>
</html>

<?php

	include '../../db/dbcon.php';
	echo "
		<div id='contents'>
			<table border='1' cellspacing='0' cellpadding='20' align='center'>
				<tr>
					<td colspan='6' align='center'><h2>ORDERS</h2></td>
				</tr>
				<tr>
					<td>USER </td>
					<td>Product Name</td>
					<td>Quantity</td>
					<td>Total Price</td>
					<td>Options</td>
				</tr>
		</div>
		";

		$query = "SELECT * FROM ordertable";
		$result = mysqli_query($con, $query);
		if ($result) 
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$pid=$row['id'];
          		$del="admin.php?deliver=$pid";
          		var_dump($pid);
			echo "
				<tr>
					<td> $row[uid]</td>
					<td> $row[productname]</td>
					<td> $row[quantity]</td>
					<td> $row[totalprice]</td>
					<td><a href=$del>DELIVER</a></td>
				</tr>";

				 
 			}
 			if(isset($_REQUEST['deliver']))
        	if (!empty($_REQUEST['deliver'])) 
        	{
        		$pid = $_REQUEST['deliver'];

        		echo "<pre>";
        		var_dump("$pid");

        		$query = "SELECT * from ordertable WHERE id = '".$pid."'";

        		$result = mysqli_query($con, $query);
        	if($result)
			{

        		while($row=mysqli_fetch_assoc($result))
        		{
        			//$date = date_create('now');
        			$time = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        			$dtime = $time->format('Y-m-d h:i:s a');
        			//echo "<pre>";
        			//var_dump($dtime);
        			$pid = $row['id'];
        			$pname = $row['productname'];
        			$price = $row['price'];
        			$quantity = $row['quantity'];
        			$totalprice = $row['totalprice'];
        			$uid = $row['uid'];
        			echo $dtime."<br>";
        			if(isset($dtime) && !empty($dtime))
        			{
        				//echo "NOW INSERT INTO DB";

        				$query = "INSERT INTO history (pid, username, productname, quantity, totalprice, dtime) VALUES ('".$pid."', '".$uid."', '".$pname."', '".$quantity."', '".$totalprice."', '".$dtime."' )";
	        			$result1 = mysqli_query($con, $query); 

	        			$query = "DELETE from ordertable WHERE id = '".$pid."'";
	        			$result2 = mysqli_query($con, $query);

	        			if ($result1 && $result2) 
	        			{
	        				header('location:admin.php');
	        				echo "GONE TO HISTORY AND REMOVED FROM ORDER TABLE";
	        			}
	        			else
	        			{
	        				echo "NOT INSERTED";
	        			}
        			}
        			else
        			{
        				echo "ACCURE THE DATE FIRST";
        			}
        			



        		}
        	}
        		/*if ($result) 
        		{
        			echo "SELECTED FROM ORDER";
        			header('location:admin.php');
        		}
        		else
        		{
        			echo "NOT DELETED";
        		}*/
        
        	}

		}


?>