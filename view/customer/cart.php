
<?php
	include 'check-customer-session.php';
	include '../../db/dbcon.php';
	$total=0;
	echo "
			<table border='1' cellspacing='0' cellpadding='20' align='center'>
				<tr>
					<td colspan='6' align='center'><h2>Product List</h2></td>
				</tr>
				<tr>
					<td>ID</td>
					<td>Product Name</td>
					<td>Price</td>
					<td>Quantity</td>
					<td>Total Price</td>
					<td>Options</td>
				</tr>
		";

	echo "<center><a href='showproduct.php'>CONTINUE SHOPPING</a>";
	$getdatafromcart ="SELECT * FROM cart";
	$tableshow = mysqli_query($con, $getdatafromcart);
	if ($tableshow) 
	{
		//echo "RUNNING";
		if (mysqli_num_rows($tableshow) > 0)
		{
			while($row = mysqli_fetch_assoc($tableshow))
			{
			echo "
				<tr>
					<td> $row[id]</td>
					<td> $row[productname]</td>
					<td> $row[price]</td>
					<td> $row[quantity]</td>
					<td> $row[totalprice]</td>
					<td><a href='addtocart.php?pid=$row[id]'>edit</a>  <a href=cart.php?eid=$row[id]>remove<a></td>
				</tr>";
				
					$total = $total + $row['totalprice'] ;
			}
	
			echo "<center><a href='addtoorder.php?aid=$row[id]'>CHECKOUT</a>";
			echo "<center><h2> TOTAL :" .$total;	
		}	
	}
	else
	{
		echo "NOT RUNNING";
	} 

?>
<?php

if(isset($_REQUEST['eid']) && !empty($_REQUEST['eid']))
{
	//echo "<pre>";
	$eid=$_REQUEST['eid'];
	$delete="DELETE FROM cart WHERE id='$eid'";
	$result=mysqli_query($con, $delete);
	if ($result) 
	{
		header('location:cart.php');
		echo "REMOVED SUCCESSFULLY";
		
	}
	else 
	{
		echo "DID NOT REMOVE";
	}
}

?>
