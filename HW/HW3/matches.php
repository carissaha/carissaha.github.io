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
        <title>Find Matches</title>
        <link rel="stylesheet" href="nerdluv.css">
    </head>

	<?php do_header(); // Display header ?>
    <p><a href="loginScripts/index.php">Back to front page</a></p>

    <fieldset>
            <legend>Returning User:</legend>
            <form action="matches-submit.php" method="get">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" maxlength="16" required><br><br>
                <input type="submit" value="View My Matches">
            </form>
    </fieldset>

	<?php do_footer(); // Display footer ?>

</body>
</html>