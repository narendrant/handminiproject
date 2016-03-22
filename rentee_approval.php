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
		    $type='1'; 
			$sql = "UPDATE Transaction SET type=? WHERE transaction_ID=?;";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param('ss',$type,$tid);
			if($stmt->execute())
				$result='success';
			else
				$result='error';

		}
 }

 echo $result;
 $stmt->close();
 $conn->close();
?>