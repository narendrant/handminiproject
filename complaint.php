<?php
  session_start();
  require_once 'db.php';

  $tid='';
  $uid='';
  $pid='';
  $title='';
  $description='';
  $result='';


   $tid=$_POST['tid'];
   // $pid=$_POST['pid'];
   $uid=$_SESSION['uid'];

  if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if(isset($_POST['title']))
		$title=$_POST['title'];

	if(isset($_POST['description']))
		$description=$_POST['description'];

	$sql= "SELECT p_ID FROM Transaction WHERE transaction_ID=?";
	$stmt=$conn->prepare($sql);
    $stmt->bind_param('i',$tid);
    $stmt->execute();
    $stmt->bind_result($pid);
    $stmt->fetch();
	$stmt->close(); 


	$sql= "SELECT u_ID FROM Product WHERE product_ID=?";
	$stmt=$conn->prepare($sql);
    $stmt->bind_param('i',$pid);
    $stmt->execute();
    $stmt->bind_result($u_ID);
    $stmt->fetch();
	$stmt->close(); 
	   
    if($u_ID==$uid)
    {	
    	//echo $u_ID;
		$sql = "INSERT INTO Complaint(t_ID,title,description)VALUES (?,?,?);";
    	$stmt=$conn->prepare($sql)or die("Connection failed ". mysqli_error($conn));
    	$stmt->bind_param('iss',$tid,$title,$description);
    	$stmt->execute()or die("Connection failed ". mysqli_error($conn));
    	echo "success";
    
    }

    else
    	echo "Error";

    $stmt->close();
    $conn->close();
}
?>
