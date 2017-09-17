<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #4CAF50;
}

@media screen and (max-width: 600px){
    ul.topnav li.right, 
    ul.topnav li {float: none;}

</style>

</head>
<body>

<ul class="topnav">
  <li><a href="admin.php">Delevery</a></li>
  <li><a href="addproduct.php">Add to store</a></li>
  <li><a href="mystore.php">Storage</a></li>
  <li><a href="history.php">History</a></li>
  <li style="float:right" ><a href="logout.php">Logout</a></li>
</ul>

</body>
