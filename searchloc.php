<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'db.php';
$pname='test';
$pid='';
$num_rows=0;
$keyword=$loc=null;
$result= '';    
$keyword=$_POST['keyword'];
    if(isset($_POST['loc']) && ($_POST['loc']!='LOCATION')){
    $query= "SELECT pname,category,product_ID FROM Product WHERE location = ? AND pname LIKE ? OR description LIKE ? OR category LIKE ?  ORDER BY rating DESC";
    $loc=$_POST['loc'];
		$stmt=$conn->prepare($query);
    //echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    $param="%".$keyword."%";		
    $stmt->bind_param('ssss',$loc,$param,$param,$param);	
		$stmt->execute();
		$category='';
		$stmt->bind_result($pname,$category,$pid);
		//$result='';
       	$num_rows=0;
   		 while($stmt->fetch())
   		 {
   		 	$num_rows++;
      $result=$result."<a href='product.php?pid=".$pid."'  ><li  class='bold' style='float:left;text-align:justify; padding-left:20px;'>".$pname."</li></a><br><li class='divider'></li><br>";
   		}
   		if ($num_rows==0) {
        echo "<li class='bold ' style='float:left;text-align:justify; padding-left:20px;'>No Results</li><br><li class='divider'></li><br>";
   		}
   	 }
   	 else 
   	 {
   	$query="SELECT pname,category,product_ID FROM Product WHERE pname LIKE ? OR description LIKE ? OR category LIKE ? ORDER BY rating DESC";
		$stmt=$conn->prepare($query);
    $param="%".$keyword."%";
		$stmt->bind_param('sss',$param,$param,$param);	
		$stmt->execute();
		$category='';
		$stmt->bind_result($pname,$category,$pid);
		$result='';
   		 while($stmt->fetch())
   		 {
   		 	$num_rows++;		
      $result=$result."<a href='product.php?pid=".$pid."'  ><li  class='bold' style='float:left;text-align:justify; padding-left:20px;'>".$pname."</li></a><br><li class='divider'></li><br>";
   		if ($num_rows==5) {
     echo $result;exit();   	 
      }
      }
   		if ($num_rows==0) {
   			echo "<li class='bold ' style='float:left;text-align:justify; padding-left:20px;'>No Results</li><br><li class='divider'></li><br>";
   			exit();
   		}
    }
     echo $result;   	 
 ?>
 
