<!DOCTYPE html>
<?php
	// starts session and include db connection
	session_start();
	include '../f1_mysqli.php';

		
$update_track = "UPDATE Track SET TrackName='".$_POST['TrackName']."', Location='".$_POST['Location']."', Circuit_Length='".$_POST['Circuit_Length']."', Total_distance='".$_POST['Total_distance']."', N_Laps='".$_POST['N_Laps']."', First_GP='".$_POST['First_GP']."', LR_Time='".$_POST['LR_Time']."', DriverID='".$_POST['DriverID']."', Corners='".$_POST['Corners']."', Drs_zones='".$_POST['Drs_zones']."', TrackImage='".$_POST['TrackImage']."', CircuitImage='".$_POST['CircuitImage']."' WHERE TrackID='".$_POST['TrackID']."'";

		
		if(!mysqli_query($conn, $update_track)) {
			echo 'Not updated track table '.mysqli_error($conn);
			header("refresh:15, url=add_page.php");
		} else {
			echo 'Updated track table';
			header("refresh:2, url=add_page.php");
		}	
		

	?>	
