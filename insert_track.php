<!DOCTYPE html>
<?php
	// starts session and include db conn
	session_start();
	include '../f1_mysqli.php';

$TrackName = $_POST['TrackName'];
$Location = $_POST['Location'];
$Circuit_Length = $_POST['Circuit_Length'];
$Total_distance = $_POST['Total_distance'];
$N_Laps = $_POST['N_Laps'];
$First_GP = $_POST['First_GP'];
$LR_Time = $_POST['LR_Time'];
$DriverID = $_POST['DriverID'];
$Corners = $_POST['Corners'];
$Drs_zones = $_POST['Drs_zones'];
$TrackImage = $_POST['TrackImage'];
$CircuitImage = $_POST['CircuitImage'];
		
// query to insert track
$insert_track = "INSERT INTO Track (TrackName, Location, Circuit_Length, Total_distance, N_Laps, First_GP, LR_Time, DriverID, Corners, Drs_zones, TrackImage, CircuitImage) VALUES ('$TrackName', '$Location', '$Circuit_Length', '$Total_distance', '$N_Laps', '$First_GP', '$LR_Time', '$DriverID', '$Corners', '$Drs_zones', '$TrackImage', '$CircuitImage') ";
		
//if track insertion fails
if (!mysqli_query($conn, $insert_track)) {
	echo 'Track insertion failed: ' . mysqli_error($conn);
	header("refresh:15, url=add_page.php");
	} else { // if track insertion works
		echo 'Track added';
		header("refresh:3, url=add_page.php");
	}
?>
