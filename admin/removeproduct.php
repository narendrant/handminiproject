<?php
 session_start();
	require_once 'db.php';
	
	if($_SERVER ["REQUEST_METHOD"]=="POST")
	{	
		$product_ID=$_POST['delete'];
		$sql="DELETE FROM Product WHERE product_ID=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('s',$product_ID);
		$stmt->execute();

		$stmt->close();
		
		
       header("Location: adminproduct.php");

    }   
?>
