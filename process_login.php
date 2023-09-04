<?php
session_start();
include '../f1_mysqli.php';

$user = trim($_POST['Username']);
$pass = trim($_POST['Password']);

$login_query = "SELECT Password FROM Users WHERE Username = '". $user."'";
$login_result = mysqli_query($conn, $login_query);
$login_record = mysqli_fetch_assoc($login_result);

$hash = $login_record['Password'];

echo $hash;

$verify = password_verify($pass, $hash);
if ($verify) {
$_SESSION['Logged_in'] =1;
$_SESSION['username'] = $user;
    header("Location: home.php");
} else {
    echo 'uh oh';
}
?>
