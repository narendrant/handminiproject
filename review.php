<?php
require_once 'db.php';
//require_once 'uploads.php';
session_start();

$pid='';
$tid='';
$uid='';
$title='';
$description='';
$rating='';
$reviewerror='';
$rating=0; 
 $pid=$_POST['pid'];
 $uid=$_SESSION['uid'];

if (!(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==TRUE)) {
   	$renterror='You are not logged in';}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(isset($_POST['title']))
		$title=$_POST['title'];

	if(isset($_POST['description']))
		$description=$_POST['description'];

	if(isset($_POST['rating']))
		$rating=$_POST['rating'];

	
	if ($rating<0) {
		$reviewerror=$reviewerror.'<br>Invalid Rating';
	}
$uiddb='';
$uid=$_SESSION['uid'];
$query="SELECT u_ID FROM Product WHERE product_ID=?";
 if($stmt = $conn->prepare($query)) // prepate a query
 {
   $stmt->bind_param('i', $pid); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
    $stmt->execute(); // actually perform the query
    $stmt->bind_result($uiddb);
   $stmt->fetch();
   if ($uiddb==$uid) {
    $reviewerror=$reviewerror.'<br>You Can\'t review this product';
   }
   $stmt->close();
   
}

	$ratingdb=0;
    $sql = "SELECT rating FROM Product WHERE product_ID=?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param('i',$pid);
    $stmt->execute();
    $stmt->bind_result($ratingdb);
    $stmt->fetch();
    if ($ratingdb!=-1) 
	    $ratingdb=($ratingdb+$rating)/2;
	else
		$ratingdb=$rating;
    $stmt->close();
	$sql = "UPDATE Product SET rating=? WHERE product_ID=?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param('si',$ratingdb,$pid);
    $stmt->execute();
    $stmt->close();

    $sql = "INSERT INTO Review(u_ID,p_ID,title,description,rating)VALUES (?,?,?,?,?);";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param('iissi',$uid,$pid,$title,$description,$rating);
    $stmt->execute();

    $stmt->close();
    $conn->close();
if ($reviewerror=='') {
	echo "success";
}

}
?>