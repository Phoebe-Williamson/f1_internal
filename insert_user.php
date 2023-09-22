<?php
	include '../f1_mysqli.php';

$Uname = $_POST['Username'];
$Pass = $_POST['Password'];

$bcrypt_password = password_hash($Pass, PASSWORD_BCRYPT);

$insert_user = "INSERT INTO Users (Username, Password) VALUES ('$Uname', '$bcrypt_password')";

if(!mysqli_query($conn, $insert_user)) {
echo 'Account not created';
} else {
echo 'Account Created';
}
header("refresh:2, url = login.php");


?> 
