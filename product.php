  <?php
  session_start();
  require_once 'db.php';
  if(!isset($_GET['pid'])){
	header("Location: index.php");exit();

  }
	$pname='';
	$price_week='';
	$price_month='';
	$price_day='';
	$bond=0;
	$availability=FALSE;
	$pid=$_GET['pid'];
	$num_rows=0;
    if(isset($_GET['pid'])){
    	$query= "SELECT price_week,price_month,price_day,pname,bond,description,availability FROM Product WHERE product_ID=?";
		$stmt=$conn->prepare($query);		
	    $stmt->bind_param('s',$pid);	
		$stmt->execute();
		$description='';
		$stmt->bind_result($price_week,$price_month,$price_day,$pname,$bond,$description,$availability);
		if($stmt->fetch()) {
			$num_rows++;			
	}
	if ($num_rows==0) {
			header("Location: index.php");exit();
	}
}

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
      <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	  <script type="text/javascript" src="js/product.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/jquery.form.min.js"></script>
  <header>
		  <ul id="slide-out" class="side-nav fixed col s2 ">
			  <ul>
				<div class="card no-margin">
					<div class="card-image" style="background:#FFF;height:200px;"> <!--F44336-->
							<a href="index.php"><img src="images/logo.png" style="transform:scale(0.9,.9);"></a>
						  <!--<span class="card-title">DalalBull</span>-->
					</div>
							   
				</div>
			  </ul>
				  
			  <ul class="no-padding">
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="/handminiproject/categorypage.php?cid=Electronics And Home Appliances">Electronics & Appliances</a></li>
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="/handminiproject/categorypage.php?cid=Furniture">Furniture</a></li>
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="/handminiproject/categorypage.php?cid=Bikes And Scooters">Bikes & Scooters</a></li>
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="/handminiproject/categorypage.php?cid=Power Tools">Power Tools</a></li>
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="/handminiproject/categorypage.php?cid=Musical Instruments">Musical Instruments</a></li>
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="/handminiproject/categorypage.php?cid=Baby Accessories And Toys">Baby Accessories & Toys</a></li>
				  <li  class="bold"><a class="waves-effect waves-teal sidenava" href="/handminiproject/categorypage.php?cid=Others">Others</a></li>
			  </ul>
		  </ul>
	   <div class="">
	   <nav>
	    <a href="#" data-activates="slide-out " class="button-collapse"><i class="mdi-navigation-menu"></i></a>
		<div class="nav-wrapper fixed">
      <a href="#" class="brand-logo center"><?php echo $pname;?></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
             <li><a class='btn nav-wrapper hide-on-med-and-down' style="background:transparent;border:1px solid white;" id="rent" href='rent_item.php' style="line-height: 30px;">Rent Your Item Now</a></li>
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
        <?php if(getimagesize('http://localhost/handminiproject/images/profile_pics/'.$_SESSION['uid'])!==false): ?><li><img style="height:50px;width:50px;"src=<?php echo "images/profile_pics/".$_SESSION['uid'];?> class="circle propic" onerror="this.src='images/logo.png';"><?php else:?><li><img style="height:50px;width:50px;"src="images/logo.png" class="circle propic"><?php endif;?></li><li style="padding-left:10px;"><?php echo $_SESSION["name"];?></li></li><li><a href="#" data-activates="drop" class="dropdown-button  dropdown-button1 disableClick"><i class="material-icons ">arrow_drop_down</i></a></li> 
					<ul id='drop' class='dropdown-content'>
						<li><a href="myaccount.php">My Account</a></li>
						<li class="divider"></li>
						<li><a href="#" id="logout" onclick="logout()" >Logout</a></li>
					</ul>
		
      <?php else:?>
        <li><a class="modal-trigger" href="#login">Login</a></li>
        <li><a class="modal-trigger" href="#signup">Sign Up</a></li>
					<ul id='drop2' class='dropdown-content'>
				        <li><a class="modal-trigger" href="#login">Login</a></li>
        				<li><a class="modal-trigger" href="#signup">Sign Up</a></li>
					</ul>
	  <?php endif;?>
		</ul>
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
					<ul id='drop1' class='dropdown-content'>
						<li><a href="myaccount.php">My Account</a></li>
						<li class="divider"></li>
						<li><a href="#" id="logout" onclick="logout()">Logout</a></li>
					</ul>
      <?php else:?>
					<ul id='drop1' class='dropdown-content'>
						<li><a class="modal-trigger" href="#loginmob">Login</a></li>
						<li class="divider"></li>
						<li><a class="modal-trigger" href="#signupmob" >Sign Up</a></li>
					</ul>
	  <?php endif;?>
		            <ul id="menu_but"class="right hide-on-large-only valign-wrapper"  >
             
             <li  class="valign " id="tutrest2"><a href="#" data-activates='drop1' class="dropdown-button dropdown-button1 "><i class="material-icons ">more_vert</i></a></li>
            </ul>

        <div id="signupmob" class="modal" style="background:white; color:black; padding: 10px;width:350px;height: 900px;overflow-x:hidden;">
			<div class="modal-content">
				<form id="signupform1" action="signup.php" method="post" enctype="multipart/form-data">
						<div  class="col s12 offset-s3" style="padding-left:46px;">
							<center><p id="serror1" class="red-text" ></p></center>
						</div>

						<div class="row">
							  <div class="col s1">
							  <i class="material-icons prefix">account_circle</i>
							  </div>
							  <div class="col s10" style="margin-left:12px;">
							  <input placeholder="Email" id="icon_prefix" type="email" name="email" class="validate">
							  </div>
						</div>
						
						<div class="row">
							<div class="col s1">
							  <i class="material-icons prefix">lock</i>
							</div>
							<div class="col s10" style="margin-left:12px;">
							  <input placeholder="Password" id="icon_prefix" type="password" name="password" class="validate">
							</div>
						</div>
						<div class="row">
							<div class="file-field col s11">
							  <div class="btn col s2">
								<span>DP</span>
								<input name="profile_pic" type="file">
							  </div>
							  <div class="file-path-wrapper" style="margin-left:12px;">
								<input class="file-path validate" type="text">
							  </div>
							</div>
						</div>
						
						<div class="row">
							<div class="col s1">
								<i class="material-icons prefix">perm_identity</i>
							</div>
							<div class="col s10" style="margin-left:12px;">
								<input placeholder="First Name" name="fname" id="first_name" type="text" class="validate">
							</div>
						</div>
						<div class="row">
							<div class="col s1">
								<i class="material-icons prefix">perm_identity</i>
							</div>
							<div class="col s10" style="margin-left:12px;">
								<input placeholder="Last Name" name="lname" id="last_name" type="text" class="validate">
							</div>
						</div>
						
						<div class="row">
							<div class="col s1">
							  <i class="material-icons prefix">phone</i>
							</div>
							<div class="col s10" style="margin-left:12px;">
								<input placeholder="Phone" name="phone" id="icon_prefix" type="text" class="validate">
							</div>
						</div>
						
						<div class="row">
							<div class="col s1">
							  <i class="material-icons prefix">dialpad</i>
							</div>
							<div class="col s10" style="margin-left:12px;">
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
							<div class="col s10" style="margin-left:12px;">
								<input placeholder="Line 1" name="address" id="line1" type="text" class="validate">
							</div>
						</div>
						
						<div class="row">
							<div class="col s1">
								<i class="material-icons prefix">picture_in_picture</i>
							</div>
							<div class="col s10" style="margin-left:12px;">
								<input placeholder="State"  name="state" id="state" type="text" class="validate">
							</div>
						</div>
						
						<div class="row">
							<div class="col s1">
								<i class="material-icons prefix">picture_in_picture</i>
							</div>
							<div class="col s10" style="margin-left:12px;">
								<input placeholder="City"  name="city" id="city" type="text" class="validate">
							</div>
						</div>
						
						<div class="row">
							<div class="col s12 offset-s3">
								<button class="waves-effect waves-light btn" type="submit">Register</button>
							</div>
						
						</div>
						

					</form>
				</div>
			</div>
	 
		
		<div id="loginmob" class="modal hide-on-large-only" style="background:white; color:black;width:300px;padding-top:10px;">
            <div class="modal-content">
                <form id="loginform1"  action="login.php" method="post">
                <div  style="padding-left:70px;">
                    <center><p id="error1" class="red-text" ></p></center>
                </div>
                <div class="row">
                    <div class="col s2 offset-s1">
                        <i class="material-icons">email</i>
                    </div>
                    <div class="col s7">
                      <input placeholder="Email" id="first_name1" type="email" name="email" class="validate">
                    </div>
                </div>
                
                <div class="row">
                        <div class="col s2 offset-s1">
                            <i class="material-icons">locks</i>
                        </div>
                        <div class="col s7">
                        <input placeholder="Password" id="password1" name="password" type="password" class="validate">
                        </div>
                </div>
                <div class="row">
                    <div class="col s3 offset-s3" >
                        <button class="waves-effect waves-light btn" type="submit" >Login</button>
                    </div>
                </div>
                
                </form>
     
                </div>
            </div>
		
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
	</div>
  </nav>

	</header>
		<div class="row">
			<div class="card-panel col s12 m7 offset-m3 left" style="padding-top: 20px;">
				<div class="row">
				<div class="col s12 m8">
				<div class="slider">
				<ul class="slides">
					<li>
						<img src='images/products/1/<?php echo "$pid";?>' onerror="this.src='images/logo.png'" height="200" width="300"/>
					</li>
					<?php if (getimagesize('http://localhost/handminiproject/images/products/2/'.$pid)!==false): ?> 
					<li>
						<img src='images/products/2/<?php echo "$pid";?>' onerror="this.src='images/logo.png'" height="200" width="300"/>
					</li>
				<?php endif; ?>
					<?php if (getimagesize('http://localhost/handminiproject/images/products/3/'.$pid)!==false): ?> 
					<li>
						<img src='images/products/3/<?php echo "$pid";?>' onerror="this.src='images/logo.png'" height="200" width="300"/>
					</li>
				<?php endif; ?>
					</ul>
				</div>
				</div>
				<div class="col s12 m4" style="padding: 20px;">
				<p style="line-height:450%">Daily: &#8377;<?php echo $price_day;?><br/><p>
				<p style="line-height:450%">Weekly: &#8377;<?php echo $price_week;?> <br/><p>
				<p style="line-height:450%">Monthly: &#8377;<?php echo $price_month;?><br/><p>
				<p style="line-height:450%">Bond: <?php if($bond==1){echo"YES";}else{echo "NO";}?><br/><p>				
					<div class="col s12 offset-m1 offset-s3">
						<?php if(!$availability): ?>
						<a class="waves-effect waves-light red btn" ><i class="material-icons right">not_interested</i>Can't Rent</a>
					<?php else: ?>
						<a href="#rentout" class="waves-effect waves-light btn modal-trigger" ><i class="material-icons right">send</i>Rent Now</a>
					<?php endif; ?>
					</div>
				</div>
			
				
