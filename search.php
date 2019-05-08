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
			<a class="active">Home</a>
			<a>About</a>
			<a>Undergraduate</a>
			<a>Graduate Program</a>
			<a>People</a>
			<a>Research</a>
			<a>Contact Us</a>
		</div>
		
	<!--Banner Image across the top of the webpage under the nav bar-->
	<div class="banner">
		<img class="container" src="searchbanner.jpg" alt="Planning"/>
		<h3 class="formTitle">Department of Information Systems</h3>
	</div>
		
	<!--Home Page Content-->
	<!--Intro for the Home Page-->
	<div class="instructions">

		<p>
			Welcome to the Department of Information Systems.<br/>
			We offer a variety of certifications and graduate tracks within the field of Information Systems. <br/>
			Please browse the above tabs to view resources relevant to this major.
		</p>
	</div>
		
		<!--Form that takes in the information needed to register an account with the website-->
		<div class="searchArea">
			
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
