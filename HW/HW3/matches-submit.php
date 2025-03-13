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
    <body>

	<?php do_header(); // Display header ?>
    <p><a href="loginScripts/index.php">Back to front page</a></p>

    <p><b>Matches for <?= htmlspecialchars($_GET['name']) ?></b></p>

    <?php
    $filename = "singles.txt";
    $users = file($filename, FILE_IGNORE_NEW_LINES);
    $name = $_GET['name'];
    $user = null;

    // Find the user in singles.txt
    foreach ($users as $line) {
        $data = explode(",", $line);
        if ($data[0] == $name) {
            $user = $data;
            break;
        }
    }

    if ($user) {
        [$userName, $userGender, $userAge, $userType, $userOS, $minAge, $maxAge] = $user;

        // Opposite gender mapping
        $oppositeGender = ($userGender == "M") ? "F" : "M";

        foreach ($users as $line) {
            $match = explode(",", $line);
            [$matchName, $matchGender, $matchAge, $matchType, $matchOS, $matchMinAge, $matchMaxAge] = $match;

            // Check all conditions
            if (
                $matchGender == $oppositeGender &&
                $userOS == $matchOS &&
                $matchAge >= $minAge && $matchAge <= $maxAge &&
                $userAge >= $matchMinAge && $userAge <= $matchMaxAge &&
                hasCommonPersonality($userType, $matchType)
            ) {
                echo "<div class='match'>";
                echo "<p><img src='user.jpg' width='150'> <strong>$matchName</strong></p>";
                echo "<ul>";
                echo "<li><strong>Gender:</strong> $matchGender</li>";
                echo "<li><strong>Age:</strong> $matchAge</li>";
                echo "<li><strong>Type:</strong> $matchType</li>";
                echo "<li><strong>OS:</strong> $matchOS</li>";
                echo "</ul>";
                echo "</div>";
            }
        }
    } else {
        echo "<p>User not found.</p>";
    }

    function hasCommonPersonality($type1, $type2) {
        for ($i = 0; $i < 4; $i++) {
            if ($type1[$i] == $type2[$i]) {
                return true;
            }
        }
        return false;
    }
    ?>

    <p><a href="matches.php">Back to search for matches</a></p>

    <?php do_footer(); // Display footer ?>

</body>
</html>