  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>Home</title>
    </head>
	<style type="text/css">
	::-webkit-scrollbar { 
    display: none; 
}
	</style>
    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/index.js"></script>
  <header>
		  <ul id="slide-out" class="side-nav fixed col s2 hide-on-med-and-down">
			  <ul>
				<div class="card no-margin">
					<div class="card-image" style="background:#FFF;height:200px;"> <!--F44336-->
							<img src="images/logo.png" style="transform:scale(0.9,.9);">
						  <!--<span class="card-title">DalalBull</span>-->
					</div>
							   
				</div>
			  </ul>
				  
			  <ul class="no-padding">
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="../">Category 1</a></li>
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="#!">Category 2</a></li>
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="../buy">Category 3</a></li>
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="../sell">Category 4</a></li>
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="#!">Category 5</a></li>
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="#!">Category 6</a></li>
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="#!">Category 7</a></li>
			  </ul>
		  </ul>
	   <nav>
		<div class="nav-wrapper">
      <a href="#" class="brand-logo center">Some Text</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class="modal-trigger" href="#login">Login</a></li>
        <li><a class="modal-trigger" href="#signup">Sign Up</a></li>
		<div id="login" class="modal">
			<div class="modal-content">
				<h4>Login</h4>
				<div class="row">
					<form class="col s12">
						<div class="row">
							<div class="input-field col s6">
							  <i class="material-icons prefix">account_circle</i>
							  <input id="icon_prefix" type="text" class="validate">
							  <label for="icon_prefix">Username</label>
							</div>
						</div>
						
						<div class="row">
							<div class="input-field col s6">
							  <i class="material-icons prefix">locks</i>
							  <input id="icon_prefix" type="text" class="validate">
							  <label for="icon_prefix">Password</label>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
			<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
			</div>
			
			
			<div id="signup" class="modal">
			<div class="modal-content">
				<h4>Register</h4>
				<div class="row">
					<form class="col s12">
						<div class="row">
							<div class="input-field col s6">
							  <i class="material-icons prefix">account_circle</i>
							  <input id="icon_prefix" type="text" class="validate">
							  <label for="icon_prefix">Username</label>
							</div>
						</div>
						
						<div class="row">
							<div class="input-field col s6">
							  <i class="material-icons prefix">lock</i>
							  <input id="icon_prefix" type="password" class="validate">
							  <label for="icon_prefix">Password</label>
							</div>
						</div>
						
						<div class="row">
							<div class="input-field col s6">
								<input placeholder="Placeholder" id="first_name" type="text" class="validate">
								<label for="first_name">First Name</label>
							</div>
						
							<div class="input-field col s6">
								<input id="last_name" type="text" class="validate">
								<label for="last_name">Last Name</label>
							</div>
						</div>
						
						<div class="row">
							<div class="input-field col s6">
								<input placeholder="Placeholder" id="first_name" type="text" class="validate">
								<label for="first_name">Adress Line 1</label>
							</div>
						</div>
						
						<div class="row">
							<div class="input-field col s6">
								<input placeholder="Placeholder" id="first_name" type="text" class="validate">
								<label for="first_name">Adress Line 2</label>
							</div>
						</div>
						
						<div class="row">
							<div class="input-field col s6">
								<input placeholder="Placeholder" id="first_name" type="text" class="validate">
								<label for="first_name">Adress Line 3</label>
							</div>
						</div>
						
						<div class="row">
							<div class="input-field col s6">
							  <i class="material-icons prefix">email</i>
							  <input id="icon_prefix" type="text" class="validate">
							  <label for="icon_prefix">Email</label>
							</div>
						</div>
						
						<div class="row">
							<div class="input-field col s6">
							  <i class="material-icons prefix">phone</i>
							  <input id="icon_prefix" type="text" class="validate">
							  <label for="icon_prefix">Phone</label>
							</div>
						</div>
						
						<div class="row">
							<div class="input-field col s6">
							  <i class="material-icons prefix">dialpad</i>
							  <input id="icon_prefix" type="text" class="validate">
							  <label for="icon_prefix">Pin</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
								<select>
									<option value="" disabled selected>State</option>
									<option value="1">Option 1</option>
									<option value="2">Option 2</option>
									<option value="3">Option 3</option>
								</select>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
			<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
			</div>
		</div>
	  </ul>
    
		
	
	
	
	
	
	
	</div>
  </nav>

	</header>
	   <center>
	   <div class="row">
					<div class="input-field col s5 offset-s3">
					  <i class="material-icons prefix">search</i>
					  <input id="icon_prefix" type="text" class="validate">
					</div>		
				
				
				<div class="input-field col s3">
					<select class="browser-default">
					  <option value="" disabled selected>Choose your Location</option>
					  <option value="1">Option 1</option>
					  <option value="2">Option 2</option>
					  <option value="3">Option 3</option>
					</select>
				  </div>
			</form>
	   </div>
	   <div class="row">
        <div class="col s2 offset-s3">
			<div class="card">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="images/logo.png">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
					<p><a href="#">This is a link</a></p>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
					<p>Here is some more information about this product that is only revealed once clicked on.</p>
				</div>
			</div>
        </div>
		
		
		<div class="col s2">
			<div class="card">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="images/logo.png">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
					<p><a href="#">This is a link</a></p>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
					<p>Here is some more information about this product that is only revealed once clicked on.</p>
				</div>
			</div>
        </div>
		
		<div class="col s2">
          <div class="card">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="images/logo.png">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
					<p><a href="#">This is a link</a></p>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
					<p>Here is some more information about this product that is only revealed once clicked on.</p>
				</div>
			</div>
        </div>
		
		<div class="col s2">
          <div class="card">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="images/logo.png">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
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
        <div class="col s2 offset-s3">
			<div class="card">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="images/logo.png">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
					<p><a href="#">This is a link</a></p>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
					<p>Here is some more information about this product that is only revealed once clicked on.</p>
				</div>
			</div>
        </div>
		
		
		<div class="col s2">
			<div class="card">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="images/logo.png">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
					<p><a href="#">This is a link</a></p>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
					<p>Here is some more information about this product that is only revealed once clicked on.</p>
				</div>
			</div>
        </div>
		
		<div class="col s2">
          <div class="card">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="images/logo.png">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
					<p><a href="#">This is a link</a></p>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
					<p>Here is some more information about this product that is only revealed once clicked on.</p>
				</div>
			</div>
        </div>
		
		<div class="col s2">
          <div class="card">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="images/logo.png">
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
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
        