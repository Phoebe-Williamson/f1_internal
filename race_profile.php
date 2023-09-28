<!DOCTYPE html>
<?php
	session_start();
	include '../f1_mysqli.php';
?>
<html>
	<head>
		<link rel="stylesheet" href="styles.css">
		<title>
			Formula 1 - Races
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
				Formula 1 - Race Profile
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
				<a class="one" href="race.php"> Races</a>
    			<link rel="stylesheet" type="text/css" href="styles.css">
			</nav>
			</header>
			<grid>
				<div class="profile1">
					<?php
					if(isset($_GET['RaceID'])) {
						$RaceID = $_GET['RaceID'];
					} else {
						$RaceID=1;
					}
						$show_race = "SELECT * FROM Race WHERE RaceID='".$RaceID."'";

						/*gets information form race table based on raceid sent in from race page*/
						$query = "SELECT t.TrackImage FROM Race r, Track t WHERE r.TrackID = t.TrackID AND RaceID='".$RaceID."'";
						$result = mysqli_query($conn, $query);

						/* checks that results are in database*/
						while ($row = mysqli_fetch_assoc($result)) {
							echo '<img src="Images/' . $row['TrackImage'] . '" width="450" height="253.125" alt="' . $row['TrackImage'] . '">';
						}
					
					?>
				</div>
				<div class="profile2">
					<?php
					if(isset($_GET['RaceID'])) {
						$RaceID = $_GET['RaceID'];
					} else {
						$RaceID=1;
					}
						$show_race = "SELECT * FROM Race, Track WHERE Race.TrackID = Track.TrackID AND RaceID='".$RaceID."'";
					
						/*gets information form race and track table based on raceid sent in from race page for races that have occured*/
						$query_with_winner = "SELECT r.RaceName, r.DateTime, t.TrackName, t.Location, b.Fname, b.Lname FROM Race r, Track t, Driver d, Bio b Where r.TrackID = t.TrackID AND r.DriverID = d.DriverID AND d.BioID = b.BioID AND RaceID = '".$RaceID."' AND r.RaceID BETWEEN 1 AND 15";
						$result = mysqli_query($conn, $query_with_winner);

						/* checks that results are in database*/
						while ($row = mysqli_fetch_assoc($result)) {
							echo '<h1>';
							echo $row['RaceName'];
							echo '</h1>';
							echo '<h2>';
							echo $row['TrackName']." - ".$row['Location'];
							echo'</h2>';
							echo '<p>'."Time of race: ".$row['DateTime']."  NZST (New Zealand Standard Time)"; /* displays date and time of race in caption area */	
							echo '<br>'."Race Winner: ".$row['Fname'].' '.$row['Lname'];
						}
					
					/*gets information form race and track table based on raceid sent in from race page for races that have not occured*/
					$query_without_winner = "SELECT r.RaceName, r.DateTime, t.TrackName, t.Location FROM Race r, Track t Where r.TrackID = t.TrackID AND r.RaceID ='".$RaceID."' AND r.RaceID BETWEEN 16 AND 23";
					$result_without_winner = mysqli_query($conn, $query_without_winner);

						/* checks that results are in database*/
						while ($row = mysqli_fetch_assoc($result_without_winner)) {
							echo '<h1>';
							echo $row['RaceName'];
							echo '</h1>';
							echo '<h2>';
							echo $row['TrackName']." - ".$row['Location'];
							echo'</h2>';
							echo '<p>'."Time of race: ".$row['DateTime']."  NZST (New Zealand Standard Time)"; /* displays date and time of race in caption area */	
							echo '<br>'."There is no race winner yet as race has not occured";
						}
					?>
					
				</div>
		</grid>
			
