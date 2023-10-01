<!DOCTYPE html>
<!--Seet document language to english -->
<HTML lang="en">
<?php
/*starts the session and has databse connection so queries work*/
	session_start();
	include '../f1_mysqli.php';
?>
	<head>
		<!-- Link to style sheet  -->
		<link rel="stylesheet" href="styles.css">
		<meta charset="utf-8">
		<!-- Creates title -->
		<title>
			Formula 1 - Track Profile
		</title>
	</head>
	<body>
		<header> 
			<div class="logo">
				<!--Image acts as a link to the home page -->
				<a class="two" href="home.php">
            		<img src="Images/F1-logo.png" alt="F1 logo" height="150" width="270">	
				</a>
			</div>
			<!-- Is the header section  -->
			<h1 class="title">
				Formula 1 - Track Profile
			</h1>
			<!-- Search bar section -->
			<div class="search">
				<h1>Search</h1>
				<!-- Starts the search query -->
				<form method="post">
					<input type="text" name="search">
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
						
						/*Query based on seach like team name*/
						$search_query_teamname = "SELECT DISTINCT b.Fname, b.Lname, d.DriverID, t.TeamName
											  FROM Bio b, Driver d, Team t
											  WHERE b.BioID = d.BioID
											  AND t.TeamID = d.TeamID
											  AND TeamName LIKE '%$search%'";
						
						/*turns queries into reusults*/
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
							/* prints search results */
								echo "Driver and number: ";
								echo $row['Fname']." ".$row['Lname']." - ".$row['DriverID'];
								echo "<br>";
								echo "Team: ";
								echo $row['TeamName'];
								echo "<br>";
							}
						while ($row = mysqli_fetch_array($search_query_result3)) {
							/* prints search results */
								echo "Driver and number: ";
								echo $row['Fname']." ".$row['Lname']." - ".$row['DriverID'];
								echo "<br>";
								echo "Team: ";
								echo $row['TeamName'];
								echo "<br>";
							}
						while ($row = mysqli_fetch_array($search_query_result4)) {
							/* prints search results */
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
			<!-- Link to login page -->
			<div class="login">
				<?php
					//checks to see if logged in
					if((!isset($_SESSION['Logged_in'])) or $_SESSION['Logged_in'] != 1){
					echo "Not logged in";
					echo "<a class='one' href='login.php'>Login</a>"; // displays if not logged in
					}
					else {
					echo "Logged In: ".$_SESSION['Username']; // shows username of who is logged in
					echo "<a class='one' href='process_logout.php'>Logout</a>"; // dislpayed if loffed in
					
						$username = $_SESSION['Username'];
						
					$user_rank_query = "SELECT * FROM Users WHERE Username = '$username'";
					$user_rank_result = mysqli_query($conn, $user_rank_query);
					$user_rank_row = mysqli_fetch_assoc($user_rank_result);

					$user_rank = $user_rank_row['Rank']; //store the users rank as a variable
					$required_rank = "admin"; 
						
						if($user_rank == $required_rank){
							echo "<a class='one' href='add_page.php'>Admin</a>"; // hsows admin tag if logged in
						}	
					}
				?>
			</div>
			<!-- Nav bar links to all of the pages -->
			<nav>
				<a class="one" href="home.php">Home</a>
				<a class="one" href="driver.php">Drivers</a>
				<a class="one" href="teams.php"> Teams</a>
				<a class="one" href="tracks.php"> Tracks</a>
    			<link rel="stylesheet" type="text/css" href="styles.css">
			</nav>
		</header>
		<!--Link back to track page -->
		<a class="two" href="tracks.php">←Back</a>
		<!--Starts grid -->
		<grid>
			<!--Grid for left side of page-->
			<div class="profile1">
				<?php
				if(isset($_GET['TrackID'])) {
					$TrackID = $_GET['TrackID'];
				} else {
					$TrackID=1;
				}
					$show_track = "SELECT * FROM Track WHERE TrackID='".$TrackID."'";

					// query to get teack info
					$query = "SELECT t.TrackID, t.TrackName, t.Location, t.CircuitImage FROM Track t Where  t.TrackID= '".$TrackID."'";
					$result = mysqli_query($conn, $query);

					while ($row = mysqli_fetch_assoc($result)) {
						echo '<img src="Images/' . $row['CircuitImage'] . '" width="750" height="421.875" alt="' . $row['CircuitImage'] . '">';
					}
				?>
			</div>
			<!-- Frid for right side of page-->
			<div class="profile2">
				<?php
				if(isset($_GET['TrackID'])) {
					$TrackID = $_GET['TrackID'];
				} else {
					$TrackID=1;
				}
					$show_track = "SELECT * FROM Track WHERE TrackID='".$TrackID."'";
					
					// query to get all track info
					$query = "SELECT * FROM Track t Where  t.TrackID= '".$TrackID."'";
					$result = mysqli_query($conn, $query);

					while ($row = mysqli_fetch_assoc($result)) {
						echo '<h1>'.$row['TrackName']." - ".$row['Location'].'</h1>';
						echo '<p>'.'<b>'."Circuit length: ".'</b>'.$row['Circuit_Length']."km".'<br>';
						echo '<b>'."Race distance: ".'</b>'.$row['Total_distance']."km".'<br>';
						echo '<b>'."Number of laps: ".'</b>'.$row['N_Laps'].'<br>';
						echo '<b>'."Year race was first held: ".'</b>'.$row['First_GP'].'<br>';
						echo '<b>'."Fastest lap time: ".'</b>'.$row['LR_Time'].'<br>';
						echo '<b>'."Driver who set fastest lap: ".'</b>'.$row['DriverID'].'<br>';
						echo '<b>'."Number of corners in circuit: ".'</b>'.$row['Corners'].'<br>';
						echo '<b>'."Number of DRS zones: ".'</b>'.$row['Drs_zones'].'<br>';
						echo '</p>';
					}
				?>
			</div>
		</grid>		
	</body>
