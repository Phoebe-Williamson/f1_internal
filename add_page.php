<!DOCTYPE html>
<!-- Sets document language to english -->
<html lang="en">
<?php
	session_start();
	include '../f1_mysqli.php';
?>
<html>
	<head>
		<link rel="stylesheet" href="styles.css">
		<title>
			Formula 1 - Admin page
		</title>
	</head>

	<body>
		<header> 
			<div class="logo">
				<a class="two" href="home.php">
            		<img src="Images/F1-logo.png" alt="F1 logo" height="150" width="270">	
				</a>
			</div>
			<h1 class="title">
				Formula 1 - Admin page
			</h1>
			<div class="search">
				<h1>Search</h1>
				<form method="post">
					<input type="text" name="search">
					<input type="submit" name="submit" value="Search" class="search_button">
				</form>
				<?php				
					/* searches database to see if the input matches */
					if (isset($_POST['search'])) {
						$search = $_POST['search'];

						$search_query_fname = "SELECT DISTINCT b.Fname, b.Lname, d.DriverID, t.TeamName
											  FROM Bio b, Driver d, Team t
											  WHERE b.BioID = d.BioID
											  AND t.TeamID = d.TeamID
											  AND Fname LIKE '%$search%'";
						
						$search_query_lname = "SELECT DISTINCT b.Fname, b.Lname, d.DriverID, t.TeamName
											  FROM Bio b, Driver d, Team t
											  WHERE b.BioID = d.BioID
											  AND t.TeamID = d.TeamID
											  AND Lname LIKE '%$search%'";
						
						$search_query_DriverID = "SELECT DISTINCT b.Fname, b.Lname, d.DriverID, t.TeamName
											  FROM Bio b, Driver d, Team t
											  WHERE b.BioID = d.BioID
											  AND t.TeamID = d.TeamID
											  AND DriverID LIKE '%$search%'";
						
						$search_query_teamname = "SELECT DISTINCT b.Fname, b.Lname, d.DriverID, t.TeamName
											  FROM Bio b, Driver d, Team t
											  WHERE b.BioID = d.BioID
											  AND t.TeamID = d.TeamID
											  AND TeamName LIKE '%$search%'";
						

						$search_query_result1 = mysqli_query($conn, $search_query_fname);
						$search_query_result2 = mysqli_query($conn, $search_query_lname);
						$search_query_result3 = mysqli_query($conn, $search_query_DriverID);
						$search_query_result4 = mysqli_query($conn,$search_query_teamname);

						$count = mysqli_num_rows($search_query_result1) + mysqli_num_rows($search_query_result2) + mysqli_num_rows($search_query_result3) +mysqli_num_rows($search_query_result4);

						/* checks if there are any results from the search */
						if ($count == 0) {
							echo "There were no search results!";
						} else {
							/* prints search results */
							while ($row = mysqli_fetch_array($search_query_result1)) {
								echo "Driver and number: ";
								echo $row['Fname']." ".$row['Lname']." - ".$row['DriverID'];
								echo "<br>";
								echo "Team: ";
								echo $row['TeamName'];
								echo "<br>";
							}
						while ($row = mysqli_fetch_array($search_query_result2)) {
								echo "Driver and number: ";
								echo $row['Fname']." ".$row['Lname']." - ".$row['DriverID'];
								echo "<br>";
								echo "Team: ";
								echo $row['TeamName'];
								echo "<br>";
							}
						while ($row = mysqli_fetch_array($search_query_result3)) {
								echo "Driver and number: ";
								echo $row['Fname']." ".$row['Lname']." - ".$row['DriverID'];
								echo "<br>";
								echo "Team: ";
								echo $row['TeamName'];
								echo "<br>";
							}
						while ($row = mysqli_fetch_array($search_query_result4)) {
								echo "Driver and number: ";
								echo $row['Fname']." ".$row['Lname']." - ".$row['DriverID'];
								echo "<br>";
								echo "Team: ";
								echo $row['TeamName'];
								echo "<br>";
							}
						}
					}
							?>
			
			</div>
			<?php
			if((!isset($_SESSION['Logged_in'])) or $_SESSION['Logged_in'] !=1) {
				header("Location: error.php");
			}
			
			$username = $_SESSION['Username'];
			if(!$username){
				header("Location: error1.php");
			}
			
			$user_rank_query = "SELECT * FROM Users WHERE Username = '$username'";
			$user_rank_result = mysqli_query($conn, $user_rank_query);
			$user_rank_row = mysqli_fetch_assoc($user_rank_result);
			
			$user_rank = $user_rank_row['Rank']; //store the users rank as a variable
			$required_rank = "admin"; 
			
			if ($user_rank !== $required_rank) {
				header("Location: error1.php");
			}
			
			?>
			<div class="login">
				<?php
					if((!isset($_SESSION['Logged_in'])) or $_SESSION['Logged_in'] != 1){
					echo "Not logged in";
					echo "<a class='one' href='login.php'>Login</a>";
					}
					else {
					echo "Logged In: ".$_SESSION['Username'];
					echo "<a class='one' href='process_logout.php'>Logout</a>";
					
						$username = $_SESSION['Username'];
						
					$user_rank_query = "SELECT * FROM Users WHERE Username = '$username'";
					$user_rank_result = mysqli_query($conn, $user_rank_query);
					$user_rank_row = mysqli_fetch_assoc($user_rank_result);

					$user_rank = $user_rank_row['Rank']; //store the users rank as a variable
					$required_rank = "admin"; 
						
						if($user_rank == $required_rank){
							echo "<a class='one' href='add_page.php'>Admin</a>";
						}	
					}
				?>
			</div>
			<nav>
				<a class="one" href="home.php">Home</a>
				<a class="one" href="driver.php">Drivers</a>
				<a class="one" href="teams.php"> Teams</a>
				<a class="one" href="tracks.php"> Tracks</a>
    			<link rel="stylesheet" type="text/css" href="styles.css">
			</nav>
		</header>
		
		<h2>Add driver</h2>
		<form action="insert_driver.php" method="post">
			Driver Number: <input type="text" name="DriverID" placeholder='e.g. 1' required ><br>
			First Name: <input type="text" name="Fname" placeholder='e.g. Max' required><br>
			Last Name: <input type="text" name="Lname" placeholder='e.g. Verstappen' required><br>
			Date of birth: <input type="date" name="DOB" placeholder='e.g. yyyy-mm-dd' required><br>
			Nationality: <input type="text" name="Nationality" placeholder='e.g. Dutch' required><br>
			Description: <input type="text" name="Description" placeholder='e.g. He is the current world champion' ><br>
			Poles: <input type="int" name="Poles" placeholder='e.g. 1' required ><br>
			Wins: <input type="int" name="Wins" placeholder='e.g. 1' required ><br>
			Championships: <input type="int" name="Championships" placeholder='e.g. 1' required ><br>
			Image: <input type="file" id="myfile" name="Image" required><br>
			Team name: 
			<select id="Team" name="TeamID">
				<?php
					$all_team_query = "SELECT * FROM Team";
					$all_team_result = mysqli_query($conn, $all_team_query);

					while ($drop_down_all_team_record = mysqli_fetch_assoc($all_team_result)) {
					
						echo "<option value='". $drop_down_all_team_record['TeamID'] . "'>";
						echo $drop_down_all_team_record['TeamName'];
						echo "</option>";
					}
				?>
			</select><br>
			<input type="submit" value="Add Driver"> <input type="reset" value="Reset All">
		</form>
		
	<h2>Update Bio table</h2>
		<table>
			<tr>
				
				<th>first name</th>
				<th>Last Name</th>
				<th>Date of birth </th>
				<th>Nationality </th>
				<th>Description</th>
			</tr>
		<?php
		/* updating the bio table */
        	$update_bio = "SELECT * FROM Driver, Bio, Team WHERE Driver.BioID = Bio.BioID AND Driver.TeamID = Team.teamID";
        	$update_bio_record = mysqli_query($conn, $update_bio);
		

			while ($row = mysqli_fetch_array($update_bio_record)) {
				echo "<tr><form action='update_bio.php' method='post'>";
				echo "<td><input type='text' name='Fname' value='" . $row['Fname'] . "'></td>";
				echo "<td><input type='text' name='Lname' value='" . $row['Lname'] . "'></td>";
				echo "<td><input type='text' name='DOB' value='" . $row['DOB'] . "'></td>";
				echo "<td><input type='text' name='Nationality' value='" . $row['Nationality'] . "'></td>";
				echo "<td><input type='text' name='Description' value='" . $row['Description'] . "'></td>";
				echo "<input type='hidden' name='BioID' value='" . $row['BioID'] . "'>";
				echo "<td><input type='submit'></td>";
				echo "<td><a href='delete_bio.php?BioID=" . $row['BioID'] . "'>Delete</a></td>";
				echo "</form></tr>";
			}
			?>
		</table>
		
		<h2>Update Driver table</h2>
		<table>
			<tr>
				<th>Driver name</th>
				<th>Driver Number</th>
				<th>Number of pole postions</th>
				<th>Number of wins</th>
				<th>Numebr of Championships</th>
			</tr>
		<?php
		/* updating the bio table */
        	$update_driver = "SELECT * FROM Driver, Bio, Team WHERE Driver.BioID = Bio.BioID AND Driver.TeamID = Team.teamID";
        	$update_driver_record = mysqli_query($conn, $update_driver);
		

			while ($row = mysqli_fetch_array($update_driver_record)) {
				echo "<tr><form action='update_driver.php' method='post'>";
				echo "<td>{$row['Fname']} "."{$row['Lname']}</td>";
				echo "<td><input type='text' name='DriverID' value='" . $row['DriverID'] . "'></td>";
				echo "<td><input type='text' name='Poles' value='" . $row['Poles'] . "'></td>";
				echo "<td><input type='text' name='Wins' value='" . $row['Wins'] . "'></td>";
				echo "<td><input type='text' name='Championships' value='" . $row['Championships'] . "'></td>";
				echo "<td>";
			?>	
				<select id="Team" name="TeamID">
				<!-- options -->
				<?php
				$team_query = "SELECT * FROM Team";
				$team_result = mysqli_query($conn, $team_query);

				while ($update_team_record = mysqli_fetch_assoc($team_result)) {
					$defaultOption = $row['TeamID'];
					$optionId = $update_team_record['TeamID'];
					$optionName = $update_team_record['TeamName'];
					$isSelected = ($optionId == $defaultOption) ? 'selected' : '';

					echo "<option value='$optionId' $isSelected>$optionName</option>";
				}
				?>
				</select>
			<?php
				echo "</td>";
				echo "<td><input type='submit'></td>";
				echo "</form></tr>";
			}
			?>
		</table>
		
		
