<!DOCTYPE html>
<?php
	session_start();
	include '../f1_mysqli.php';
?>
<html>
	<head>
		<link rel="stylesheet" href="styles.css">
		
	</head>

	<body>
		<header> 
			<div class="logo">
				<a class="two" href="home.php">
            		<img src="Images/F1-logo.png" alt="F1 logo" height="150" width="270">	
				</a>
			</div>
			<h1 class="title">
				f1 - home
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

						$search_query_name = "SELECT b.Fname, b.Lname, d.DriverID, t.TeamName
											  FROM Bio b, Driver d, Team t
											  WHERE b.BioID = d.BioID
											  AND t.TeamID = d.TeamID
											  AND Fname LIKE '%$search%'
											  OR Lname LIKE '%$search%'
											  OR DriverID LIKE '%$search%'
											  OR TeamName LIKE '%$search%'";

						$search_query_name_results = mysqli_query($conn, $search_query_name);

						$count = mysqli_num_rows($search_query_name_results);

						/* checks if there are any results from the search */
						if ($count == 0) {
							echo "There were no search results!";
						} else {
							/* prints search results */
							while ($row = mysqli_fetch_array($search_query_name_results)) {
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
				login
			</div>
			<nav>
				<a class="one" href="home.php">Home</a>
				<a class="one" href="driver.php">Drivers</a>
				<a class="one" href="teams.php"> Teams</a>
				<a class="one" href="tracks.php"> Tracks</a>
    			<link rel="stylesheet" type="text/css" href="styles.css">
			</nav>
		</header>
		<div class="polaroid-gallery">
			<a href="driver.php">
				<div class="polaroid">
					<img class="one" src="Images/F1-drivers (1).jpg" width="300" height="300">
					<div class="caption"> drivers</div>
				</div>
			</a>
			<a href="teams.php">
				<div class="polaroid">
					<img class="one" src="Images/F1_grid.jpg" width="300" height="300">
					<div class="caption"> teams</div>
				</div>
			</a>
		</div>
	</body>
</html>
