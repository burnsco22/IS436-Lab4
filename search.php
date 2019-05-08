<?php
	/*session_start();
	if(isset($_SESSION['username'])){
		$flag = 1;
		$searchmessage = "Welcome to the search page, " . $_SESSION['username'];
	}
	else {
		$flag = 0;
	}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Search Degree Plans</title>
	<link rel="stylesheet" type="text/css" href="search.css" title="style" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/scriptaculous/1.9.0/scriptaculous.js"></script>
	<script type="text/javascript" src="search.js"></script>
</head>
<body>

<!--This form is used by students to search for relevant degree plans to save to their account.-->
<!--By: Courtney Burns-->
<!--Last modified: Dec 18, 2018 2:17pm-->

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
		
	<!--Search Page Content-->
	<!--Instructions for the Search Page-->
	<div class="instructions">
	<?php
		/*	if($flag == 1){
			print ($searchmessage);*/
	?>

		<p>
			Search by interest allows students to find degree plans based upon an interest.<br/>
			Search by Degree Plan allows students to type in a potential degree plan to see if it is available.<br/>
			To view previously chosen or save current interests and degree plans, <a class="login" href="login.html">Login here.</a>
		</p>
	</div>
		
		<!--Form that takes in the information needed to register an account with the website-->
		<div class="searchArea">
		
			<form name="searchbyDegree" method="POST" action = "search_results.php" id="searchform">
				<div class="form">
					<input type = "text" name = "major" placeholder="Enter Major" id="majorInput"/>
				</div>

				<input type = "submit" name="searchMajor" value="Search by Major" id="majorSearch"/>
			</form>
			
			<form name="searchbyInterest" method="POST" action = "search_results.php" id="searchform">
				<div class="form">
					<input type = "text" name = "interest" placeholder="Enter Interest" id="interestInput"/>
				</div>

				<input type = "submit" name="searchInterest" value="Search by Interest" id="interestSearch"/>
			</form>
			
			<br/>
			
			<form name="preferences" method="POST" action = "search_results.php">
				<input type = "submit" name = "preferences" value = "Search by Preferences" id="preferencesApply">
			</form>
		
			<div class= "autocomplete" id="alertBox">
			<!--Hint messages will be printed here-->
			</div>
			
			<div class= "messageBox" id="messageBox">
			<!--Hint messages will be printed here-->
			</div>
		
		<?php
			/*}
			else {
				print ("Please log in to search using your preferences.");*/
		?>
		<p>
			<br/>
			<a class="login" href="login.php" id="loginlink">Login</a>
		</p>
		<?php
		/*}*/
		?>
			
		</div>
</body>
</html>