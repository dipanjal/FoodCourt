<?php
$servername = 'localhost';
$username   = 'root';
$password   = '';
$dbname     = 'foodcourtdb';

$con = new mysqli($servername,$username,$password,$dbname);

if(!$con)
{
	die("Connection failed: " .mysqli_connect_error());
}
else
{
    //echo "con successfully";
}
?>