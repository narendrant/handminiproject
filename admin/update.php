<?php
include 'db.php';

if ($conn->connect_error) {
    die('Connection failed: '.$conn->connect_error);
}

if (isset($_POST['remove'])) {
    echo 'Command to delete user: '.$_POST['remove'];
    $sql = "DELETE FROM User WHERE user_ID = $_POST[remove]";
    $result = $conn->query($sql);
    if ($result) {
        //echo 'Deleted user: '.$_POST['user_ID'];
        header("Location: /admin/viewuser.php");
    }
}

if (isset($_POST['edit'])) {
    echo 'Command to edit user: '.$_POST['user_ID'];
    $sql = "UPDATE User SET fname = '$_POST[fname]',lname = '$_POST[lname]',address = '$_POST[address]',city = '$_POST[city]',PIN = '$_POST[pin]',state = '$_POST[state]',phone = '$_POST[phone]' WHERE user_ID = $_POST[user_ID]"; //add all fields here
	echo $sql;
    $result = $conn->query($sql);
    if ($result) {
        echo 'Updated user: '.$_POST['user_ID'];
    }
	header("Location:/admin/viewuser.php" );
}
?>
