<?php
require_once 'db.php';
require_once 'uploads.php';
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==TRUE) {
	$pname=$_POST['pname'];
	$category=$_POST['category'];
	$description=$_POST['description'];
	$rpd=$_POST['drent'];
	$rpw=$_POST['wrent'];
	$rpm=$_POST['mrent'];
	$bond=$_POST['bond'];
	if ($bond=='on') {
		$bond=TRUE;
	}else{$bond=FALSE;}

	$location=$_POST['location'];
	$alt_address=$_POST['alt_address'];
	$uid=$_SESSION['uid'];
	$renterror='';
	if ($rpd<0) {
		$renterror=$renterror.'<br>Invalid Daily Rent';
	}
	if ($rpw<0) {
		$renterror=$renterror.'<br>Invalid Weekly Rent';
	}
	if ($rpm<0) {
		$renterror=$renterror.'<br>Invalid Monthly Rent';
	}
	$sql = "INSERT INTO Product(u_ID,pname,category,description,price_day,price_week,price_month,bond,location)VALUES(?,?,?,?,?,?,?,?,?);";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('sssssssss',$uid,$pname,$category,$description,$rpd,$rpw,$rpm,$bond,$location);
	if(!$stmt->execute()){
			echo $stmt->error;
		}
	$pid=$stmt->insert_id;
	$image=upload_prod_images($pid);
	if($image!="")
		$renterror=$renterror.'<br>'.$image;
	$stmt->close();
	$conn->close();
	if ($renterror!='') {
	$_SESSION['renterror']=$renterror;
	header("Location: addproduct.php");
	}else{
	header("Location: index.php");		
	}	
}
else{
	header("Location: index.php");
}
}
?>