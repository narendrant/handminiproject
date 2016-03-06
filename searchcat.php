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
    if(isset($_POST['loc']) && ($_POST['loc']!='LOCATION') && isset($_POST['category'])){
    $query= "SELECT pname,product_ID FROM Product WHERE (location = ? AND category = ?) AND (pname LIKE ? OR description LIKE ?)  ORDER BY rating DESC";
    $loc=$_POST['loc'];
    $cat=$_POST['category'];
		$stmt=$conn->prepare($query);
    //echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    $param="%".$keyword."%";		
    $stmt->bind_param('ssss',$loc,$cat,$param,$param);	
		$stmt->execute();
		// $category='';
		$stmt->bind_result($pname,$pid);
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
     else if(isset($_POST['category']))
   	 {
   	$query="SELECT pname,product_ID FROM Product WHERE category = ? AND ( pname LIKE ? OR description LIKE ? ) ORDER BY rating DESC";
		$cat=$_POST['category'];
    $stmt=$conn->prepare($query);
    $param="%".$keyword."%";
		$stmt->bind_param('sss',$cat,$param,$param);	
		$stmt->execute();
		// $category='';
		$stmt->bind_result($pname,$pid);
		$result='';
   		 while($stmt->fetch())
   		 {
   		 	$num_rows++;		
      $result=$result."<li  class='bold' style='float:left;text-align:justify; padding-left:20px;'><a  href='product.php?pid=".$pid."'  >".$pname."</a></li><br><li class='divider'></li><br>";
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
 