<h2>Add team</h2>
		<form action="insert_team.php" method="post">
			Team Name: <input type="text" name="TeamName" placeholder='e.g. Redbull' required><br>
			Team Priciple First name: <input type="text" name="TPFname" placeholder='e.g. Christian' required><br>
			Team Priciple Last name: <input type="text" name="TPLname" placeholder='e.g. Horner' required><br>
			Team headquartes Locaiton: <input type="text" name="Location" placeholder='e.g. Brackley, England' required><br>
			Image: <input type="file" id="myfile" name="Image" required><br>
			
			<input type="submit" value="Add team"> <input type="reset" value="Reset All">
		</form>
		
	<h2>Update team table</h2>
		<table>
			<tr>
				<th>Team name</th>
				<th>Team principle first name</th>
				<th>Team principle first name</th>
				<th>Location</th>
				<th>Image</th>
			</tr>
		<?php
		/* updating the team table */
        	$update_team = "SELECT * FROM Team";
        	$update_team_record = mysqli_query($conn, $update_team);

			while ($row = mysqli_fetch_array($update_team_record)) {
				echo "<tr><form action='update_team.php' method='post'>";
				echo "<td><input type='text' name='TeamName' value='" . $row['TeamName'] . "'></td>";
				echo "<td><input type='text' name='TPFname' value='" . $row['TPFname'] . "'></td>";
				echo "<td><input type='text' name='TPLname' value='" . $row['TPLname'] . "'></td>";
				echo "<td><input type='text' name='Location' value='" . $row['Location'] . "'></td>";
				echo "<td><input type='text' name='Image' value='" . $row['Image'] . "'></td>";
				echo "<input type='hidden' name='TeamID' value='" . $row['TeamID'] . "'>";
				echo "<td><input type='submit'></td>";
				echo "<td><a href='delete_team.php?TeamID=" . $row['TeamID'] . "'>Delete</a></td>";
				echo "</form></tr>";
			}
			?>
		</table>
		
