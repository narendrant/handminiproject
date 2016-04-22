<?php
session_start();
  require_once 'db.php';
  //echo $username;

?>

<html>
<head><title>Signup</title>

 <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<script type="text/javascript">

  $(document).ready(function() {
    $('select').material_select();
  });</script>
	  <script type="text/javascript" src="js/modal.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
</head>

<body class="red lighten-5">

<style type="text/css">
#sbutton{	
	width:150px;
	height: 50px;
	background orange;
	border: 5px solid black;
	border-radius: 20px;
	margin-top: 50px;
}
#sbutton:hover{
	border: 5px solid green;
}
</style>
	<nav>
		<div class="nav-wrapper">
		  <a href="#" class="brand-logo">&nbsp;Admin SignUp</a>
		</div>
	</nav>
	<div class="row">
	<div class="card-panel col m6 s10 offset-s1 offset-m3" style="margin-top: 3%; padding-top:2%;padding-bottom:0px;">
		<div class="row">
			<div class="col s12">
				<div class="row">
					<form class="col s12" action="adsignup.php" method="post">
					  <div class="row">
						<div class="input-field col s12">
						  <i class="material-icons prefix">account_circle</i>
						  <input id="icon_prefix" type="text" name="uname" class="validate">
						  <label for="icon_prefix">Username</label>
						</div>
						<div class="row"></div>
						<div class="input-field col s12">
						  <i class="material-icons prefix">lock</i>
						  <input id="icon_telephone" type="password" name="pword" class="validate">
						  <label for="icon_telephone">Password</label>
						</div>
						<div class="row"></div>
						<div class="input-field col s12">
						<div class="row">
						 <div class="col s0"><i class="material-icons">my_location</i></div><div class="col s11">
    <select name="loc">
      <option value="" selected>Choose your Location</option>
      <option value="Kochi">Kochi</option>
      <option value="Banglore">Banglore</option>
      <option value="Chennai">Chennai</option>
    </select>
	</div>
	</div>
 
						</div>
						<div class="row">
							<div class="col s4 offset-s4">
							<input id="sbutton" type="submit" value="SignUp" >
							</div>
						</div>
					  </div>
					</form>
				 </div>
			</div>
		</div>
	</div>
	</div>

	<?php
	$uname='';
	$pword='';
	$loc='';
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{	
		if(isset($_POST['uname']))
		$uname=$_POST['uname'];
		if(isset($_POST['pword']))
		{
			$pword=$_POST['pword'];
			$pword=password_hash($pword,PASSWORD_BCRYPT);
		}

		if(isset($_POST['loc']))
		$loc=$_POST['loc'];
		//echo $uname.$pword.$loc;

		$sql="INSERT INTO admin(username,password,location)VALUES (?,?,?);";
	$stmt=$conn->prepare($sql);
    $stmt->bind_param('sss',$uname,$pword,$loc);
    $stmt->execute();

	//$stmt->execute();

	$stmt->close();
	$conn->close();
	$_SESSION['location']=$loc;
	header("Location:/admin/adlogin.php");
	
	}
?>



</body>

</html>