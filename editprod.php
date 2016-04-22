<?php 
session_start();
  require_once 'db.php';
   if (!(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==TRUE)) {
  header("Location: index.php");exit();}
    if(!isset($_GET['pid'])){
  header("Location: index.php");exit();

  }

  ?>

 <!DOCTYPE html>
  <html>
    <head><title>Edit Product</title></head>
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

<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<!--     <script type="text/javascript" src="js/addproduct.js"></script>
 -->      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript" src="js/jquery.form.min.js"></script>
      <script type="text/javascript" src="js/editproduct.js"></script>
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
          <li  class="bold"><a class="waves-effect waves-teal sidenava" href="categorypage.php?cid=Electronics And Home Appliances">Electronics & Appliances</a></li>
          <li  class="bold"><a class="waves-effect waves-teal sidenava" href="categorypage.php?cid=Furniture">Furniture</a></li>
          <li  class="bold"><a class="waves-effect waves-teal sidenava" href="categorypage.php?cid=Bikes And Scooters">Bikes & Scooters</a></li>
          <li  class="bold"><a class="waves-effect waves-teal sidenava" href="categorypage.php?cid=Power Tools">Power Tools</a></li>
          <li  class="bold"><a class="waves-effect waves-teal sidenava" href="categorypage.php?cid=Musical Instruments">Musical Instruments</a></li>
          <li  class="bold"><a class="waves-effect waves-teal sidenava" href="categorypage.php?cid=Baby Accessories And Toys">Baby Accessories & Toys</a></li>
          <li  class="bold"><a class="waves-effect waves-teal sidenava" href="categorypage.php?cid=Others">Others</a></li>
        </ul>
      </ul>
     <div class="">
     <nav>
      <a href="#" data-activates="slide-out " class="button-collapse"><i class="mdi-navigation-menu"></i></a>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center">Rent Out Item</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']): ?>
        <?php if(getimagesize('http://localhostimages/profile_pics/'.$_SESSION['uid'].".png")!==false): ?><li><img style="height:50px;width:50px;"src=<?php echo "images/profile_pics/".$_SESSION['uid'].".png";?> class="circle propic" onerror="this.src='images/logo.png';"><?php else:?><li><img style="height:50px;width:50px;"src="images/logo.png" class="circle propic"><?php endif;?></li><li style="padding-left:10px;"><?php echo $_SESSION["name"];?></li></li><li><a href="#" data-activates="drop" class="dropdown-button  dropdown-button1 disableClick"><i class="material-icons ">arrow_drop_down</i></a></li> 
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


  <?php


  

  $pid=$_GET['pid'];
  

  $pname='';
  $category='';
  $location='';
  $alternate_address='';
  $description='';
  $price_week='';
  $price_month='';
  $price_day='';
  $actual_price='';
  $bond=0;
 

$query="SELECT pname,category,location,alternate_address,description,bond,price_week,price_month,price_day,actual_price FROM Product WHERE product_ID=?";

 if($stmt = $conn->prepare($query)) // prepate a query
 {
   $stmt->bind_param('i', $pid); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
    $stmt->execute(); // actually perform the query
    $stmt->bind_result($pname,$category,$location,$alternate_address,$description,$bond,$price_week,$price_month,$price_day,$prod_price);
   $stmt->fetch();

   
}
?>
<div class="row">
  <div class="card-panel col s10 offset-s1 m8 offset-m3" style="padding: 20px;">
        <form id="editform" action='editprod2.php' method="post" >
        <br>

        <div class="row">
        
         
          <div class="col s12 m8 offset-m1"> <h4>Edit Product</h4>
           <hr>
        
          </div>
         
        
        <div>
            <br><br>
          
           
            
              <div class="row">
                    
                            <div class="input-field col m4 s12 offset-m1 ">
                            <i class="small material-icons prefix" style="color:black;">shop</i>
                      <input hidden  name="pid" type="text" class="validate" length="25" value = '<?php echo $pid; ?>' >
                      <input disabled  name="pname" type="text" class="validate" length="25" value = '<?php echo $pname; ?>' >
