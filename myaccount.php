  <?php
  session_start();
  require_once 'db.php';
if ($_SESSION['loggedin']==FALSE) {
			header("Location: index.php");exit();
}
  
  $pids = array();
  ?>
  <!DOCTYPE html>
  <html>
    <head>
    <title>Online Product Rental Portal</title>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

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
		<style type="text/css">
		@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

		fieldset, label { margin: 0; padding: 0; }
		body{  }
		h1 { font-size: 1.5em; margin: 10px; }

		/****** Style Star Rating Widget *****/

		.rating { 
		  border: none;
		  float: left;
		}

		.rating > input { display: none; } 
		.rating > label:before { 
		  margin: 5px;
		  font-size: 1.25em;
		  font-family: FontAwesome;
		  display: inline-block;
		  content: "\f005";
		}

		.rating > .half:before { 
		  content: "\f089";
		  position: absolute;
		}

		.rating > label { 
		  color: #ddd; 
		 float: right; 
		}

		/***** CSS Magic to Highlight Stars on Hover *****/

		.rating > input:checked ~ label, /* show gold star when clicked */
		.rating:not(:checked) > label:hover, /* hover current star */
		.rating:not(:checked) > label:hover ~ label { color: teal;  } /* hover previous stars in list */

		.rating > input:checked + label:hover, /* hover current star when changing rating */
		.rating > input:checked ~ label:hover,
		.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
		.rating > input:checked ~ label:hover ~ label { color: teal;  } 
		</style>
    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	  <script type="text/javascript" src="js/myaccount.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/jquery.form.min.js"></script>
  <header>
		  <ul id="slide-out" class="side-nav fixed col s2 ">
			  <ul>
				<div class="card no-margin">
					<div class="card-image" style="background:#FFF;height:200px;"> <!--F44336-->
							<a href="index.php"><img src="images/sample-1.png" style="transform:scale(0.9,.9);"></a>
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
      <a href="#" class="brand-logo center">My Account</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
             <li><a class='btn nav-wrapper hide-on-med-and-down' style="background:transparent;border:1px solid white;" id="rent" href='addproduct.php' style="line-height: 30px;">Rent Your Item Now</a></li>
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
        <?php $_SESSION['rerror']='';
 if(getimagesize('http://localhost/handminiproject/images/profile_pics/'.$_SESSION['uid'])!==false): ?><li><img style="height:50px;width:50px;"src=<?php echo "images/profile_pics/".$_SESSION['uid'];?> class="circle propic" onerror="this.src='images/logo.png';"><?php else:?><li><img style="height:50px;width:50px;"src="images/sample-1.jpg" class="circle propic"><?php  endif;?></li><li style="padding-left:10px;"><?php echo $_SESSION["name"];?></li></li><li><a href="#" data-activates="drop" class="dropdown-button  dropdown-button1 disableClick"><i class="material-icons ">arrow_drop_down</i></a></li> 
					<ul id='drop' class='dropdown-content'>
						<!--<li><a href="myaccount.php">My Account</a></li>
						<li class="divider"></li>-->
						<li><a href="#" id="logout" onclick="logout()" >Logout</a></li>
					</ul>
		
      <?php else:?>
      	<?php if (!(isset($_SESSION['add']) && $_SESSION['add']==1)) {
      		$_SESSION['rerror']='';
      	}else{$_SESSION['add']=0;}?>
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
						<li><a href="#">My Account</a></li>
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
							<strong><center><p id="serror1" class="red-text" ></p></center></strong>
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
		<div class="row ">
    <div class="col m6 offset-m4 ">
      <ul class="tabs hide-on-small-only">
        <li class="tab col s2"><a href="#my_products">My Products</a></li>
        <li class="tab col s2"><a href="#recent_products">Active</a></li>
        <li class="tab col s2"><a href="#pending_products">Completed</a></li>
      </ul>
    </div>

