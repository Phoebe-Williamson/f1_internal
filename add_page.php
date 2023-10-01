<!DOCTYPE html>
<!-- Sets document language to english -->
<html lang="en">
	<?php
		// starts the session and inculdes database connection
		session_start();
		include '../f1_mysqli.php';
	?>
	<head>
		<!-- Link to style sheet  -->
		<link rel="stylesheet" href="styles.css">
		<meta charset="utf-8">
		<!-- Sets the titles-->
		<title>
			Formula 1 - Admin page
		</title>
	</head>
	<body>
		<!--opens grid for header -->
		<header> 
			<!-- Logo grid-->
			<div class="logo">
				<!--image acts as link to home page -->
				<a class="two" href="home.php">
            		<img src="Images/F1-logo.png" alt="F1 logo" height="150" width="270">	
				</a>
			</div>
			<!-- Heading at top of page-->
			<h1 class="title">
				Formula 1 - Admin page
			</h1>
			<!-- Search abr grid -->
			<div class="search">
				<!-- Display the heading "Search" -->
				<h1>Search</h1>
				<!-- Create the form with "post" -->
				<form method="post">
					<!-- Input field for user to enter search query -->
					<input type="text" name="search">
					<!-- Submit button to trigger the search -->
					<input type="submit" name="submit" value="Search" class="search_button">
				</form>
				<?php				
					/* searches database to see if the input matches */
					if (isset($_POST['search'])) {
						$search = $_POST['search'];

						/*Query based on search like first name*/
						$search_query_fname = "SELECT DISTINCT b.Fname, b.Lname, d.DriverID, t.TeamName
											  FROM Bio b, Driver d, Team t
											  WHERE b.BioID = d.BioID
											  AND t.TeamID = d.TeamID
											  AND Fname LIKE '%$search%'";
						
						/*Query based on search like last name*/
						$search_query_lname = "SELECT DISTINCT b.Fname, b.Lname, d.DriverID, t.TeamName
											  FROM Bio b, Driver d, Team t
											  WHERE b.BioID = d.BioID
											  AND t.TeamID = d.TeamID
											  AND Lname LIKE '%$search%'";
						
						/*Query based on search like driver number*/
						$search_query_DriverID = "SELECT DISTINCT b.Fname, b.Lname, d.DriverID, t.TeamName
											  FROM Bio b, Driver d, Team t
											  WHERE b.BioID = d.BioID
											  AND t.TeamID = d.TeamID
											  AND DriverID LIKE '%$search%'";
						
						/*Query based on search like team name*/
						$search_query_teamname = "SELECT DISTINCT b.Fname, b.Lname, d.DriverID, t.TeamName
											  FROM Bio b, Driver d, Team t
											  WHERE b.BioID = d.BioID
											  AND t.TeamID = d.TeamID
											  AND TeamName LIKE '%$search%'";
						
						/*turns all queries into reusults*/
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
							/* prints search results */
						while ($row = mysqli_fetch_array($search_query_result2)) {
								echo "Driver and number: ";
								echo $row['Fname']." ".$row['Lname']." - ".$row['DriverID'];
								echo "<br>";
								echo "Team: ";
								echo $row['TeamName'];
								echo "<br>";
							}
							/* prints search results */
						while ($row = mysqli_fetch_array($search_query_result3)) {
								echo "Driver and number: ";
								echo $row['Fname']." ".$row['Lname']." - ".$row['DriverID'];
								echo "<br>";
								echo "Team: ";
								echo $row['TeamName'];
								echo "<br>";
							}
							/* prints search results */
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
			<nav> <!-- Nav bar links to all of the pages -->
				<a class="one" href="home.php">Home</a>
				<a class="one" href="driver.php">Drivers</a>
				<a class="one" href="teams.php"> Teams</a>
				<a class="one" href="tracks.php"> Tracks</a>
				<a class="one" href="race.php"> Races</a>
			</nav>
		</header>
		<!- Form to add driver- -->
		<!-- Heading for add driver-->
		<h2>Add driver</h2>
		<!-- Creates a form to input driver -->
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
			<!-- Create a dropdown select element for team selection -->
			<select id="Team" name="TeamID">
				<?php
					// Query to retrieve all teams from the database
					$all_team_query = "SELECT * FROM Team";
					$all_team_result = mysqli_query($conn, $all_team_query);

					// Loop through the teams and create an option for each team
					while ($drop_down_all_team_record = mysqli_fetch_assoc($all_team_result)) {
						echo "<option value='". $drop_down_all_team_record['TeamID'] . "'>";
						echo $drop_down_all_team_record['TeamName'];
						echo "</option>";
					}
				?>
			</select><br>
			<!-- Submit and reset buttons for the form -->
			<input type="submit" value="Add Driver"> <input type="reset" value="Reset All">
		</form>
		
		<!-- Displas heading for the Update Bio table -->
		<h2>Update Bio table</h2>
		<!-- Create a table for displaying and updating bio information -->
		<table>
			<tr>
				<!-- Table headers for First name, Last Name, Date of birth, Nationality, and Description -->
				<th>First name</th>
				<th>Last Name</th>
				<th>Date of birth</th>
				<th>Nationality</th>
				<th>Description</th>
			</tr>
			<?php
			/* Retrieve and display bio information for updating */
			// SQL query to retrieve data from Driver, Bio, and Team tables
			$update_bio = "SELECT * FROM Driver, Bio, Team WHERE Driver.BioID = Bio.BioID AND Driver.TeamID = Team.teamID";
			$update_bio_record = mysqli_query($conn, $update_bio);

			// Loop through the retrieved records and display them in a form for updating
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
		
		<!-- Creates heading for updatign table -->
		<h2>Update Driver table</h2>

		<!-- Create a table for displaying and updating driver information -->
		<table>
			<tr>
				<!-- Table headers for Driver name, Driver Number, Number of pole positions, Number of wins, Number of Championships, and Team they drive for -->
				<th>Driver name</th>
				<th>Driver Number</th>
				<th>Number of pole positions</th>
				<th>Number of wins</th>
				<th>Number of Championships</th>
				<th>Team they drive for</th>
			</tr>
			<?php
			/* Retrieve and display driver information for updating */

			// SQL query to retrieve data from Driver, Bio, and Team tables
			$update_driver = "SELECT * FROM Driver, Bio, Team WHERE Driver.BioID = Bio.BioID AND Driver.TeamID = Team.teamID";
			$update_driver_record = mysqli_query($conn, $update_driver);

			// Loop through the retrieved records and display them in a form
			while ($row = mysqli_fetch_array($update_driver_record)) {
				echo "<tr><form action='update_driver.php' method='post'>";
				// Display the driver's first and last name
				echo "<td>{$row['Fname']} {$row['Lname']}</td>";
				echo "<td><input type='text' name='DriverID' value='" . $row['DriverID'] . "'></td>";
				echo "<td><input type='text' name='Poles' value='" . $row['Poles'] . "'></td>";
				echo "<td><input type='text' name='Wins' value='" . $row['Wins'] . "'></td>";
				echo "<td><input type='text' name='Championships' value='" . $row['Championships'] . "'></td>";
				echo "<td>";
				?>	
				<!-- Create a dropdown select element for team selection -->
				<select id="Team" name="TeamID">
					<!-- Populate the options for teams -->
					<?php
					$team_query = "SELECT * FROM Team";
					$team_result = mysqli_query($conn, $team_query);

					while ($update_team_record = mysqli_fetch_assoc($team_result)) {
						$defaultOption = $row['TeamID'];
						$optionId = $update_team_record['TeamID'];
						$optionName = $update_team_record['TeamName'];
						// Check if this option should be selected by comparing to the driver's current team
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

		<!-- Heading for the "Add Team" section -->
		<h2>Add team</h2>
		<!-- Create a form to input team information, with the form action pointing to "insert_team.php" -->
		<form action="insert_team.php" method="post">
			Team Name: <input type="text" name="TeamName" placeholder='e.g. Redbull' required><br>
			Team Principle First name: <input type="text" name="TPFname" placeholder='e.g. Christian' required><br>
			Team Principle Last name: <input type="text" name="TPLname" placeholder='e.g. Horner' required><br>
			Team Headquarters Location: <input type="text" name="Location" placeholder='e.g. Brackley, England' required><br>
			Image of team logo: <input type="file" id="myfile" name="Image" required><br>
			<!--Buttons to submit and reset data fields.  -->
			<input type="submit" value="Add team"> <input type="reset" value="Reset All">
		</form>

		<!-- Display a heading for the "Update Team table" section -->
		<h2>Update team table</h2>
		<!-- Create a table for displaying and updating team information -->
		<table>
			<tr>
				<!-- Table headers for Team name, Team Principle first name, Team Principle last name, Location, and Image -->
				<th>Team name</th>
				<th>Team principle first name</th>
				<th>Team principle last name</th>
				<th>Location</th>
				<th>Image</th>
			</tr>
			<?php
			/* Retrieve and display team information for updating */

			// SQL query to retrieve data from the Team table
			$update_team = "SELECT * FROM Team";
			$update_team_record = mysqli_query($conn, $update_team);

			// Loop through the retrieved records and display them in a form
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

		<!-- Display a heading for the "Add Track" section -->
		<h2>Add Track</h2>

		<!-- Create a form to input track information, with the form action pointing to "insert_track.php" -->
		<form action="insert_track.php" method="post">
			Track Name: <input type="text" name="TrackName" placeholder='e.g. Bahrain international circuit' required><br>
			Track Location: <input type="text" name="Location" placeholder='e.g. Sakhir, Bahrain' required><br>
			Length of circuit: <input type="text" name="Circuit_Length" placeholder='e.g. 3.549km' required><br>
			Total race distance: <input type="text" name="Total_distance" placeholder='e.g. 308.593km' required><br>
			Number of laps: <input type="text" name="N_Laps" placeholder='e.g. 63' required><br>
			Year of first race: <input type="text" name="First_GP" placeholder='e.g. 2002' required><br>
			Lap record time: <input type="text" name="LR_Time" placeholder='e.g. 1:12.429' required><br>
			Driver who set fastest lap:
			<select id="Driver" name="DriverID">
				<?php
				// SQL query to retrieve all drivers and their bios
				$all_driver_query = "SELECT * FROM Driver, Bio WHERE Driver.BioID = Bio.BioID";
				$all_driver_result = mysqli_query($conn, $all_driver_query);

				// Loop through drivers and populate the dropdown options
				while ($drop_down_all_driver_record = mysqli_fetch_assoc($all_driver_result)) {
					echo "<option value='". $drop_down_all_driver_record['DriverID'] . "'>";
					echo $drop_down_all_driver_record['Fname']." ".$drop_down_all_driver_record['Lname'];
					echo "</option>";
				}
				?>
			</select><br>
			Number of corners: <input type="text" name="Corners" placeholder='e.g. 13' required><br>
			Number of DRS zones: <input type="text" name="Drs_zones" placeholder='e.g. 2' required><br>
			Image track: <input type="file" id="myfile" name="TrackImage" required><br>
			Image of circuit: <input type="file" id="myfile" name="CircuitImage" required><br>
			<input type="submit" value="Add Track"> <input type="reset" value="Reset All">
		</form>

		<!-- Display a heading for the "Update Track table" section -->
		<h2>Update track table</h2>

		<!-- Create a table for displaying and updating track information -->
		<table>
			<tr>
				<!-- Table headers for Track collumns -->
				<th>Track name</th>
				<th>Track Location</th>
				<th>Circuit length</th>
				<th>Total race distance</th>
				<th>Number of laps</th>
				<th>Year of first race</th>
				<th>Lap record time</th>
				<th>Driver who set fastest lap</th>
				<th>Number of corners</th>
				<th>Number of DRS zones</th>
				<th>Track Image</th>
				<th>Circuit Image</th>
			</tr>
			<?php
			/* Retrieve and display track information for updating */

			// SQL query to retrieve data from the Track table
			$update_track = "SELECT * FROM Track";
			$update_track_record = mysqli_query($conn, $update_track);

			// Loop through the retrieved records and display them in a form
			while ($row = mysqli_fetch_array($update_track_record)) {
				echo "<tr><form action='update_track.php' method='post'>";
				echo "<input type='hidden' name='TrackID' value='" . $row['TrackID'] . "'>";
				echo "<td><input type='text' name='TrackName' value='" . $row['TrackName'] . "'></td>";
				echo "<td><input type='text' name='Location' value='" . $row['Location'] . "'></td>";
				echo "<td><input type='text' name='Circuit_Length' value='" . $row['Circuit_Length'] . "'></td>";
				echo "<td><input type='text' name='Total_distance' value='" . $row['Total_distance'] . "'></td>";
				echo "<td><input type='text' name='N_Laps' value='" . $row['N_Laps'] . "'></td>";
				echo "<td><input type='text' name='First_GP' value='" . $row['First_GP'] . "'></td>";
				echo "<td><input type='text' name='LR_Time' value='" . $row['LR_Time'] . "'></td>";
				echo "<td>";
			?>	
				<select id="Driver" name="DriverID">
					<!-- options -->
					<?php
					// SQL query to retrieve all drivers and their bios
					$driver_query = "SELECT * FROM Driver, Bio WHERE Driver.BioID = Bio.BioID";
					$driver_result = mysqli_query($conn, $driver_query);

					// Loop through drivers and populate the dropdown options
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
				echo "<td><input type='text' name='Corners' value='" . $row['Corners'] . "'></td>";
				echo "<td><input type='text' name='Drs_zones' value='" . $row['Drs_zones'] . "'></td>";
				echo "<td><input type='text' name='TrackImage' value='" . $row['TrackImage'] . "'></td>";
				echo "<td><input type='text' name='CircuitImage' value='" . $row['CircuitImage'] . "'></td>";
				echo "<td><input type='submit'></td>";
				echo "<td><a href='delete_track.php?TrackID=" . $row['TrackID'] . "'>Delete</a></td>";
				echo "</form></tr>";
			}
			?>
		</table>
		
	<!-- Display a heading for the "Add Race" section -->
	<h2>Add Race</h2>

	<!-- Create a form to input race information, with the form action pointing to "insert_race.php" -->
	<form action="insert_race.php" method="post">
		Race Name: <input type="text" name="RaceName" placeholder='e.g. Bahrain grand prix' required><br>
		Date and time of race: <input type="datetime-local" name="DateTime" placeholder='e.g. 2023-06-30 17:00:00' required><br>
		Track where race occurred: 
		<select id="Track" name="TrackID">
			<?php
			// SQL query to retrieve all tracks
			$all_track_query = "SELECT * FROM Track";
			$all_track_result = mysqli_query($conn, $all_track_query);

			// Loop through tracks and populate the dropdown options
			while ($drop_down_all_track_record = mysqli_fetch_assoc($all_track_result)) {
				echo "<option value='". $drop_down_all_track_record['TrackID'] . "'>";
				echo $drop_down_all_track_record['TrackName'];
				echo "</option>";
			}
			?>
		</select><br>
		Driver who won the race: 
		<select id="Driver" name="DriverID">
			<?php
			// SQL query to retrieve all drivers and their bios
			$all_driver_query = "SELECT * FROM Driver, Bio WHERE Driver.BioID = Bio.BioID";
			$all_driver_result = mysqli_query($conn, $all_driver_query);

			// Loop through drivers and populate the dropdown options
			while ($drop_down_all_driver_record = mysqli_fetch_assoc($all_driver_result)) {
				echo "<option value='". $drop_down_all_driver_record['DriverID'] . "'>";
				echo $drop_down_all_driver_record['Fname']." ".$drop_down_all_driver_record['Lname'];
				echo "</option>";
			}
			?>
		</select><br>
		<input type="submit" value="Add Race"> <input type="reset" value="Reset All">
	</form>

	<!-- Display a heading for the "Update Race table" section -->
	<h2>Update Race table</h2>

	<!-- Create a table for displaying and updating race information -->
	<table>
		<tr>
			<!-- Table headers for Race -->
			<th>Race name</th>
			<th>Date and Time of race</th>
			<th>Track race occurred at</th>
			<th>Driver who won the race</th>
		</tr>
		<?php
		/* Retrieve and display race information for updating */

		// SQL query to retrieve data from the Race table
		$update_race = "SELECT * FROM Race";
		$update_race_record = mysqli_query($conn, $update_race);

		// Loop through the retrieved records and display them in a form
		while ($row = mysqli_fetch_array($update_race_record)) {
			echo "<tr><form action='update_race.php' method='post'>";
			echo "<td><input type='text' name='RaceName' value='" . $row['RaceName'] . "'></td>";
			echo "<td><input type='text' name='DateTime' value='" . $row['DateTime'] . "'></td>";
			echo "<input type='hidden' name='RaceID' value='" . $row['RaceID'] . "'>";
			echo "<td>";
		?>	
			<select id="Track" name="TrackID">
				<!-- options -->
				<?php
				// SQL query to retrieve tracks and their details
				$track_query = "SELECT * FROM Race, Track WHERE Race.TrackID = Track.TrackID";
				$track_result = mysqli_query($conn, $track_query);

				// Loop through tracks and populate the dropdown options
				while ($update_track_record = mysqli_fetch_assoc($track_result)) {
					$defaultOption = $row['TrackID'];
					$optionId = $update_track_record['TrackID'];
					$optionName = $update_track_record['TrackName'];
					$isSelected = ($optionId == $defaultOption) ? 'selected' : '';

					echo "<option value='$optionId' $isSelected>$optionName</option>";
				}
				?>
			</select>
		<?php
			echo "</td>";
			echo "<td>";
		?>	
			<select id="Driver" name="DriverID">
				<!-- options -->
				<?php
				// SQL query to retrieve all drivers and their bios
				$driver_query = "SELECT * FROM Driver, Bio WHERE Driver.BioID = Bio.BioID";
				$driver_result = mysqli_query($conn, $driver_query);

				// Loop through drivers and populate the dropdown options
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
