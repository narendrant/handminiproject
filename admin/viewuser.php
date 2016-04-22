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

<head>
<title>View User</title>
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

<body>

<nav>
		<div class="nav-wrapper">
		  <a href="/admin/home.php" class="brand-logo">&nbsp;Admin Page</a>
       <a href="/admin/adlogin.php" class="brand-logo right" onclick="logout()" style="font-size: 20px">logout</a>
		</div>
	</nav><br><br>
<?php

  $location=$_SESSION['location'];
  //$location="Kochi";

if ($conn->connect_error) {
    die('Connection failed: '.$conn->connect_error);
}

    $sql = "SELECT * FROM User WHERE city='$location'";
    $result = $conn->query($sql);

	echo '<div class="row"><div class="col m8 s12 offset-m2">
        <h4>User Details</h4><br>
        <table class="highlight bordered centered responsive-table">
        <thead>
          <tr>
			        <th data-field="uid">User ID</th>
              <th data-field="name">Name</th>
              <th data-field="email">Email</th>
              <th data-field="city">City</th>
              <th data-field="pin">PIN</th>
              <th data-field="state">State</th>
              <th data-field="phone">Phone</th>
              <th data-field="action">Action</th>
              <th data-field="action">Action</th>
             
          </tr>
        </thead><tbody>';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
		 echo '
          <tr>
			<td>'.$row['user_ID'].'</td>'.
            '<td>'.$row['fname'].'</td>'.
            '<td>'.$row['email'].'</td>'.
            '<td>'.$row['city'].'</td>'.
            '<td>'.$row['PIN'].'</td>'.
            '<td>'.$row['state'].'</td>'.
            '<td>'.$row['phone'].'</td>'.
			'<td><form action="edituser.php" method="post"><input type="hidden" name="user_ID" value='.$row['user_ID'].'>
			<input type="hidden" name="user_ID" value='.$row['user_ID'].'>
			<input type="hidden" name="fname" value='.$row['fname'].'>
			<input type="hidden" name="lname" value='.$row['lname'].'>
			<input type="hidden" name="email" value='.$row['email'].'>
			<input type="hidden" name="city" value='.$row['city'].'>
			<input type="hidden" name="PIN" value='.$row['PIN'].'>
			<input type="hidden" name="state" value='.$row['state'].'>
			<input type="hidden" name="phone" value='.$row['phone'].'>
			<input type="hidden" name="password" value='.$row['password'].'>
			<input type="hidden" name="address" value='.$row['address'].'>
			
			<button type="submit" name="user_ID" value='.$row['user_ID'].' class="status waves-effect waves-light btn white" style="border:2px solid teal;border-radius:25px;"><span style="color:teal;">Edit</span></button></form></td>
		
			
         <td><form action="update.php" method="post">
                
                <button type="submit" name="remove" value='.$row['user_ID'].' class="status waves-effect waves-light btn white" style="border:2px solid #EE6E73;border-radius:25px;"><span style="color:#EE6E73;">Remove</span></button>
          </form></td>

          <td><form action="usermail.php" method="post">
                
          <!--      <button type="submit" name="mail" value='.$row['email'].' class="status waves-effect waves-light btn white" style="border:2px solid #5899df;border-radius:25px;"><span style="color:#5899df;">EMAIL</span></button>
           </form></td> -->
          </tr>';
		 
		}
        echo '</tbody>';
      echo '</table></div></div></div>';
	  
   } 

   else 
   {
        echo "<div class='row'>
        <div class='col m8 s12 '>
        <h6>No Users to display!</h6></div></div>";
    }
     $conn->close();
?>

</body>
</html>
