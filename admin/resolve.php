<?php
 session_start();
	require_once 'db.php';

	if($_SERVER ["REQUEST_METHOD"]=="POST")
	{
		$pid=$_POST['pid'];
		//echo $pid;

		$sql="DELETE FROM Transaction WHERE p_ID=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('s',$pid);
		$stmt->execute();

		$stmt->close();

		//$date=date('Y-m-d H:i:s');
		//echo $date;

		$sql="UPDATE History SET type='2' WHERE p_ID=? AND type='1'";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('s',$pid);
		$stmt->execute();

		$stmt->close();

		$sql="UPDATE Product SET availability='0' WHERE product_ID=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('s',$pid);
		$stmt->execute();

        $stmt->close();
        //echo "success";
       header("Location: complaint.php");


	}

?>
