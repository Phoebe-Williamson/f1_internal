<!DOCTYPE html>
<HTML lang="en">
<?php
/*starts the session an dhas dtatabse connection so queries work*/
	session_start();
	include '../f1_mysqli.php';
?>
<html>
	<head>
		<!-- Link to style sheet  -->
		<link rel="stylesheet" href="styles.css">
		<meta charset="utf-8">
		<!-- Creates title -->
		<title>
			Formula 1 
		</title>
	</head>
	<body>
		<header> 
			<div class="logo">
				<!--Image acts as a link to the home page -->
				<a class="two" href="home.ph">
            		<img src="Images/F1-logo.png" alt="F1 logo" height="150" width="270">	
				</a>
			</div>
			<!-- Is the header section  -->
			<h1 class="title">
				Formula 1 
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
				<a class='one' href='login.php'>Login</a>
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
		<?php
		// tells user that they have logged in
		echo "You have logged in";
		header("refresh:2; url=home.php");

		?>
