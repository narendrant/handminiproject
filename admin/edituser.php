<?php
	session_start();
?>
<html>
<head><title>Edituser</title>


    <!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/index.js"></script>
       

</head>
<body>	
	<nav>
		<div class="nav-wrapper">
		  <a href="/admin/home.php" class="brand-logo">&nbsp;Admin Page</a>
		   <a href="/admin/adlogin.php" class="brand-logo right" onclick="logout()" style="font-size: 20px">logout</a>
		</div>
	</nav>

	<div class="row" >
		<div class ="col s4 offset-s4">
			<div class="card-panel">
					<center>
				<form method="post" action="update.php">
				<input type="hidden" name="user_ID" value="<?php echo $_POST['user_ID'];?>">
				<div class="row">
					<div class="input-field col s12">
					 <i class="material-icons prefix">email</i>
					  <input name="email" placeholder="email" type="email" class="validate" disabled value="<?php echo $_POST['email'];?>">
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s12">
					 <i class="material-icons prefix">account_circle</i>
					  <input name="fname" placeholder="First Name" type="text" class="validate" value="<?php echo $_POST['fname'];?>">
					</div>
				</div>
				
				<div class="row">
				
					<div class="input-field col s12">
						<i class="material-icons prefix">account_circle</i>
					 <input name="lname" placeholder="Last Name" type="text" class="validate" value="<?php echo $_POST['lname'];?>">
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s12">
					<i class="material-icons prefix">my_location</i>
						<textarea class="materialize-textarea" name="address"><?php echo $_POST['address'];?></textarea>
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s12">
					<i class="material-icons prefix">my_location</i>
					  <input name="city" placeholder="City" type="text" class="validate" value="<?php echo $_POST['city'];?>">
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s12">
					<i class="material-icons prefix">dialpad</i>
					  <input name="pin" placeholder="Pin" type="number" class="validate" value="<?php echo $_POST['PIN'];?>">
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s12">
					<i class="material-icons prefix">my_location</i>
					  <input name="state" placeholder="State" type="text" class="validate" value="<?php echo $_POST['state'];?>">
					</div>
				</div>
				
				<div class="row">
					<div class="input-field col s12">
					<i class="material-icons prefix">phone</i>
					  <input name="phone" placeholder="Phone" type="text" class="validate" value="<?php echo $_POST['phone'];?>">
					</div>
				</div>
				
				
				
				<div class="row">
					<div class="col offset-s3">
					<button class="btn waves-effect waves-light" type="submit" name="edit">Update
					<i class="material-icons right">send</i>
					</button>
					</div>
				</div>
				
				</form>
				</center>
			</div>
		</div>
		</div>
	</div>
</body>
</html>
