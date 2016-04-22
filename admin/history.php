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
<head><title>Transaction History</title>
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

<body>
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
    // $location="Chennai";

  echo "<div class='row'>
				<div class='col m8 s12 offset-m2'>
				<h4>Transaction History</h4><br>
			<table class='highlight bordered centered responsive-table'>
            <thead>
              <tr>
                  <th data-field='history id'>History ID</th>
                  <th data-field='product id'>Product ID</th>
                  <th data-field='product name'>Product Name</th>
                  <th data-field='user id'>User ID</th>
                  <th data-field='rented-out time'>Rented-Out Time</th>
                  <th data-field='transaction time'>Transaction End Time</th>
                  <th data-field='status'>Status</th>
                  
              </tr>
            </thead>

            <tbody>";


      $sql= "SELECT H.h_ID,H.p_ID,H.u_ID,H.rent_time,H.time,H.type,P.pname
			FROM History H,Product P
			WHERE P.location = ? AND H.p_ID=P.product_ID
			ORDER BY H.h_ID DESC";

	 $stmt=$conn->prepare($sql);
	 $stmt->bind_param('s',$location);
	 $stmt->execute();
	 $stmt->bind_result($hid,$pid,$uid,$rentout,$txntime,$type,$pname);
	 $num_rows=0;
		while ($stmt->fetch()) 
		{
		   $num_rows++;
		   $rentout = date('j M Y H:i:s', strtotime($rentout));
		   if($txntime==null)
		   		$txntime="------";
		   	else
		   		$txntime = date('j M Y H:i:s', strtotime($txntime));

		   if($type==1)
           			$type="Active";
           else 
            		$type="Closed";

           
		   echo" <tr>
                <td>$hid</td>
                <td>$pid</td>
                <td>$pname</td>
                <td>$uid</td>
                <td>$rentout</td>
                <td>$txntime</td>
                <td>$type</td>
                </tr>";
              

	    }

	 $stmt->close();
	 $conn->close();
 

?>
</body>
</html>