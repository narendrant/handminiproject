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
<head><title>Active Transaction</title>
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
     //$location="Chennai";

  echo "<div class='row'>
				<div class='col m8 s12 offset-m2'>
				<h4>Active Transactions</h4><br>
			<table class='highlight bordered centered responsive-table'>
            <thead>
              <tr>
                  <th data-field='transaction id'>Transaction ID</th>
                  <th data-field='product id'>Product ID</th>
                  <th data-field='product name'>Product Name</th>
                  <th data-field='user id'>User ID</th>
                  <th data-field='transaction time'>Transaction Time</th>
                  
                  <th data-field='status'>Status</th>
                  
              </tr>
            </thead>

            <tbody>";

	//$location="Chennai";

	$sql= "SELECT product_ID,pname FROM Product WHERE location=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('s',$location);
	$stmt->execute();
	$stmt->bind_result($pid,$pname);
	$num_rows1=0;
	$num_rows2=0;

		while ($stmt->fetch()) 
		{
			
		   $num_rows1++;
		   $sql="SELECT* FROM Transaction WHERE p_ID=?";
		   $conn1 = new mysqli($servername, $username, $password, $dbname);
		   $stmt1=$conn1->prepare($sql);
		   $stmt1->bind_param('s',$pid);
		   $stmt1->execute();
		   $tid=0;
		   $t_time='';
		   $uid='';
		   $stmt1->bind_result($tid,$pid,$uid,$t_time,$type);
		   
           //echo $tid;
           
		   while ($stmt1->fetch()) 
			{
             	$num_rows2++;
				$t_time = date('j M Y ', strtotime($t_time));
				if($type==0)
           			$type="Rentee Approval";
           		else if($type==1)
           			$type="Rented";
            	else if($type==2)
            		$type="Renter Approval";
            	else
            		$type="Complaint";
		  
				echo" <tr>
                <td>$tid</td>
                <td>$pid</td>
                <td>$pname</td>
                <td>$uid</td>
                <td>$t_time</td>
                <td>$type</td>
              </tr>";
              

	    	}
            
       

	    	$stmt1->close();
	    	$conn1->close();
        }

         if($num_rows2==0)
    	   echo "<div class='row'>
				<div class='col m8 s12 '>
				<h6>No active transaction</h6></div></div>";
    
         $stmt->close();
	     $conn->close();
 

?>
</body>
</html>
</body>
</html>