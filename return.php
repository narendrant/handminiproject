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
		    $type='2'; 
		    $uid=$_SESSION['uid'];
		    $pid='';
		    $rent_time=''; 
		    $sql1="SELECT p_ID,transaction_time FROM Transaction WHERE transaction_ID=?";
			$sql2="INSERT INTO History(u_ID,p_ID,rent_time,type)VALUES(?,?,?,'1');";
			$stmt=$conn->prepare($sql1);
			$stmt->bind_param('s',$tid);
			$stmt->execute();
			$stmt->bind_result($pid,$rent_time);
			$stmt->fetch();
			$stmt->close();
			$stmt=$conn->prepare($sql2);
			$stmt->bind_param('sss',$uid,$pid,$rent_time);
			$stmt->execute();
			$stmt->close();
			$sql = "UPDATE Transaction SET type=? WHERE transaction_ID=?;";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param('ss',$type,$tid);
			if($stmt->execute())
				$result='returned';
			else
				$result='error';

		}
 }

 echo $result;
 $stmt->close();
 $conn->close();
?>