<div class="modal col s9 offset-s1 m5" id="rentout">
                    <div class="modal-content" style="margin-bottom: 100px;margin-top: 60px;">
                        <form>
                        <div id="page0">                        
                        <h2><?php echo $pname; ?></h2>
                        <div class="row">
                         <div class="col s6">
                         From<input type="date" class="datepicker validate" required>
                         </div>
                         <div class="col s6">
                         To<input type="date" class="datepicker validate" required>
                         </div>
                         </div>
                         <div class="row" style="padding-top: 20px;">
                            <h4>&#8377;<?php echo $price_day; ?>/day</h4>
                         </div>
                         </div>
                        </form>
                         <div  id="page1" class="row " style="padding 10px">
                         <center>
                            <h4>Calculated Rent</h4>
                        </center>
                         </div>
                         
                         
                         <div  id="page2" class="row " style="padding 10px">
                         <center>
                            <h4>Terms and Conditions</h4>
                        </center>
                         </div>
                         
                         <div id="page3" class="row " style="padding 10px;">
                            <center>
                            <h4>Final</h4>
                            </center>
                         </div>
                     
                         <div class="modal-footer">
                            <a id="prev" class="btn-floating btn-small waves-effect waves-light teal left"><i class="material-icons activator">skip_previous</i></a>
                            <a id="next" class="btn-floating btn-small waves-effect waves-light teal right"><i class="material-icons activator right">skip_next</i></a>
                        </div>
                    </div>
                </div>				
				<div class="row">
					<div class="col s12">
						<h4>Description</h4>
						<p><?php echo $description; ?></p>
					</div>
				</div>
				
				<div class="row">
					<div class="col s12">
						
						  <ul class="collection with-header">
							<li class="collection-header"><h4>User Reviews</h4></li>
							<li class="collection-item avatar">
							  <img src="images/logo.png" alt="" class="circle">
							  <span class="title">Title</span>
							  <p>First Line <br>
								 Second Line
							  </p>
							  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
							</li>
							<li class="collection-item avatar">
							  <img src="images/logo.png" alt="" class="circle">
							  <span class="title">Title</span>
							  <p>First Line <br>
								 Second Line
							  </p>
							  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
							</li>
							<li class="collection-item avatar">
							  <img src="images/logo.png" alt="" class="circle">
							  <span class="title">Title</span>
							  <p>First Line <br>
								 Second Line
							  </p>
							  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
							</li>
							<li class="collection-item avatar">
							 <img src="images/logo.png" alt="" class="circle">
							  <span class="title">Title</span>
							  <p>First Line <br>
								 Second Line
							  </p>
							  <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
							</li>
						  </ul>
					</div>
				</div>
				
			</div>
        </div>
          <div class="hide-on-large-only fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href='addproduct.php' class="btn-floating btn-large red">
      <i class="large material-icons">add</i>
    </a>
  </div>    

    </body>
  </html>
  <?php
  session_write_close();
  ?>      