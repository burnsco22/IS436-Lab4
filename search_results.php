<?php
	session_start();
	if(isset($_SESSION['username'])){
		$flag = 1;
		$searchmessage = "Welcome to the search page, " . $_SESSION['username'];
		$uid = $_SESSION['user_id_session'];
	}
	else {
		$flag = 0;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Degree Plan Results</title>
	<link rel="stylesheet" type="text/css" href="search.css" title="style" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/scriptaculous/1.9.0/scriptaculous.js"></script>
	<script type="text/javascript" src="search.js"></script>
</head>
<body>

<!--This page is used to display the search results.-->
<!--By: Courtney Burns -->
<!--Last modified: Dec 18, 2018 2:18pm-->

	<!--Navigation Bar Links-->
		<div class="topNav">
			<a href="index.php">Home</a>
			<a href="login.php">Login</a>
			<a href="register.php">Register</a>
			<a class="active" href="search.php">Search</a>
			<a href="favorites.php">Favorites</a>
			<a href="profilepagemain.php">Profile</a>
		</div>
		
	<!--Banner Image across the top of the webpage under the nav bar-->
	<div class="banner">
		<img class="container" src="searchbanner.jpg" alt="Planning"/>
		<h3 class="formTitle">Search Degree Plans</h3>
	</div>
		
	<!--Search Result Page Content-->
		<!--Message about searching-->
		<div class="instructions">
			<h3>SEARCH RESULTS</h3>
			<p>
				To learn more about a degree plan, click on the plan title to navigate to the page and save to favorites. (the titles will be clickable and linked to different degree plans based on search criteria)<br />
				To save your preferences, please login to your account<a class="login" href="login.html"> here.</a>
			</p>
		</div>
		
		<div class="searchResultArea">	
			
			<!-- This is the code for the major search bar that allows users to search by the major of their choice-->
			<?php
				if(isset($_POST['major'])){
					
					//connect to database
					$db = mysqli_connect("studentdb-maria.gl.umbc.edu","palyo1","palyo1","palyo1");
					if (mysqli_connect_errno())	exit("Error - could not connect to MySQL");
					
					//declaring variables and scrubbing data
					$major = mysqli_real_escape_string($db, $_POST['major']);
					$major = htmlspecialchars($major);
									
			?>
					<div class="searchCriteria">
					<p>
					<?php
					print ("<p>Search Criteria: $major</p>");
					?>
					</p>
					</div>
				</div>	
			<?php
					//query the database table
					$majorsql="select * from major where major_name like '%$major%'";
					$majorIDResult = mysqli_query($db, $majorsql);
					
					if(! $majorIDResult){
						print("Error - query could not be executed");
						$error = mysqli_error($db);
						print "<p> . $error . </p>";
						exit;
					}
					
					$num_rows = mysqli_num_rows($majorIDResult);
					if ($num_rows != 0) {
						for ($i = 0; $i < $num_rows; $i++)
						{
							$row_array = mysqli_fetch_array($majorIDResult);
							$idArray[$i] = ("$row_array[major_id]");
						}
					
					
					for ($i = 0; $i < count($idArray); $i++)
					{
						$majorQuery = "Select major_name, description, page from major where major_id = ('$idArray[$i]')";
						$result = mysqli_query($db, $majorQuery);
						$num_rows = mysqli_num_rows($result);
						if( ! $result){
							print("Error - query could not be executed");
							$error = mysqli_error($db);
							print "<p> . $error . </p>";
							exit;
						}
						if ($num_rows != 0){
							$row_array = mysqli_fetch_array($result);	
			?>
			<div class="searchResultArea">	
			
			<h2> <a href = "majors/<?php print("$row_array[page]"); ?>.php" id="majorResult"> <?php print("$row_array[major_name]"); ?></a></h2>
			
			<p> <?php print ("$row_array[description]"); ?> </p>			
			
			</div>
			
					<!--$interestsql = "select major_interest_1, major_interest_2, major_interest_3 from user where user_id = ('$uid')";
					$interestResult = mysqli_query ($db, $interestsql);
					
					while($interestrow = mysql_fetch_array($interestResult)){
						$MajorName = $majorrow['major_name'];
						$MajorDescription = $majorrow['description'];
					//display the results
						echo "<a href=\"search_results.php?id=$MajorName\">" . $MajorNam . " " . $MajorDescription . "</a>";
					}
					
					$prefsql = "select major_id from favorites where user_id = ('$uid')";
					-->
			<?php
						}
						
					}
				} else {
						print("<div class=\"searchResultArea\">	There were no majors that matched your search criteria. </div>");
					}
				}
				
			?>
			
			
			<!-- This is the code for the interest search bar that allows users to search by the interest of their choice-->
			<?php
				if(isset($_POST['interest'])){
					
					//connect to database
					$db = mysqli_connect("studentdb-maria.gl.umbc.edu","palyo1","palyo1","palyo1");
					if (mysqli_connect_errno())	exit("Error - could not connect to MySQL");
					
					//declaring variables and scrubbing data
					$interest = mysqli_real_escape_string($db, $_POST['interest']);
					$interest = htmlspecialchars($interest);
									
			?>
					<div class="searchCriteria">
					<p>
					<?php
					print ("<p>Search Criteria: $interest</p>");
					?>
					</p>
					</div>
				</div>	
			<?php
					//query the database table
					$interestsql="select * from major where major_name like '%$interest%' OR description like '%$interest%' OR classes like '%$interest%'";
					$interestResult = mysqli_query($db, $interestsql);
					
					if(! $interestResult){
						print("Error - query could not be executed");
						$error = mysqli_error($db);
						print "<p> . $error . </p>";
						exit;
					}
					
					$num_rows = mysqli_num_rows($interestResult);
					if ($num_rows != 0) {
						for ($i = 0; $i < $num_rows; $i++)
						{
							$row_array = mysqli_fetch_array($interestResult);
							$interestArray[$i] = ("$row_array[major_id]");
						}
					
					
					for ($i = 0; $i < count($interestArray); $i++)
					{
						$majorQuery = "Select major_name, description, page from major where major_id = ('$interestArray[$i]')";
						$result = mysqli_query($db, $majorQuery);
						$num_rows = mysqli_num_rows($result);
						if( ! $result){
							print("Error - query could not be executed");
							$error = mysqli_error($db);
							print "<p> . $error . </p>";
							exit;
						}
						if ($num_rows != 0){
							$row_array = mysqli_fetch_array($result);	
			?>
			<div class="searchResultArea">	
			
			<h2> <a href = "majors/<?php print("$row_array[page]"); ?>.php"> <?php print("$row_array[major_name]"); ?></a></h2>
			
			<p> <?php print ("$row_array[description]"); ?> </p>			
			
			</div>
			
					<!--$interestsql = "select major_interest_1, major_interest_2, major_interest_3 from user where user_id = ('$uid')";
					$interestResult = mysqli_query ($db, $interestsql);
					
					while($interestrow = mysql_fetch_array($interestResult)){
						$MajorName = $majorrow['major_name'];
						$MajorDescription = $majorrow['description'];
					//display the results
						echo "<a href=\"search_results.php?id=$MajorName\">" . $MajorNam . " " . $MajorDescription . "</a>";
					}
					
					$prefsql = "select major_id from favorites where user_id = ('$uid')";
					-->
			<?php
						}
						
					}
				} else {
						print("<div class=\"searchResultArea\">	There were no majors that matched your search criteria. </div>");
					}
				}
				
			?>
			
			
			<!-- This is the code for the preferences where we will be applying all selected preferences from the user's profile page-->
			<?php
				if(isset($_POST['preferences'])){
					
					//connect to database
					$db = mysqli_connect("studentdb-maria.gl.umbc.edu","palyo1","palyo1","palyo1");
					if (mysqli_connect_errno())	exit("Error - could not connect to MySQL");
					
					$prefsql = "select * from profile where user_id = ('$uid')";
					$prefResult = mysqli_query($db, $prefsql);
					
					if(! $prefResult){
						print("Error - query could not be executed");
						$error = mysqli_error($db);
						print "<p> . $error . </p>";
						exit;
					}
					
					$num_rows = mysqli_num_rows($prefResult);
					if ($num_rows != 0) {
						for ($i = 0; $i < $num_rows; $i++){
							$row_array = mysqli_fetch_array($prefResult);
						}
						
						
						if (("$row_array[major_interest_1]" != NULL) && ("$row_array[major_interest_2]" != NULL) && ("$row_array[major_interest_3]" != NULL) && ("$row_array[minor_interest_1]" != NULL) && ("$row_array[minor_interest_2]" != NULL) && ("$row_array[minor_interest_3]" != NULL)){
							$prefArray = array("$row_array[major_interest_1]", "$row_array[major_interest_2]", "$row_array[major_interest_3]", "$row_array[minor_interest_1]", "$row_array[minor_interest_2]", "$row_array[minor_interest_3]");				
						} else {
							print ("You may not use the preferences function if all 6 of your interests are not set!");
							$prefArray = 0;
						}
					}
					
					if($prefArray > 0){
						for ($i = 0; $i < count($prefArray); $i++){
							//query the database table
							$prefArraysql="select * from major where major_name like '%$prefArray[$i]%' OR description like '%$prefArray[$i]%' OR classes like '%$prefArray[$i]%'";
							$prefArrayResult = mysqli_query($db, $prefArraysql);
						
							if(! $prefArrayResult){
								print("Error - query could not be executed");
								$error = mysqli_error($db);
								print "<p> . $error . </p>";
								exit;
							}
							if ($num_rows != 0){
									$row_array = mysqli_fetch_array($prefArrayResult);						

			?>
			<div class="searchResultArea">	
			
			<h2> <a href = "majors/<?php print("$row_array[page]"); ?>.php" id="majorResults"> <?php print("$row_array[major_name]"); ?></a></h2>
			
			<p> <?php print ("$row_array[description]"); ?> </p>			
			
			</div>
			
			<?php
							}
						
						}
					} else {
						print("<div class=\"searchResultArea\">	Please, make sure that you have filled in all 6 of your preferences. </div>");
					}
				} 
				
			?>
			
			
		</div>
</body>
</html>