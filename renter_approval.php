<?php
  session_start();
  require_once 'db.php';
  $result='';
  if (!(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==TRUE)) {
  	$result='notloggedin';
  }
 else{
		if($_SERVER["REQUEST_METHOD"] == "POST"){
		    $tid=$_POST['tid'];
		    $uid=$_SESSION['uid'];
		    $pid='';
		    $rent_time='';
		    $type='rented'; 
			$sql3 ="DELETE FROM Transaction WHERE transaction_ID=?;";
			$stmt=$conn->prepare($sql3);
			$stmt->bind_param('s',$tid);
			if($stmt->execute())
				$result='returned';
			else
				$result='error';
			$stmt->close();
			$sql = "UPDATE Product SET availability='1' WHERE product_ID=?; ";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param('is',$availability,$pid);
			$stmt->execute();
			
			$stmt->close();
			$sql = "UPDATE History SET type='2' WHERE transaction_ID=?;";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param('s',$type,$tid);
			$stmt->execute();
		}
 }

 echo $result;
 $stmt->close();
 $conn->close();
?>