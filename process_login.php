<!DOCTYPE html>
<html lang="en">
	<?php
		// Start a new session and includes db connection
		session_start();
		include '../f1_mysqli.php';

		// Trims any whitespace from the Username and Password
		$user = trim($_POST['Username']); 
		$pass = trim($_POST['Password']); 

		// query to retrieve the hashed password from the Users table
		$login_query = "SELECT Password FROM Users WHERE Username = '". $user."'";
		$login_result = mysqli_query($conn, $login_query); // Execute the query
		$login_record = mysqli_fetch_assoc($login_result); // Fetch the result as an associative array

		// Extract the hashed password from the query result
		$hash = $login_record['Password'];

		// Checks to see if the entered password against the stored hashed password
		$verify = password_verify($pass, $hash);

		// checks if the passwords match (successful login)
		if ($verify) {
			// Set session variables to indicate the user is logged in
			$_SESSION['Logged_in'] = 1;
			$_SESSION['Username'] = $user;

			// If password matches (correct login), redirects and and says login successful
			header("Location: congrats.php");
		} else {
			// If the passwords do not match (failed login), it redirects and says login unsuccceful
			header("Location: error2.php");
		}
	?>
