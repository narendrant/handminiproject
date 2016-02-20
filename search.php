  <?php
  session_start();
  require_once 'db.php';

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
	  <script type="text/javascript" src="js/index.js"></script>
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
      <a href="#" class="brand-logo center">Search Results</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
             <li><a class='btn nav-wrapper hide-on-med-and-down' style="background:transparent;border:1px solid white;" id="rent" href='addproduct.php' style="line-height: 30px;">Rent Your Item Now</a></li>
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
        <?php if(getimagesize('http://localhost/handminiproject/images/profile_pics/'.$_SESSION['uid'])!==false): ?><li><img style="height:50px;width:50px;"src=<?php echo "images/profile_pics/".$_SESSION['uid'];?> class="circle propic" onerror="this.src='images/logo.png';"><?php else:?><li><img style="height:50px;width:50px;"src="images/sample-1.jpg" class="circle propic"><?php endif;?></li></li><li><a href="#" data-activates="drop" class="dropdown-button  dropdown-button1 disableClick"><i class="material-icons ">arrow_drop_down</i></a></li> 
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
				<form id="signupform" action="signup.php" method="post" enctype="multipart/form-data">
						<div  class="col s12 offset-s3" style="padding-left:46px;">
							<strong><center><p id="serror" class="red-text" ></p></center></strong>
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
                    <strong><center><p id="error1" class="red-text" ></p></center></strong>
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
					<strong><center><p id="error" class="red-text" ></p></center></strong>
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
							<strong><center><p id="serror" class="red-text" ></p></center></strong>
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
	   <center>
	   <br><br><br><br>
<?php
	$pname='test';
	$pid='';
	$num_rows=0;
	$keyword=$loc=null;
	$result= '';    
	$keyword=$_GET['keyword'];
    if(isset($_GET['loc']) && ($_GET['loc']!='LOCATION')){
    	$query= "SELECT pname,description,product_ID FROM Product WHERE location = ? AND ( pname LIKE ? OR description LIKE ? OR category LIKE ? ) ORDER BY rating DESC";
    	$loc=$_GET['loc'];
		$stmt=$conn->prepare($query);
	    $param="%".$keyword."%";		
	    $stmt->bind_param('ssss',$loc,$param,$param,$param);	
		$stmt->execute();
		$description='';
		$stmt->bind_result($pname,$description,$pid);
       	$num_rows=0;
			$flag=0;
			while ($stmt->fetch()) {
				$num_rows++;
				if ($flag==0) {
					echo "<div class='row'>";			
					echo "<div class='col m2 s10 offset-s1 offset-m3 offset-s1'>";
				}else{
					echo "<div class='col m2 s10 offset-s1'>";			
				}
				echo "<div class='card small'>
				<div class='card-image waves-effect waves-block waves-light'>
					<img class='activator' src='images/products/1/".$pid."' onerror=\"this.src='images/logo.png'\">
				</div>
				<div class='card-content'>
					<div  style='text-overflow:ellipsis;overflow:hidden;white-space:nowrap;'><span class='card-title activator grey-text text-darken-4'  >".$pname."<i class='material-icons right' >info_outline</i></span></div>
					<span><a href='product.php?pid=".$pid."'>Check Out Product</a></span>
				</div>
				<div class='card-reveal'>
					<i class='material-icons right'>close</i><span class='card-title grey-text text-darken-4'>".$pname."</span>
					<p>".$description."</p>
				</div>
			</div>
        </div>";
		 $flag++;
		 if ($flag==4) {
		 	$flag=0;
		 	echo "</div></center>";
		 }
		}   			
		if ($num_rows==0) {
   			echo "<span>No Results in ".$_GET['loc']."</span>";
   		}
   	}else {
   			$query="SELECT pname,description,product_ID FROM Product WHERE pname LIKE ? OR description LIKE ? OR category LIKE ?   ORDER BY rating DESC";
			$stmt=$conn->prepare($query);
    		$param="%".$keyword."%";
			$stmt->bind_param('sss',$param,$param,$param);	
			$stmt->execute();
			$description='';
			$stmt->bind_result($pname,$description,$pid);
			$result='';
			$flag=0;
			while ($stmt->fetch()) {
				$num_rows++;
				if ($flag==0) {
					echo "<div class='row'>";			
					echo "<div class='col m2 s10 offset-s1 offset-m3 offset-s1'>";
		}else{?>
			<div class='col m2 s10 offset-s1'>			
		<?php } ?>
			 <div class='card small'>
				<div class='card-image waves-effect waves-block waves-light'>
					<?php if(getimagesize('http://localhost/handminiproject/images/products/1/'.$pid)!==false): ?><img class='activator' src=<?php echo'images/products/1/'.$pid;?> onerror=\"this.src='images/logo.png'\"><?php else:?><img src="images/logo.png"><?php endif;?>
				
			<?php	echo"</div>
				<div class='card-content'>
					<div  style='text-overflow:ellipsis;overflow:hidden;white-space:nowrap;'><span class='card-title activator grey-text text-darken-4'  >".$pname."<i class='material-icons right' >info_outline</i></span></div>
					<span><a href='product.php?pid=".$pid."'>Check Out Product</a></span>
				</div>
				<div class='card-reveal'>
					<i class='material-icons right'>close</i><span class='card-title grey-text text-darken-4'>".$pname."</span>
					<p>".$description."</p>
				</div>
			</div>
        </div>";
		 $flag++;
		 if ($flag==4) {
		 	$flag=0;
		 	echo "</div></center>";
		 }
		}   			
		if ($num_rows==0) {
   			echo "<span>No Results</span>";
   		}
    }
	   ?>
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