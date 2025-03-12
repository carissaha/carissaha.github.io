<?php session_start(); /* Starts the session */
require_once("../common.php");

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NerdLuv</title>
        <link rel="stylesheet" href="../nerdluv.css">
    </head>

	<?php do_header(); // Display header ?>

    <p><b>Welcome!</b></p>
    <p><a href="login.php">Back to login</a></p>
	<p><a href="../matches.php">Check your matches</a></p><br><br>

	<?php do_footer(); // Display footer ?>

</body>
</html>