<h2>Add Race</h2>
		<form action="insert_team.php" method="post">
			Race Name: <input type="text" name="TeamName" placeholder='e.g. Redbull' required><br>
			Track where race is: 
			<select id="Track" name="TrackID">
				<?php
					$all_track_query = "SELECT * FROM Track";
					$all_track_result = mysqli_query($conn, $all_track_query);

					while ($drop_down_all_track_record = mysqli_fetch_assoc($all_track_result)) {
					
						echo "<option value='". $drop_down_all_track_record['TrackID'] . "'>";
						echo $drop_down_all_track_record['TrackName'];
						echo "</option>";
					}
				?>
			</select><br>
			Driver who won race: 
			<select id="Driver" name="DriverID">
				<?php
					$all_driver_query = "SELECT * FROM Driver, Bio WHERE Driver.BioID = Bio.BioID";
					$all_driver_result = mysqli_query($conn, $all_driver_query);

					while ($drop_down_all_driver_record = mysqli_fetch_assoc($all_driver_result)) {
					
						echo "<option value='". $drop_down_all_driver_record['DriverID'] . "'>";
						echo $drop_down_all_driver_record['Fname']." ".$drop_down_all_driver_record['Lname'];
						echo "</option>";
					}
				?>
			</select><br>
			<input type="submit" value="Add team"> <input type="reset" value="Reset All">
		</form>
		
	<h2>Update Race table</h2>
		<table>
			<tr>
				<th>Race name</th>
				<th>Date and Time of race</th>
				<th>Driver who won race</th>
			</tr>
		<?php
		/* updating the team table */
        	$update_race = "SELECT * FROM Race";
        	$update_race_record = mysqli_query($conn, $update_race);

			while ($row = mysqli_fetch_array($update_race_record)) {
				echo "<tr><form action='update_race.php' method='post'>";
				echo "<td><input type='text' name='RaceName' value='" . $row['RaceName'] . "'></td>";
				echo "<td><input type='text' name='DateTime' value='" . $row['DateTime'] . "'></td>";
				echo "<input type='hidden' name='RaceID' value='" . $row['RaceID'] . "'>";
				echo "<td>";
			?>	
				<select id="Driver" name="DriverID">
				<!-- options -->
				<?php
				$driver_query = "SELECT * FROM Driver, Bio WHERE Driver.BioID = Bio.BioID";
				$driver_result = mysqli_query($conn, $driver_query);

				while ($update_driver_record = mysqli_fetch_assoc($driver_result)) {
					$defaultOption = $row['DriverID'];
					$optionId = $update_driver_record['DriverID'];
					$optionName = $update_driver_record['Fname']." ".$update_driver_record['Lname'];
					$isSelected = ($optionId == $defaultOption) ? 'selected' : '';

					echo "<option value='$optionId' $isSelected>$optionName</option>";
				}
				?>
				</select>
			<?php
				echo "</td>";
				echo "<td><input type='submit'></td>";
				echo "<td><a href='delete_race.php?RaceID=" . $row['RaceID'] . "'>Delete</a></td>";
				echo "</form></tr>";
			}
			?>
		</table>
		
		
		
