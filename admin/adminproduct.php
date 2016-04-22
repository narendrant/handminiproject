<?php
 session_start();
if (isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==TRUE) 
{
	 
	require_once 'db.php';
	

}
else
{
	header("Location: adlogin.php");
	
}	
	
?>
	<html>
<head><title>Products</title>

 <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	  <script type="text/javascript" src="js/modal.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
</head>

<body class="white">
</style>
	<nav>
		<div class="nav-wrapper">
		  <a href="/admin/home.php" class="brand-logo">&nbsp;Admin Page</a>
		   <a href="/admin/adlogin.php" class="brand-logo right" onclick="logout()" style="font-size: 20px">logout</a>
		</div>
	</nav>
<br><br>

 <?php
	//$aid=$_SESSION['aid'];
	$location=$_SESSION['location'];
  echo "<div class='row'>
				<div class='col m12 s12'>
				<h4>Product List</h4><br>
			<table class='highlight bordered centered responsive-table'>
            <thead>
              <tr>
                  <th data-field='product ID'>Product ID</th>
                  <th data-field='pname'>Product Name</th>
                  <th data-field='category'>Category</th>
                  <th data-field='uid'>User ID</th>
                  <th data-field='description'>Description</th>
                  <th data-field='alternate address'>Alternate Address</th>
                  <th data-field='availability'>Availability</th>
                  <th data-field='priceday'>Price Day</th>
                  <th data-field='priceweek'>Price Week</th>
                  <th data-field='pricemonth'>Price Month</th>
                  <th data-field='actual price'>Actual Price</th>
                  <th data-field='bond'>Bond</th>
                  <th data-field='rating'>Rating</th>
                  <th data-field='action'>Action</th>
              </tr>
            </thead>

            <tbody>";

	// $location="Kochi";
	$sql= "SELECT `product_ID` , `pname` , `category` , `u_ID` , `description` , `alternate_address` , `availability` , `price_day` , `price_week` , `price_month` , `actual_price` , `bond` , `rating`
		FROM `Product`
		WHERE location = ?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('s',$location);
	$stmt->execute();
	$product_ID=' ';
	$pname=' ';
	$category=' ';
	$u_ID=' ';
	$description=' ';
	$alternate_address=' ';
	$availability=' ';
	$price_day=' ';
	$price_week=' ';
	$price_month=' ';
	$actual_price=' ';
	$bond=' ';
	$rating=' ';
	$stmt->bind_result($product_ID, $pname, $category, $u_ID, $description, $alternate_address, $availability, $price_day, $price_week, $price_month, $actual_price, $bond, $rating);
	$num_rows=0;
		while ($stmt->fetch()) 
		{
		   $num_rows++;
		   	echo" <tr>
                <td>$product_ID</td>
                <td>$pname</td>
                <td>$category</td>
                <td>$u_ID</td>
                <td>$description</td>
                <td>$alternate_address</td>
                <td>$availability</td>
                <td>$price_day</td>
                <td>$price_week</td>
                <td>$price_month</td>
                <td>$actual_price</td>
                <td>$bond</td>
                <td>$rating</td>
                <td>
                <form action='editprod.php' method='get'>
                <button type='submit' name='pid' value='$product_ID' class='status waves-effect waves-light btn white' style='border:2px solid teal;border-radius:25px;'><span style='color:teal;'>Edit</span></button>
                </form>
                <form action ='removeproduct.php' method='post'>
                <button type='submit' name='delete' value='$product_ID' class='status waves-effect waves-light btn white' style='border:2px solid #EE6E73;border-radius:25px;'><span style='color:#EE6E73;'>Delete</span></button>
                </form>
                </td>
              </tr>";
              
        }

         if($num_rows==0)
    	   echo "<div class='row'>
				<div class='col m8 s12 '>
				<h6>No Product to display!</h6></div></div>";
          
          echo "</tbody>
              </table>";
         $stmt->close();
	     $conn->close();
  //}

?>
</body>
</html>