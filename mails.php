<?php 
function signup_mail($To,$fname){
$To = 'hari751995@gmail.com'; 
$Subject = 'Welcome to Online Product Rental Portal'; 
$Message = "Dear ".$fname.","."<br>"."	 Welcome. You have signed up to handminiproject."; 
$Headers = "From: handminiproject@gmail.com \r\n" . 
"Reply-To: handminiproject@gmail.com \r\n" . 
"Content-type: text/html; charset=UTF-8 \r\n"; 

mail($To, $Subject, $Message, $Headers); 
}
?>