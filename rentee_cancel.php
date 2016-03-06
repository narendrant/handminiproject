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
		    $availability=1;
		    $pid='';
		    $type='rented'; 
		    $sql1="SELECT p_ID FROM Transaction WHERE transaction_ID=?";
			$sql2="INSERT INTO History(u_ID,p_ID,type)VALUES(?,?,'0');";
			$sql3 ="DELETE FROM Transaction WHERE transaction_ID=?;";
			$stmt=$conn->prepare($sql1);
			$stmt->bind_param('s',$tid);
			$stmt->execute();
			$stmt->bind_result($pid);
			$stmt->fetch();
			$stmt->close();
			$stmt=$conn->prepare($sql2);
			$stmt->bind_param('ss',$uid,$pid);
			$stmt->execute();
			$stmt->close();
			$stmt=$conn->prepare($sql3);
			$stmt->bind_param('s',$tid);
			if($stmt->execute())
				$result='cancelled';
			else
				$result='error';
			$stmt->close();
			$sql = "UPDATE Product SET availability=? WHERE product_ID=?; ";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param('is',$availability,$pid);
			$stmt->execute();

		}
 }

 echo $result;
 $stmt->close();
 $conn->close();
?>