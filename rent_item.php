<?php
require_once 'db.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_SERVER["REQUEST_METHOD"] == "POST"){ 
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==TRUE) {
		$pid=$_POST['pid'];
		$uid=$_SESSION['uid'];
		$puid='';
    	$availability='';
    	$type='0';
    	$query= "SELECT availability,u_ID FROM Product WHERE product_ID=?";
		$stmt=$conn->prepare($query);		
	    $stmt->bind_param('s',$pid);	
		$stmt->execute();
		$stmt->bind_result($availability,$puid);
		$num_rows=0;
		if ($stmt->fetch()) {
			$num_rows++;
			if ($puid==$uid) {
				# code...
				echo"notallowed";exit();
			}
		}
		if ($num_rows==0) {
			echo "notfound".$pid;
			exit();
		}
		if ($availability==0) {
			echo "notavailable";
			exit();
		}	
		$stmt->close();
		$conn->close();	
		$conn = new mysqli($servername, $username, $password, $dbname);
		$sql = "INSERT INTO Transaction(u_ID,p_ID,type)VALUES(?,?,?);";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('sss',$uid,$pid,$type);
		$stmt->execute();
		$availability=0;
		$sql = "UPDATE Product SET availability=? WHERE product_ID=?; ";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('is',$availability,$pid);
		$stmt->execute();
		$stmt->close();
		$conn->close();
		echo "success";
}else{
	echo"notloggedin";
	exit();
	}
}
?>