<!--                       <label for="pname">Product Name</label>
 -->                  </div>
                         
                  </div>
                     
                  <div class="row">
                        
                  <div class="col s12 m4 offset-m1 ">
                  
                          <label>Product Category</label> 

                  <select disabled>
                      <option value="" disabled selected><?php echo $category; ?></option>
                      <option value="Electronics And Home Appliances">Electronics And Home Appliances</option>
                        <option value="Furniture">Furniture</option>
                      <option value="Bikes & Scooters">Bikes & Scooters</option>
                      <option value="Power Tools">Power Tools</option>
                      <option value="Adventure">Adventure</option>
                      <option value="Musical Instruments">Musical Instruments</option>
                      <option value="Baby accessories and toys">Baby accessories and toys</option>

                  </select>
                  </div>

                <div class="col s12 m4 offset-m2">
                
                          <label>Product Location</label>

          <select name="location"  class="col s9 " required>
            <option value="<?php echo $location;?>"  selected>Location</option>
            <option value="Kochi">Kochi</option>
            <option value="Chennai">Chennai</option>
            <option value="Bangalore">Bangalore</option>
            <option value="Other">Other</option>
          </select>       
                
                </div>
                    </div>
            
                  <br>

           

                       

              
                  

                    <div class="row">
                  
                  <div class="input-field col s12 m10 offset-m1">
                  <i class="material-icons prefix"style="color:black;">description</i>
                  <textarea name="description" id="description" class="materialize-textarea" length="200"><?php echo $description; ?></textarea>
                  <label for="description">Product Description</label>
                  </div>
                    </div>
                    

                    <div class="row">
                  
                  <div class="input-field col s12 m10 offset-m1">
                  <i class="material-icons prefix"style="color:black;">picture_in_picture</i>
                  <textarea name="address" id="address" class="materialize-textarea" length="200"><?php echo $alternate_address; ?></textarea>
                  <label for="address">Alternate Address (optional)</label>
                  </div>
                    </div>
                  
                     <div class="row">
                        <div class="input-field col s0 offset-s1">
                              <h5>&#8377;</h5>
                            </div>
                            <div class="input-field col s7 m2  ">
                              <input disabled value=<?php echo $prod_price; ?> name="prod_price" type="text" id="prod_price" class="validate">
                              <label for="prod_price">Product Price</label>
                     </div>
                     </div>
                    
                        <div class="row">
                            <div class="input-field col s0 offset-s1">
                              <h5>&#8377;</h5>
                            </div>
                            
                            <div class="input-field col s7 m2  ">
                               
                      <input value=<?php echo $price_day; ?> name="drent" id="price_day" type="number" min="0" class="validate" size="4">
                      <label for="price_day">Daily Rent</label>
                  </div>

                  <div class="input-field col s0 offset-s1 offset-m1">
                              <h5>&#8377;</h5>
                            </div>
                            <div class="input-field col s7 m2">
                               
                      <input value=<?php echo $price_week; ?> name="wrent" id="price_week" type="number" min="0" class="validate" size="4">
                      <label for="price_week">Weekly Rent</label>
                  </div>

                  <div class="input-field col s0 offset-s1">
                              <h5>&#8377;</h5>
                            </div>
                            <div class="input-field col s7 m2 ">
                              
                      <input value=<?php echo $price_month; ?> name="mrent" id="price_month" type="number" min="0" class="validate" size="4">
                      <label for="price_month">Monthly Rent</label>
                  </div>
                        </div>

                        <div class="row">
                        <div class="input-field col s1 m1 offset-s1 offset-m1">
              <input type="checkbox" class="filled-in" <?php if($bond=='1') echo"checked";else echo"";?> name="bond" id="bond" value="1" >
                  <label for="bond">Bond</label>
                        </div>
                        
                        </div>  
                       
                                       
                    <br><br>

                  <div class="row">
                    <div class="col s2 m2 offset-s3 offset-m5">
                                <button    id="submit" value="Submit" class="waves-effect waves-light btn " >Submit</button>
                    </div>
                </div>
 

  				<!-- <div id="submit" class="modal" style="width:500px;">
					<div class="modal-content">
					
					<center style="padding-top: 30px;">
					  <div id='bigload' class="preloader-wrapper big active" >
						<div class="spinner-layer spinner-blue-only">
						  <div class="circle-clipper left">
							<div class="circle"></div>
						  </div><div class="gap-patch">
							<div class="circle"></div>
						  </div><div class="circle-clipper right">
							<div class="circle"></div>
						  </div>
						</div>
					  </div>
					  <div class="row terms">
						<p>Terms and conditions</p>
					  </div>
					  <div class="row hide">
						<p>Response Messages</p>
					  </div>
					</center>
					    <div class="modal-footer" id="modfooter1">
      <button class="btn-flat waves-effect waves-darken modal-close modalButton terms"><a href="#!" class=" red-text "><i class="material-icons left">not_interested</i> Disagree</a></button>
      <button class="btn-flat waves-effect waves-darken modalButton terms" id="processingBut"><a href="#!" class="green-text text-darken-4"><i class="material-icons left">done</i>Agree</a></button> 
    </div>


					</div>
					
				</div> -->

    
    <div id="success" class="modal" style="width:500px;" >
    <div class="modal-content">
    <center style="padding-top: 30px; padding-left: 70px">
    <strong><center id="cerror" style="color: red"></center></strong>              
      <center><p id="message" >The product was successfully edited</p></center>
    </div>
    </center>
    <div class="modal-footer" style="padding-right: 30px; padding-bottom:30px;">
            <button id="done" class="btn-flat waves-effect waves-light right"><a href="#" class="green-text text-darken-4">ok</a><i class="material-icons activator right">done</i></button>
           </div>
         </div>

          
         
         

         </form>

  </div>
  </div>



</body>
</head>
</html>

