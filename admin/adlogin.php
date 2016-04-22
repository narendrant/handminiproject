<?php
session_start();
require_once 'db.php'; 
?>

<html>
<head><title>Login</title>

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

<body class="red lighten-5">

<style type="text/css">
#sbutton{	
	width:150px;
	height: 50px;
	background blue;
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
		  <a href="#" class="brand-logo">&nbsp;Admin Login</a>
		  <!--  <a href="/admin/adsignup.php" class="brand-logo right" style="font-size: 20px">Signup</a>  -->
		</div>
	</nav>
	<div class="row">
	<div class="card-panel col m6 s10 offset-s1 offset-m3" style="margin-top: 5%; padding-top:2%;padding-bottom:0px;">
		<div class="row">
			<div class="col s12">
				<div class="row">
					<form class="col s12" action="adlogin.php" method="post">
					  <div class="row">
						<div class="input-field col s12">
						  <i class="material-icons prefix">account_circle</i>
						  <input id="icon_prefix" type="text" name="username" class="validate">
						  <label for="icon_prefix">Username</label>
						</div>
						<div class="row"></div>
						<div class="input-field col s12">
						  <i class="material-icons prefix">lock</i>
						  <input id="icon_telephone" type="password" name="password" class="validate">
						  <label for="icon_telephone">Password</label>
						</div>
						<div class="row">
							<div class="col s4 offset-s4">
							<input id="sbutton" type="submit" value="Login" >
							</div>
						</div>
					  </div>
					</form>
				 </div>
			</div>
		</div>
	</div>
	</div>

</body>

</html>


<?php
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$uname=$_POST['username'];
	$pword=$_POST['password'];
	//$pword=password_hash($pword,PASSWORD_DEFAULT);
	//echo $uname." ".$pword." ";

	$sql = "SELECT password,location,username FROM admin WHERE username=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('s',$uname);	
	$stmt->execute();
	$apword='';
	
	$stmt->bind_result($apword,$a_loc,$a_name);
	

	if($stmt->fetch()){
         //echo $a_pword;
		if (password_verify($pword,$apword)){
		//if($a_pword==$pword){
		
    		$_SESSION['loggedin']=TRUE;
    		$_SESSION['name']=$a_name;
			$_SESSION['location']=$a_loc;
    		//echo "loggedin";
    		header("Location: home.php");
		} else {
    			echo 'Invalid Password';
				}
	}else{
		echo 'No Such User';
	}
	$stmt->close();
	$conn->close();
 }//else{
// 	header("Location: admin1.php");exit();
// }

?>