<?php
require_once 'db.php';
//require_once 'uploads.php';
session_start();
$delerror='';
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$pid=$_POST['pid'];
   if (!(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==TRUE)) {
   		$delerror='You are not logged in';}
$pid=$_POST['pid'];
$uiddb='';
$uid=$_SESSION['uid'];
$query="SELECT u_ID FROM Product WHERE product_ID=?";

 if($stmt = $conn->prepare($query)) // prepate a query
 {
   $stmt->bind_param('i', $pid); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
    $stmt->execute(); // actually perform the query
    $stmt->bind_result($uiddb);
   $stmt->fetch();
   if (!($uiddb==$uid)) {
   	$delerror=$delerror.'<br>You Can\'t delete this product';
   }
   $stmt->close();
   
}

if ($delerror=='') {
$query= "DELETE FROM Product WHERE product_ID=?";
 $stmt=$conn->prepare($query)or die("Connection failed ". mysqli_error());
 $stmt->bind_param("i",$pid);
 if($stmt->execute())
 	 echo "deleted";
 	else
 	 die("Connection failed ". mysqli_error());
 }else{
 	echo $delerror;
 }

}
 ?>