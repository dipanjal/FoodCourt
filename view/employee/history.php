<style type="text/css">
#contents{
			padding-top: 50px;
		}
</style>

<?php
	include 'bar.php';
	include '../../db/dbcon.php';

	echo "
	<div id='contents'>
		<table border='1' cellspacing='0' cellpadding='20' align='center'>
			<tr>
				<td colspan='6' align='center'><h2>HISTORY</h2></td>
			</tr>
			<tr>
				<td>PRODUCT ID</td>
				<td>USER</td>
				<td>ITEM</td>
				<td>Quantity</td>
				<td>TOTAL PRICE</td>
				<td>TIME</td>
			</tr>
	</div>		
		";

		$getdatafromstore = "SELECT * FROM history";
		$tableshow = mysqli_query($con, $getdatafromstore);

		if ($tableshow) 
		{

			while($row = mysqli_fetch_assoc($tableshow))
			{
				echo "
				<tr>
					<td> $row[pid]</td>
					<td> $row[username]</td>
					<td> $row[productname]</td>
					<td> $row[quantity]</td>
					<td> $row[totalprice]</td>
					<td> $row[dtime]</td>
				</tr>";
			}
			
		}
  ?>

