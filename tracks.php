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
				<a class="two" href="home.php"> <! Image acts as link to home page >
            		<img src="Images/F1-logo.png" alt="F1 logo" height="150" width="270">	
				</a>
			</div>
			<h1 class="title">				
				F1 - Tracks
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

						$search_query_name = "SELECT Fname, Lname
											  FROM Bio
											  WHERE Fname LIKE '%$search%'
											  OR Lname LIKE '%$search%'";

						$search_query_name_results = mysqli_query($conn, $search_query_name);

						$count = mysqli_num_rows($search_query_name_results);

						/* checks if there are any results from the search */
						if ($count == 0) {
							echo "There were no search results!";
						} else {
							/* prints search results */
							echo "Driver: ";
							while ($row = mysqli_fetch_array($search_query_name_results)) {
								echo $row['Fname']." ".$row['Lname'];
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
				<! Links to the differnt webpages
				<a class="one" href="home.php">Home</a>
				<a class="one" href="driver.php">Drivers</a>
				<a class="one" href="teams.php"> Teams</a>
				<a class="one" href="tracks.php"> Tracks</a>
    			<link rel="stylesheet" type="text/css" href="styles.css">
			</nav>
		</header>
		<div class="polaroid-gallery">
				<?php
					/* Gets info from database*/
					$query = "SELECT TrackID, TrackName, Location from Track ";
					$result = mysqli_query($conn, $query);

					/* checks that results are in database*/
					while ($row = mysqli_fetch_assoc($result)) {
						echo '<div class="polaroid">';
						echo "<input type='hidden' name='TeamID' value='" . $row['TrackID'] . "'>";
						echo $row['TrackName']; /* displays track name */
						echo '<div class="caption">';
						echo $row['Location']; /* displays track location in caption area */
						echo '</div>';
						echo '</div>';
					}
				?>
		</div>
	</body>
</html>
