<!DOCTYPE html>
<?php
	session_start();
	include '../f1_mysqli.php';
?>
<html>
	<head>
		<link rel="stylesheet" href="styles.css">
		<title>
			Formula 1 - Home
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
				Formula 1 - Home
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
		<?php
		
		$update_team = "UPDATE Team SET TeamName = '".$_POST['TeamName']."', TPFname='" . $_POST['TPFname'] ."', TPLname='". $_POST['TPLname'] . "', Location='" . $_POST['Location']  . "', Image='" . $_POST['Image']. "' WHERE TeamID='" . $_POST['TeamID']. "'";
		
		if(!mysqli_query($conn, $update_team)) {
			echo 'Not updated team table '.mysqli_error($conn);
		} else {
			echo 'Updated team table';
		}	
		header("refresh:50, url=add_page.php");

	?>	
