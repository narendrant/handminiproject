  <?php
  session_start();
  ?>
  <!DOCTYPE html>
  <html>
    <head>
    <title>Online Product Rental Portal</title>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
	<style type="text/css">
	::-webkit-scrollbar { 
    display: none; 
	.input-field{
		border: 1px solid black;
	}
}
	</style>
    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	  <script type="text/javascript" src="js/index.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/jquery.form.min.js"></script>
  <header>
		  <ul id="slide-out" class="side-nav fixed col s2 ">
			  <ul>
				<div class="card no-margin">
					<div class="card-image" style="background:#FFF;height:200px;"> <!--F44336-->
							<img src="images/logo.png" style="transform:scale(0.9,.9);">
						  <!--<span class="card-title">DalalBull</span>-->
					</div>
							   
				</div>
			  </ul>
				  
			  <ul class="no-padding">
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="#">Electronics & Appliances</a></li>
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="#">Furniture</a></li>
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="#">Bikes & Scooters</a></li>
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="#">Power Tools</a></li>
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="#">Musical Instruments</a></li>
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="#">Baby Accessories & Toys</a></li>
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="#">Others</a></li>
			  </ul>
		  </ul>
	   <nav>
	    <a href="#" data-activates="slide-out " class="button-collapse"><i class="mdi-navigation-menu"></i></a>
		<div class="nav-wrapper">
      <a href="#" class="brand-logo center">Some Text</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
        <li><img style="height:50px;width:50px;"src=<?php echo "images/profile_pics/".$_SESSION['uid'];?> class="circle propic" onerror="this.src='images/logo.png';"><li style="padding-left:10px;"><?php echo $_SESSION["name"];?></li></li><li><a href="#" data-activates="drop" class="dropdown-button disableClick"><i class="material-icons ">arrow_drop_down</i></a></li> 
					<ul id='drop' class='dropdown-content'>
						<li><a href="#">My Account</a></li>
						<li class="divider"></li>
						<li><a href="#" id="logout" onclick="logout()">Logout</a></li>
					</ul>
		
      <?php else:?>
        <li><a class="modal-trigger" href="#login">Login</a></li>
        <li><a class="modal-trigger" href="#signup">Sign Up</a></li>
	  <?php endif;?>
		</ul>
		
		
		
		<div id="login" class="modal" style="background:white; color:black;width:400px;">
			<div class="modal-content">
				<form id="loginform"  action="login.php" method="post">
				<div  style="padding-left:130px;">
					<center><p id="error" class="red-text" ></p></center>
				</div>
				<div class="row">
					<div class="col s2 offset-s1">
						<i class="material-icons">email</i>
					</div>
					<div class="col s7">
					  <input placeholder="Email" id="first_name" type="email" name="email" class="validate">
					</div>
				</div>
				
				<div class="row">
						<div class="col s2 offset-s1">
							<i class="material-icons">locks</i>
						</div>
						<div class="col s7">
						<input placeholder="Password" id="first_name" name="password" type="password" class="validate">
						</div>
				</div>
				<div class="row">
					<center>
					<div class="col s3 offset-s4">
						<button class="waves-effect waves-light btn" type="submit">Login</button>
					</div>
					</center>
				</div>
				
				</form>
      
				</div>
			</div>
			
			
			<div id="signup" class="modal" style="background:white; color:black; padding: 10px;width:500px;height: 900px;">
			<div class="modal-content">
				<form id="signupform" action="signup.php" method="post" enctype="multipart/form-data">
						<div  style="padding-left:280px;">
							<center><p id="serror" class="red-text" ></p></center>
						</div>

						<div class="row">
							  <div class="col s1">
							  <i class="material-icons prefix">account_circle</i>
							  </div>
							  <div class="col s10">
							  <input placeholder="Email" id="icon_prefix" type="email" name="email" class="validate">
							  </div>
						</div>
						
						<div class="row">
							<div class="col s1">
							  <i class="material-icons prefix">lock</i>
							</div>
							<div class="col s10">
							  <input placeholder="Password" id="icon_prefix" type="password" name="password" class="validate">
							</div>
						</div>
						<div class="row">
							<div class="file-field col s11">
							  <div class="btn col s2">
								<span>DP</span>
								<input name="profile_pic" type="file">
							  </div>
							  <div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							  </div>
							</div>
						</div>
						
						<div class="row">
							<div class="col s1">
								<i class="material-icons prefix">perm_identity</i>
							</div>
							<div class="col s10">
								<input placeholder="First Name" name="fname" id="first_name" type="text" class="validate">
							</div>
						</div>
						<div class="row">
							<div class="col s1">
								<i class="material-icons prefix">perm_identity</i>
							</div>
							<div class="col s10">
								<input placeholder="Last Name" name="lname" id="last_name" type="text" class="validate">
							</div>
						</div>
						
						<div class="row">
							<div class="col s1">
							  <i class="material-icons prefix">phone</i>
							</div>
							<div class="col s10">
								<input placeholder="Phone" name="phone" id="icon_prefix" type="text" class="validate">
							</div>
						</div>
						
						<div class="row">
							<div class="col s1">
							  <i class="material-icons prefix">dialpad</i>
							</div>
							<div class="col s10">
							  <input placeholder="Pin" name="pin" id="icon_prefix" type="text" class="validate">
							</div>
						</div>
						
						<div class="row">
							<h5>Address</h5>
						</div>
						<div class="row">
							<div class="col s1">
								<i class="material-icons prefix">picture_in_picture</i>
							</div>
							<div class="col s10">
								<input placeholder="Line 1" name="address" id="line1" type="text" class="validate">
							</div>
						</div>
						
						<div class="row">
							<div class="col s1">
								<i class="material-icons prefix">picture_in_picture</i>
							</div>
							<div class="col s10">
								<input placeholder="State"  name="state" id="state" type="text" class="validate">
							</div>
						</div>
						
						<div class="row">
							<div class="col s1">
								<i class="material-icons prefix">picture_in_picture</i>
							</div>
							<div class="col s10">
								<input placeholder="City"  name="city" id="city" type="text" class="validate">
							</div>
						</div>
						
						<div class="row">
							<div class="col s12 offset-s4">
								<button class="waves-effect waves-light btn" type="submit">Register</button>
							</div>
						
						</div>
						

					</form>
				</div>
			</div>
	 
    
		
	
	
	
	
	
	
	</div>
  </nav>

	</header>
	   <center>
	   <div class="row">
					<div class="input-field col m6 s9 offset-m3">
					  <i class="material-icons prefix">search</i>
					  <input id="icon_prefix" type="text" class="validate">
					</div>		
				<div class="input-field col s1 hide-on-large-only" style="margin-left: 0px;">
				<a class='dropdown-button btn' href='#' data-activates='dropdown1'><i  class="material-icons">language</i></a>
				</div>
				
				<div class="input-field col s2 hide-on-med-and-down" style="margin-left:15px;">
					<a class='dropdown-button btn' href='#' data-activates='dropdown1' style="line-height: 30px;">Location<i  class="material-icons" style="padding-left:8px;">arrow_drop_down</i></a>
					<ul id='dropdown1' class='dropdown-content right'>
						<li><a href="#!">one</a></li>
						<li class="divider"></li>
						<li><a href="#!">two</a></li>
						<li class="divider"></li>
						<li><a href="#!">three</a></li>
					</ul>
				  </div>
	   </div>
	   <div class="row">
        <div class="col s10 m2 offset-m3 offset-s1">
			<div class="card small">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="images/logo.png">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Card Title</span>
					<p><a href="#">This is a link</a></p>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
					<p>Here is some more information about this product that is only revealed once clicked on.</p>
				</div>
			</div>
        </div>
		
		
		<div class="col m2 s10 offset-s1">
			<div class="card small">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="images/logo.png">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Card Title</span>
					<p><a href="#">This is a link</a></p>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
					<p>Here is some more information about this product that is only revealed once clicked on.</p>
				</div>
			</div>
        </div>
		
		<div class="col m2 s10 offset-s1">
          <div class="card small">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="images/logo.png">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Card Title</span>
					<p><a href="#">This is a link</a></p>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
					<p>Here is some more information about this product that is only revealed once clicked on.</p>
				</div>
			</div>
        </div>
		
		<div class="col m2 s10 offset-s1">
          <div class="card small">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="images/logo.png">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Card Title</span>
					<p><a href="#">This is a link</a></p>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
					<p>Here is some more information about this product that is only revealed once clicked on.</p>
				</div>
			</div>
        </div>
		
      </div>
	  </center>
	  
	  
	  <div class="row">
          <center>
	   <div class="row">
        <div class="col s10 m2 offset-m3 offset-s1">
			<div class="card small">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="images/logo.png">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Card Title</span>
					<p><a href="#">This is a link</a></p>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
					<p>Here is some more information about this product that is only revealed once clicked on.</p>
				</div>
			</div>
        </div>
		
		
		<div class="col m2 s10 offset-s1">
			<div class="card small">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="images/logo.png">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Card Title</span>
					<p><a href="#">This is a link</a></p>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
					<p>Here is some more information about this product that is only revealed once clicked on.</p>
				</div>
			</div>
        </div>
		
		<div class="col m2 s10 offset-s1">
          <div class="card small">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="images/logo.png">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Card Title</span>
					<p><a href="#">This is a link</a></p>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
					<p>Here is some more information about this product that is only revealed once clicked on.</p>
				</div>
			</div>
        </div>
		
		<div class="col m2 s10 offset-s1">
          <div class="card small">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="images/logo.png">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Card Title</span>
					<p><a href="#">This is a link</a></p>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
					<p>Here is some more information about this product that is only revealed once clicked on.</p>
				</div>
			</div>
        </div>
		
      </div>
	  </center>
        </div>
		
      </div>
	  </center>
    </body>
  </html>
  <?php
  session_write_close();
  ?>      