<?php
session_start();

if ($_SESSION['loggedin']==TRUE) 
{
    
  require_once 'db.php';
  

}
else
{
  header("Location: adlogin.php");
  
} 
  
?>

<html>
<head><title>Title</title>

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

<body class="red lighten-5">
</style>
	<nav>
		<div class="nav-wrapper">
		  <a href="#" class="brand-logo">&nbsp;Admin Page</a>
		   <a href="/admin/adlogin.php" class="brand-logo right" onclick="logout()" style="font-size: 20px">logout</a>
		</div>
	</nav>
<br><br>
<div class="row">
	<div class="card-panel col s10 offset-s1 m8 offset-m2" style="padding: 20px;">
<div class="collection with-header">
		
		<ul class="collection-header"><h4>Options</h4></ul>
        <a href="/admin/viewuser.php" class="collection-item">User</a>
        <a href="/admin/adminproduct.php" class="collection-item ">Product</a>
        <a href="/admin/adminreview.php" class="collection-item"> Reviews</a>
        <a href="/admin/transaction.php" class="collection-item">Transaction</a>
        <a href="/admin/complaint.php" class="collection-item">Change complaint status</a>

        
        
 </div>
   </div>
</div>

</body>
</html>
