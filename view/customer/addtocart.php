<style>
#Corners 
	{
	    border-radius: 25px;
	    border: 2px solid #73AD21;
	    padding: 20px; 
	    width: 200px;
	    height: 140px;    
	}
</style>
<?php 
include 'check-customer-session.php';
if(isset($_SESSION['productList']))
{
	

	if(isset($_REQUEST['pid']) && !empty($_REQUEST['pid']))
	{	
	foreach ($_SESSION['productList'] as $product) 
	{
		
		if($product['id']==$_REQUEST['pid'])
		{
		$_SESSION['product']=$product;
		echo "<center>";
		echo "<form method='POST'>";
		echo "<fieldset style='width: 20%' id='Corners'>";
		echo "<select name='quantity'>"; //DROPDOWN NAME
		for($i=1;$i<=$product[stock];$i++)
		{
			echo "<option value=$i>$i</option>"; //CREATING DROP DOWN ITEMS
		}
		echo "</select></br>";
		
		echo "<h3>$product[productname]</h3></br>";
			//echo "Qunatity: <input type='text' name='quantity' id='quantity' value='$product[stock]'/>";
			echo "<input type='submit' name='addtocart' value='Add to cart'/><br><br>";
			echo "<a href=cart.php?cid=$_REQUEST[pid]>Show cart<a>";
		echo "</fieldset></form></center>";
		echo "<center><a href='showproduct.php'>BACK TO LIST</a>";

		
		}
	}
	}
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		include '../../db/dbcon.php';
		//echo "<pre>";
		//var_dump($_SESSION['product']);

		$productname = $_SESSION['product']['productname'];
		$unitprice = $_SESSION['product']['price'];
		$quantity = $_POST['quantity'];
		$id = $_SESSION['product']['id'];
		$totalprice = $quantity*$unitprice;


		$query="SELECT * FROM cart WHERE id='{$id}'";
		$result=mysqli_query($con, $query);

		if(mysqli_num_rows($result)>0)
		{
			//echo "RESULT FROM DATABASE<br>";
			while($row=mysqli_fetch_assoc($result))
			{
				if($row['quantity'] == $quantity)
				{
					echo "<center> <h2 style='color':red>YOU HAVE INSERTED THE SAME AMOUNT OF FOOD IN CART</h2> </center><br>";
				}
				else
				{
					//echo "<pre>";
					//var_dump($row);
					//echo $quantity;
					$query="UPDATE cart SET quantity='".$quantity."' WHERE id='{$id}'";
					$updateprice = $quantity*$unitprice;
					$query2="UPDATE cart SET totalprice='".$updateprice."' WHERE id='{$id}'";


					$result=mysqli_query($con, $query);
					$result2=mysqli_query($con, $query2);
					if ($result) 
					{
						if ($result2) 
						{
							echo "<center><h2>TOTAL PRICE UPDATED </br>";
						}
						//echo "<center><h2><QUANTITY HAS ALSO UPDATED";
					}
					else
					{
						echo "NOT UPDATING";
					}
					//echo "UPDATE THE ROW <br>";
					//var_dump($row);
				}
				
			}
		}
		else
		{
		
			
		$querytoinserttocart = "INSERT INTO cart (id, productname, price, quantity, totalprice) VALUES ('".$id."', '".$productname."', '".$unitprice."', '".$quantity."', '".$totalprice."')";
		$insert = mysqli_query($con, $querytoinserttocart);
		
		if($insert) 
			{
				echo "<center><h2>PRODUCT ADDED TO CART<br>";
			}
		else
			{
				echo "FACING PROBLEM INSERTING";
			}
		}

		//$querytoinserttocart = "INSERT INTO cart (id, productname, price, quantity, totalprice) VALUES ('".$id."', '".$productname."', '".$unitprice."', '".$quantity."', '".$totalprice."')";

		
		/*$insert = mysqli_query($con, $querytoinserttocart);
		
		if($insert) 
		{
			echo "Working";
		}
		else
		{
			echo "NOT WORKING";
		}*/

		//$price= $_POST['quantity'] 
	}
	//echo "<pre>";
	//var_dump($_SESSION['productList']);*/
}
?>