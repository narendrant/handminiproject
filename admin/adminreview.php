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
<head><title>Reviews</title>

 <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	  <script type="text/javascript" src="js/index.js"></script>
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
				<div class='col m8 s12 offset-m2'>
				<h4>Reviews</h4><br>
			<table class='highlight bordered centered responsive-table'>
            <thead>
              <tr>
                  <th data-field='product ID'>Product ID</th>
                  <th data-field='user ID'>User ID</th>
                  <th data-field='title'>Title</th>
                  <th data-field='description'>Description</th>
                  <th data-field='rating'>Rating</th>
                  <th data-field='userfname'>User Fname</th>
                  <th data-field='userlname'>User Lname</th>
                  <th data-field='productname'>Product Name</th>
                  <th data-field='action'>Action</th>
                  
              </tr>
            </thead>

            <tbody>";

	 //$location="Chennai";
	$sql= "SELECT Review.review_ID,Review.p_ID, Review.u_ID, Review.title, Review.description, Review.rating, User.fname, User.lname, Product.pname
			FROM `Review`
			INNER JOIN User ON Review.u_ID = User.user_ID
			INNER JOIN Product ON Product.product_ID = Review.p_ID
			WHERE Product.location = ?
			ORDER BY Review.`review_ID` DESC
			LIMIT 10 ";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('s',$location);
	$stmt->execute();
	$review_ID=' ';
	$pid=' ';
	$uid=' ';
	$title=' ';
	$description=' ';
	$rating=' ';
	$userfname=' ';
	$userlname=' ';
	$pname=' ';
	$stmt->bind_result($review_ID,$pid,$uid,$title,$description,$rating,$userfname,$userlname,$pname);
	$num_rows=0;
		while ($stmt->fetch()) 
		{
		   $num_rows++;
		  // echo "Rows=".$num_rows." ";
		   	echo" <tr>
                <td>$pid</td>
                <td>$uid</td>
                <td>$title</td>
                <td>$description</td>
                <td>$rating</td>
                <td>$userfname</td>
                <td>$userlname</td>
                <td>$pname</td>
                <td>
                <form action='removereview.php' method='post'>
                <button type='submit' name='reviewid' value='$review_ID' class='status waves-effect waves-light btn white' style='border:2px solid #EE6E73;border-radius:25px;'><span style='color:#EE6E73;'>Remove</span></button>
                </form>
                </td>
              </tr>";
              
        }

         if($num_rows==0)
    	   echo "<div class='row'>
				<div class='col m8 s12 '>
				<h6>No Reviews to display!</h6></div></div>";
    
         $stmt->close();
	     $conn->close();
  //}

?>
</body>
</html>