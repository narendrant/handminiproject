<?php
session_start();
require_once 'db.php';  
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$email=$_POST['email'];
	$psswrd=$_POST['password'];
	$sql = "SELECT user_ID,fname,password FROM User WHERE email=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('s',$email);	
	$stmt->execute();
	$result='';
	$uid='';
	$stmt->bind_result($uid,$name,$result);
	if($stmt->fetch()){
		if (password_verify($psswrd,$result)) {
    		$_SESSION['loggedin']=TRUE;
    		$_SESSION['uid']=$uid;
    		$_SESSION['name']=$name;
    		echo "loggedin";
		} else {
    			echo 'Invalid Password';
				}
	}else{
		echo 'No Such User';
	}
	$stmt->close();
	$conn->close();
}else{
	header("Location: index.php");exit();
}

?>