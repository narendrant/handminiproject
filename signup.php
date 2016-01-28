<?php
require_once 'db.php';  
$conn = new mysqli($servername, $username, $password, $dbname);
$username="handminiproject";
$psswrd="handminiproject";
$psswrd=password_hash($psswrd, PASSWORD_DEFAULT);
$fname='harikishen';
$lname='h';
$address='test';
$city='test';
$PIN='test';
$state='test';
$phone='test';
$sql = "INSERT INTO User(password,fname,lname,address,city,PIN,state,email,phone)
VALUES (?,?,?,?,?,?,?,?,?);";
$stmt=$conn->prepare($sql);
$stmt->bind_param('sssssssss',$psswrd,$fname,$lname,$address,$city,$PIN,$state,$username,$phone);
$stmt->execute();
$stmt->close();
$conn->close();
?>
