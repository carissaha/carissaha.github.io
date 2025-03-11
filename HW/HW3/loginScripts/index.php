<?php session_start(); /* Starts the session */

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}

include 'common.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NerdLuv - Where Meek Geeks Meet</title>
</head>
<body>
	<div>
	<h1>nerdLuv™</h1>
	<p>where meek geeks meet</p>

    <p>Welcome!</p>
    <p><a href="">Sign up for a new account</a></p>
	<p><a href="matches.php">Check your matches</a></p>
    
	<p>This page is for single nerds to meet and date each other! Type in
		your personal information and wait for the nerdly luv to begin!
		Thank you for using our site.</p>
	<p>Results and page (C) Copyright NerdLuv Inc.</p>
	<p><a href="login.php">Back to login</p>
	<p><a href="logout.php">Logout</p>
	</div>

	<?php footer(); // Function from common.php ?>
</body>
</html>