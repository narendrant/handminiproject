<?php 
function signup_mail($To,$fname){ 
$Subject = 'Welcome to Online Product Rental Portal'; 
$Message = "Dear ".$fname.","."<br>"."	 Welcome. You have signed up to handminiproject."; 
$Headers = "From: handminiproject@gmail.com \r\n" . 
"Reply-To: handminiproject@gmail.com \r\n" . 
"Content-type: text/html; charset=UTF-8 \r\n"; 

mail($To, $Subject, $Message, $Headers); 
}
function addproduct_mail($To,$fname,$pname){ 
$Subject = 'New Product Rented Out'; 
$Message = "Dear ".$fname.","."<br>"."Your product".$pname." has been successfully rented out. Please visit http://localhost/handminiproject/myaccount.php to view, edit or delete the product. Please reply to this mail if you have anymore queries regarding this."; 
$Headers = "From: handminiproject@gmail.com \r\n" . 
"Reply-To: handminiproject@gmail.com \r\n" . 
"Content-type: text/html; charset=UTF-8 \r\n"; 

mail($To, $Subject, $Message, $Headers); 
}

?>