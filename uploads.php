<?php
function upload_prof_image(){
				$target_dir = "images/profile_pics/";
			$target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			//echo $_FILES["profile_pic"]["name"];
			// Check if image file is a actual image or fake image
			if(isset($_POST["profile_pic"])) {
    			$check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
    			if($check !== false) {
        			//echo "File is an image - " . $check["mime"] . ".";
        			$uploadOk = 1;
    			} else {
        			return "success";
        			$uploadOk = 0;
        			exit();
    			}
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    //echo "Sorry, file already exists.";
    			$uploadOk = 1;
			}
			// Check file size
			if ($_FILES["profile_pic"]["size"] > 1000000) {
    			return "Image Too Large";
    			$uploadOk = 0;
    			exit();
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "" ) {
    			return "This image format is not allowed.";
    			exit();
    			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    			$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
    			return "failed";
    			exit();
    			//echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
        			return "success";
    			}
			}

function upload_prod_images($pid){

	$error='';
    $extension=array("jpeg","jpg","png","gif");
    $i=0;
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
            {
            	$i++;
                $file_name=$_FILES["files"]["name"][$key];
                $file_tmp=$_FILES["files"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                if(in_array($ext,$extension))
                {
			if ($_FILES["files"]["tmp_name"][$key]["size"] > 1000000) {
    			return "Image Too Large";
			}
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"images/products/".$i."/".$pid);
                }
                else
                {
                	return "Unsupported Format";
                }
            }
            if($i==0)
            	return "Upload Atleast One Image";
            return "";


}
?>