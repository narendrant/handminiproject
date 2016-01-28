<?php
require_once 'db.php';  
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$conn = new mysqli($servername, $username, $password, $dbname);
	$username=$_POST['username'];
	$psswrd=$_POST['password'];
	$sql = "SELECT password FROM User WHERE email=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('s',$username);	
	$stmt->execute();
	$temp='';
	$stmt->bind_result($temp);
	if($stmt->fetch()){
		$stmt->fetch();
	if (password_verify($psswrd,$temp)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
}else{echo $stmt->num_rows();}
	$stmt->close();
	$conn->close();

}