<?php  if ($_SESSION['loggedin']==FALSE) {
			header("Location: index.php");exit();
  		echo "<div class='row'>
		<div class='col m4 offset-m3'>
		<span>Please Log in to view your products. </span>
		</div>
	</div>";
  }else{
        $uid=$_SESSION['uid'];
        	   
	   	$sql = "SELECT product_ID,pname,price_day,price_week,price_month,description FROM Product WHERE u_ID=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('s',$uid);	
		$stmt->execute();
		$pid='';
		$pname='';
		$price_day='';
		$price_week='';
		$price_month='';
		$description='';
		$stmt->bind_result($pid,$pname,$price_day,$price_week,$price_month,$description);
		$flag=-1;
		$num_rows=0;
		while ($stmt->fetch()) {
		$num_rows++;
		array_push($pids,$pid);
		if ($num_rows==1) {
			  	$flag++;
			  	echo "<div id='my_products' style='padding-top:100px;'><div class='row'>
		<div class='col m4 offset-m3'>
		<h5>My Products</h5>
		</div>
	</div>
	<div class='row'>";
		}
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
<div class='card-action'>
                    <a href='editprod.php?pid=".$pid."' class='btn-floating waves-effect waves-light' style='margin-right:15px;'><i class='material-icons'>mode_edit</i></a>
                    <button value='$pid' href='#' class='delete btn-floating waves-effect red waves-light'><i class='material-icons'>close</i></a>
                    
                </div>				</div>
			</div>
        </div>";
		 $flag++;
		 if ($flag==4) {
		 	$flag=0;
		 	echo "</div>";
		 }
		}
		if ($num_rows==0) {
			  	echo "<div class='row'>
		<div id='my_products' class='col m4 offset-m3'>
		<h6 style='padding-top:40px;'>You Have Not Rented-Out Any Products</h6>
		</div>
	</div>
	<div class=''>";
		}

	  
	  
    echo"</div></div></div>
    <div id='recent_products' style='padding-top:10px;'><div class='row'>
		<div class='col m4 s12 offset-m3'>
		<h5>Active Transactions</h5>
		</div>
	</div>
	
	<div class='row'>
		<div class='col m8 s12 offset-m3'>
		<h5>Rented-Out</h5>
<table class='highlight striped responsive-table'>
            <thead>
              <tr>
                  <th data-field='product name'>Product Name</th>
                  <th data-field='transaction id'>Transaction ID</th>
                  <th data-field='renter'>Rentee ID</th>
                  <th data-field='date'>Date</th>
                  <th data-field='Status'>Status</th>
                  <th data-field='approval'>Approval</th>
                  <th data-field='req'>Request</th>
              </tr>
            </thead>

            <tbody>";
            $t1="renter";
            $t2="rented";
            foreach($pids as $id ) {
            	//echo $id;
			   	$sql = "SELECT pname FROM Product WHERE product_ID=?";
				$stmt=$conn->prepare($sql);
				$stmt->bind_param('s',$id);	
				$stmt->execute();
				$pname='';
				$stmt->bind_result($pname);
				$num_rows=0;
				$stmt->fetch();
				//$conn->close();
				$stmt->close();
				//echo $pname1;
				//$conn1 = new mysqli($servername, $username, $password, $dbname);
			   	$sql = "SELECT transaction_ID,u_ID,transaction_time,type FROM Transaction WHERE p_ID=?";
				$stmt=$conn->prepare($sql);
				$stmt->bind_param('s',$id);	
				$stmt->execute();
				$tid='';
				$rentee_id='';
				$date='';
				$type='';
				$stmt->bind_result($tid,$rentee_id,$date,$type);
				$num_rows=0;
				//echo "string";
				if($stmt->fetch()){
				if(!$type=='complaint'){	
				$num_rows++;
				$date = date('M j Y ', strtotime($date));             	
            echo"  <tr>
                <td>$pname</td>
                <td>$tid</td>
                <td>$rentee_id</td>
                <td>$date</td>";
                if($type==$t1){
                echo"<td>Pending</td>
                 ";               	
                	echo"<td><button type='submit' id='approve' value='$tid' class='approve btn-floating btn-small waves-effect waves-light teal left'><i class=' material-icons'>done</i></button>
                    <button id='reject' value='$tid' class='reject btn-floating btn-small waves-effect waves-light  right' style='background:#EE6E73;'><i class='material-icons activator right'>close</i></button></td><td></td>
				</td><td></td>";}
                else{if($type==$t2){
                echo"<td>Rented</td>
                <td></td> ";               	

                echo"<td><button type='submit' value='$tid' class='request waves-effect waves-light btn white' style='border:2px solid #EE6E73;border-radius:25px;'><span style='color:#EE6E73;'>Request</span></button></td>";}else{
                echo"<td>Pending</td>
                <td></td><td></td> ";               	

              }}
              echo "</tr>";}
          }
          $stmt->close();
          //$conn1->close();
      }

            echo"</tbody>
          </table>";
                if ($num_rows==0) {
          	echo"<div class='row'><br><center><h5>No Rented Out Products</h5></center></div>";
          }

		echo"<div class='row'>
		<h5>Rented-In</h5>
<table class='highlight striped responsive-table'>
            <thead>
              <tr>
                  <th data-field='product name'>Product Name</th>
                  <th data-field='transaction id'>Transaction ID</th>
                  <th data-field='renter'>Renter ID</th>
                  <th data-field='date'>Date</th>
                  <th data-field='Status'>Status</th>
                  <th data-field='approval'>Approval</th>
                  <th data-field='can'>Return</th>
              </tr>
            </thead>

            <tbody>";

            $t1="rentee";
            $t2="rented";
				$conn1 = new mysqli($servername, $username, $password, $dbname);
			   	$sql2 = "SELECT transaction_ID,p_ID,transaction_time,type FROM Transaction WHERE u_ID=?";
				$stmt2=$conn1->prepare($sql2);
				$stmt2->bind_param('s',$uid);	
				$stmt2->execute();
				$tid='';
				$p_id='';
				$date='';
				$type='';
				$stmt2->bind_result($tid,$p_id,$date,$type);
				$num_rows2=0;
				while ($stmt2->fetch()) {
				$conn2 = new mysqli($servername,$username,$password,$dbname);	
			   	$sql3 = "SELECT pname,u_ID FROM Product WHERE product_ID=?";
				$stmt3=$conn2->prepare($sql3);
				$stmt3->bind_param('s',$p_id);	
				$stmt3->execute();
				$pname2='';
				$u_ID='';
				$stmt3->bind_result($pname2,$u_ID);
				if($stmt3->fetch()){
				$date = date('M j Y ', strtotime($date));
				$num_rows2++;             	
            echo"  <tr>
                <td>$pname2</td>
                <td>$tid</td>
                <td>$u_ID</td>
                <td>$date</td>";
                if($type==$t1){
                echo"<td>Pending</td>
                 ";               	
                	echo"<td><button type='submit' value='$tid' id='approve'  class='approve1 btn-floating btn-small waves-effect waves-light teal left'><i class='material-icons'>done</i></button>
                    <button id='reject' value='$tid' class='reject1 btn-floating btn-small waves-effect waves-light  right' style='background:#EE6E73;'><i class='material-icons activator right'>close</i></button></td><td></td>
				";}
                else{if($type==$t2){
                echo"<td>Rented</td>
                <td></td> ";               	

                echo"<td><button type='submit'   value='$tid' class='return waves-effect waves-light btn white' style='border:2px solid teal;border-radius:25px;'><span style='color:teal;'>Return</span></button></td>              ";}else{
                echo"<td>Pending</td>
                <td></td><td></td> ";               	

              }}
          }
          echo "</tr>";
      }
           echo" </tbody>
          </table></div>";
                          if ($num_rows2==0) {
          	echo"<div class='row'><br><h5><center>No Rented Products</h5></center></div>";
          }

          		echo"</div>
	</div></div>

	
	<div id='pending_products' style='padding-top:10px;'><div class='row' >
		<div class='col m4 s12 offset-m3'>
		<h5>Completed Transactions</h5>
		</div>
	</div>
	
	<div class='row'>
		<div class='col m8 s12 offset-m3'>
		<h5>Rented-Out</h5>
<table class='highlight striped responsive-table'>
            <thead>
              <tr>
                  <th data-field='product name'>Product Name</th>
                  <th data-field='transaction id'>Transaction ID</th>
                  <th data-field='renter'>Rentee ID</th>
                  <th data-field='date'>Date</th>
                  <th data-field='Review'>Complaint</th>
              </tr>
            </thead>

            <tbody>";
            $num_rows=0;
            foreach($pids as $id ) {
			   	$sql = "SELECT pname FROM Product WHERE product_ID=?";
				$stmt=$conn->prepare($sql);
				$stmt->bind_param('s',$id);	
				$stmt->execute();
				$pname='';
				$stmt->bind_result($pname);
				//$num_rows=0;
				$stmt->fetch();
				//$conn->close();
				$stmt->close();
				//echo $pname1;
				//$conn1 = new mysqli($servername, $username, $password, $dbname);
			   	$sql = "SELECT transaction_ID,u_ID,transaction_time,type FROM Transaction WHERE p_ID=?";
				$stmt=$conn->prepare($sql);
				$stmt->bind_param('s',$id);	
				$stmt->execute();
				$tid='';
				$rentee_id='';
				$date='';
				$type='';
				$stmt->bind_result($tid,$rentee_id,$date,$type);
                if ($stmt->fetch()) {
                if($type=='complaint'){
				$date = date('M j Y ', strtotime($date));             	
              $num_rows++;
              echo"<tr>
                <td>$pname</td>
                <td>$tid</td>
                <td>$rentee_id</td>
                <td>$date</td>";

                echo "<td><button  value='$tid' class='complaint waves-effect waves-light btn white' style='border:2px solid #EE6E73;border-radius:25px;'><span style='color:#EE6E73;'>Complaint</span></button></td>";
            

            	echo "<td></td>";
            
              echo "</tr>";
          }
            }
			$stmt->close();
			$sql = "SELECT h_ID,u_ID,`time`,type FROM History  WHERE p_ID=?;";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param('s',$id);
			$stmt->execute();
			$hid='';
			$rentee_id='';
			$date='';
			$type='';
			$stmt->bind_result($hid,$rentee_id,$date,$type);
            if ($stmt->fetch()) {
             if ($type=='2') {
				$date = date('M j Y ', strtotime($date));             	
              echo"<tr>
                <td>$pname</td>
                <td>$hid</td>
                <td>$rentee_id</td>
                <td>$date</td><td></td>
                </tr>";
                $num_rows++;
            }
            $stmt->close();}}
           echo "</tbody>
          </table>";
          if ($num_rows==0) {
          	  echo"<div class='row'><br><h5><center>No Rented Products</h5></center></div>";
          }

          
		echo"<h5>Rented-In</h5>
<table class='highlight striped responsive-table'>
            <thead>
              <tr>
                  <th data-field='product name'>Product Name</th>
                  <th data-field='transaction id'>Product ID</th>
                  <th data-field='renter'>Renter ID</th>
                  <th data-field='date'>Date</th>
                  <th data-field='Review'>Review</th>
              </tr>
            </thead>

            <tbody>";
            $num_rows=0;
			$sql = "SELECT p_ID,`time` FROM History  WHERE (u_ID=? AND type='2');";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param('s',$uid);
			$stmt->execute();
			$pid1='';
			$date='';
			$type='';
			$stmt->bind_result($pid1,$date);
			while($stmt->fetch()){
			 $num_rows++;	
			 $sql1 = "SELECT pname,u_ID FROM Product  WHERE product_ID=?;";
			 $conn1 = new mysqli($servername, $username, $password, $dbname);
			 $stmt1=$conn1->prepare($sql1);
			 $stmt1->bind_param('s',$pid1);
			 $stmt1->execute();
			 $pname='';
			 $u_ID='';
			 $stmt1->bind_result($pname,$u_ID);
			 if($stmt1->fetch()){						
             echo" <tr>
                <td>$pname</td>
                <td>$pid1</td>
                <td>$u_ID</td>
                <td>$date</td>
                <td><button value='$pid1' class='review waves-effect waves-light btn white' style='border:2px solid teal;border-radius:25px;'><span style='color:teal;'>Add Review</span></button></td>
              </tr>";
          }          $stmt1->close();$conn1->close();
}
            echo"</tbody>
          </table>";
          if ($num_rows==0) {
          	  echo"<div class='row'><br><h5><center>No Rented Products</h5></center></div>";
          }
		echo"</div>
	</div></div>";
	}?>
	  <div class="hide-on-large-only fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href='addproduct.php' class="btn-floating btn-large red">
      <i class="large material-icons">add</i>
    </a>
  </div>    
<div class="modal col m6 offset-m3" id="success" style="height:1200px;">
                    <div class="modal-content">
                        	<center><p style="font-size:30px;color:teal;">Success</p>
                        <div class="modal-footer">
                        	 <button id="ok1" class="btn-flat waves-effect waves-light right"><a href="#" class="green-text text-darken-4">OK</a><i class="material-icons activator right">done</i></button>
                        </div>
                    </div>
                </div>				
	  <div class="hide-on-large-only fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a href='addproduct.php' class="btn-floating btn-large red">
      <i class="large material-icons">add</i>
    </a>
  </div>    
<div class="modal col m6 offset-m3" id="success1" style="height:1200px;">
                    <div class="modal-content">
                        	<center><p style="font-size:30px;color:teal;">Transaction Completed</p>
                        <div class="modal-footer">
                        	 <button id="ok3" class="btn-flat waves-effect waves-light right"><a href="#" class="green-text text-darken-4">OK</a><i class="material-icons activator right">done</i></button>
                        </div>
                    </div>
                </div>				
<div class="modal col m6 offset-m3" id="cancel" >
                    <div class="modal-content">
                        	<center><p style="font-size:30px;color:#EE6E73;">Rental Cancelled</p>
                        <div class="modal-footer">
                        	 <button id="ok2" class="btn-flat waves-effect waves-light right"><a href="#" class="green-text text-darken-4">OK</a><i class="material-icons activator right">done</i></button>
                        </div>
                    </div>
                </div>				
<div class="modal col m6 offset-m3" id="rejectmodal" style="height:1200px;">
                    <div class="modal-content">
                        	<center><p style="font-size:30px;color:#EE6E73;">Query Recorded</p>
                        	<center><p>Your query has been recorded. Please visit the COMPLETED tab to post your complaint.</p>
                        <div class="modal-footer">
                        	 <button id="ok4" class="btn-flat waves-effect waves-light right"><a href="#" class="green-text text-darken-4">OK</a><i class="material-icons activator right">done</i></button>
                        </div>
                    </div>
                </div>				
<div class="modal col m6 offset-m3" id="returned" >
                    <div class="modal-content">
                        	<center><p style="font-size:30px;color:teal;">Transaction Complete</p>
                        	<center><p>You have returned the product. The total rent amount and other details has been mailed to you. You will receive the deposit amount only after physically returning the product and verification/approval by the renter.</p>
                        <div class="modal-footer">
                        	 <button id="ok5" class="btn-flat waves-effect waves-light right"><a href="#" class="green-text text-darken-4">OK</a><i class="material-icons activator right">done</i></button>
                        </div>
                    </div>
                </div>				
<div class="modal col m6 offset-m3" id="confirm" >
                    <div class="modal-content">
					    <strong><center id="derror" style="color: red"></center></strong>              
                        	<center><p style="font-size:30px;color:teal;">Confirmation</p>
                        	<center><p>Are you sure want to delete this product ?</p>
                        <div class="modal-footer">
                        	 <button id="yes" class="btn-flat waves-effect waves-light "><a href="#" class="green-text text-darken-4">YES</a><i class="material-icons activator right">done</i></button>
                        	 <button id="no" class="btn-flat waves-effect waves-light "><a href="#" class="red-text text-darken-4">NO</a><i class="material-icons activator right">close</i></button>
                        </div>
                    </div>
                </div>				
		<div id='complaint' class="modal" style="background:white; color:black; padding: 10px;width:500px;height: 1500px;">
			<div class="modal-content">
				
				<form id="complaintform" action="complaint.php" method="post" enctype="multipart/form-data">
	    <strong><center id="comerror" style="color: red"></center></strong>              
						<div  style="padding-left:280px;">
							<center><p id="serror" class="red-text" ></p></center>
						</div>
						
						<div class="row">
							<h4>Complaint</h4>
							<div class="divider"></div>
						</div>

						<div class="row">
							<div class="input-field col s6">
								<i class="material-icons prefix">view_headline</i>
								<input  name="title" id="title" type="text" class="validate">
						    	<label for="title">Title</label>
							</div>
						</div>          

					    <div class="row">
					        <div class="input-field col s12">
					          <i class="material-icons prefix">description</i>
					          <textarea name="description" id="comments" class="materialize-textarea"></textarea>
					          <label for="comments">Description</label>
					        </div>
					    </div>

					    
					    
						<div class="row">
							<div class="col offset-s4">
								<button id="complaintsub" class="waves-effect waves-light btn" >Submit</button>
							</div>
						
						</div>
						

				</form>
			</div>
		</div>
				<div id="complaintmob" class="modal col s5 m3 " style="width:300px;">
			<div class="modal-content" style="background:white; color:black;">
				
				<form id="complaintform" action="complaint.php" method="post">
						
						
						<div class="row offset-s2">
							<h4>Complaint</h4>
							<div class="divider"></div>
						</div>

						<div class="row">
							<div class="input-field col s12 m6">
								<i class="material-icons prefix">view_headline</i>
								<input id="title" name="title" type="text" class="validate" length="30">
						    	<label for="title">Title</label>
							</div>
						</div>          

					    <div class="row">
					        <div class="input-field col s12 m12">
					          <i class="material-icons prefix">description</i>
					          <textarea id="comments" name="description" class="materialize-textarea"></textarea>
					          <label for="comments">Description</label>
					        </div>
					    </div>

					    
					    
						<div class="row">
							<div class="col offset-s3">
								<button class="waves-effect waves-light btn" type="submit">Submit</button>
							</div>
						
						</div>
						

				</form>
			</div>
			</div>


		<div id="review" class="modal" style="background:white; color:black; padding: 5px;width:500px;height: 1500px;">
	    <strong><center id="cerror" style="color: red"></center></strong>              
			<div class="modal-content">
				
				<div class="row">
					<h1>Review</h1>
					<div class="divider"></div>
				</div>

				<form id="reviewform" action="review.php" method="post" >
						<div  style="padding-left:280px;">
							<center><p id="serror" class="red-text" ></p></center>
						</div>
						
						<div class="row">
							<div class="input-field col s6">
								<i class="material-icons prefix">view_headline</i>
								<input id="title" name="title" type="text" class="validate" length="30">
						    	<label for="title">Title</label>
							</div>
						</div>          

					    <div class="row">
					        <div class="input-field col s12">
					          <i class="material-icons prefix">mode_edit</i>
					          <textarea id="comments" name="description" class="materialize-textarea"></textarea>
					          <label for="comments">Comments</label>
					        </div>
					    </div>

					    <!-- <div class="divClass" data-webRating="2.5" data-webRatingN="5" data-webRatingArg='{"type":"book","uid":12}'>
					    	<input type="radio">
					    </div>
 -->
 						<div class="row">
 							<h6>How would you rate the product?</h6>
 						</div>	
 						
 						<div class="row"> 
	 						<fieldset class="rating">
	 						    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome! - 5 stars"></label>
	 						    
	 						    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
	 						    
	 						    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Useful - 3 stars"></label>
	 						    
	 						    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Okay - 2 stars"></label>
	 						    
	 						    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Pathetic - 1 star"></label>
	 						    
	 						</fieldset>
 					    </div>
					  
						
					    
						<div class="row">
							<br>
							<div class="col offset-s3">
								<button id='reviewsub' class="waves-effect waves-light btn" >Submit</button>
							</div>
						
						</div>
						

				</form>
			</div>
		</div>

    </body>
  </html>
  <?php
  session_write_close();
  ?>   