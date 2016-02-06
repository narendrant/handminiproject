<?php
require_once 'db.php';
require_once 'uploads.php';
require_once 'mails.php';
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){  
	$email=$_POST['email'];
	$psswrd=$_POST['password'];
	$psswrd=password_hash($psswrd,PASSWORD_DEFAULT);
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$address=$_POST['address'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$pin=$_POST['pin'];
	$phone=$_POST['phone'];
	$sql = "SELECT user_ID FROM User WHERE email=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('s',$email);	
	$stmt->execute();
	$result='';
	$stmt->bind_result($result);
	if($stmt->fetch()){
		echo "Email ID Already Exists !!!";
	}else{
		$image=upload_image();
		if($image!="success"){
			echo $image;
			exit();
		}
		$sql = "INSERT INTO User(password,fname,lname,address,city,PIN,state,email,phone)VALUES (?,?,?,?,?,?,?,?,?);";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('sssssssss',$psswrd,$fname,$lname,$address,$city,$pin,$state,$email,$phone);
		if(!$stmt->execute()){
			echo $stmt->error;
		}else{
			$sql = "SELECT user_ID,fname FROM User WHERE email=?";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param('s',$email);	
			$stmt->execute();
			$result='';
			$stmt->bind_result($result,$name);
			$stmt->fetch();
			move_uploaded_file($_FILES["profile_pic"]["tmp_name"],"images/profile_pics/".$result);
			$_SESSION['loggedin']=TRUE;
    		$_SESSION['uid']=$result;
    		$_SESSION['name']=$name;
    		signup_mail($email,$fname);
			echo "signedup";
		}
	}
	$stmt->close();
	$conn->close();
}else{
	header("Location: index.php");exit();
}
?>
