<?php
require_once 'db.php';
//require_once 'uploads.php';
session_start();
   if (!(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==TRUE)) {
   		$renterror='You are not logged in';}
$pid=$_POST['pid'];
$uiddb='';
$uid=$_SESSION['uid'];
if($_SERVER["REQUEST_METHOD"] == "POST"){

$query="SELECT u_ID FROM Product WHERE product_ID=?";

 if($stmt = $conn->prepare($query)) // prepate a query
 {
   $stmt->bind_param('i', $pid); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
    $stmt->execute(); // actually perform the query
    $stmt->bind_result($uiddb);
   $stmt->fetch();
   // if (!($uiddb==$uid)) {
   	// $renterror=$renterror.'<br>You Can\'t edit this product';
   // }
   $stmt->close();
   
}

$description=$_POST['description'];
	$drent=$_POST['drent'];
	$wrent=$_POST['wrent'];
	$mrent=$_POST['mrent'];
	
	
	$location=$_POST['location'];
	$alt_address=$_POST['address'];

	if($_POST['bond']==1)
		$bond=$_POST['bond'];
	else
		$bond=0;
	

	
	if ($drent<0) {
		$renterror=$renterror.'<br>Invalid Daily Rent';
	}
	if ($wrent<0) {
		$renterror=$renterror.'<br>Invalid Weekly Rent';
	}
	if ($mrent<0) {
		$renterror=$renterror.'<br>Invalid Monthly Rent';
	}

if ($renterror=='') {	

 $query= "UPDATE Product set description=?, price_day=?,price_week=?,price_month=?,location=?,alternate_address=?,bond=? WHERE product_ID=?";
 $stmt=$conn->prepare($query)or die("Connection failed ". mysqli_error());
 $stmt->bind_param("ssssssss",$description,$drent,$wrent,$mrent,$location,$alt_address,$bond,$pid);
 $stmt->execute() or die("Connection failed ". mysqli_error());
 
    $stmt->close();


	//echo "success";
	header("Location: /admin/adminproduct.php");
	}else{
	echo "error";
	echo $renterror;

	// header("Location: index.php");		
	}	

}
	$conn->close();
?>
