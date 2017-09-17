<?php 
if(isset($_REQUEST['eid']) && !empty($_REQUEST['eid']))
{
	include '../../db/dbcon.php';
	//echo "<pre>";
	$eid=$_REQUEST['eid'];
	$delete="DELETE FROM cart WHERE id='$eid'";
	$result=mysqli_query($con, $delete);
	if ($result) 
	{
		echo "REMOVED SUCCESSFULLY";
	}
	else 
	{
		echo "DID NOT REMOVE";
	}
} 



?>