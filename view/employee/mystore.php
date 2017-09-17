<style type="text/css">
#contents{
			padding-top: 100px;
		}
</style>
<?php  

	include 'bar.php'; 
	include '../../db/dbcon.php';

	echo "
	<div id='contents'>
		<table border='1' cellspacing='0' cellpadding='20' align='center'>
			<tr>
				<td colspan='6' align='center'><h2>Product List</h2></td>
			</tr>
			<tr>
				<td>ID</td>
				<td>Product Name</td>
				<td>Price</td>
				<td>Quantity</td>
				<td>Option</td>
			</tr>
	</div>		
		";

		$getdatafromstore = "SELECT * FROM availableproducts";
		$tableshow = mysqli_query($con, $getdatafromstore);

		if ($tableshow) 
		{

			while($row = mysqli_fetch_assoc($tableshow))
			{
				echo "
				<tr>
					<td> $row[id]</td>
					<td> $row[productname]</td>
					<td> $row[price]</td>
					<td> $row[stock]</td>
					<td><a href='updateproduct.php?pid=$row[id]' >Update</a></td>
				</tr>";
			}
			
		}



?>
