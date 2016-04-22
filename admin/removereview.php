<?php
 session_start();
	require_once 'db.php';

	if($_SERVER ["REQUEST_METHOD"]=="POST")
	{
		$review_ID=$_POST['reviewid'];
		echo $pid;

		$sql="DELETE FROM Review WHERE review_ID=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('s',$review_ID);
		$stmt->execute();

		$stmt->close();

		
       header("Location: adminreview.php");


	}

?>
