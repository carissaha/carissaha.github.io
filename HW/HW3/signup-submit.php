<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $personality = strtoupper($_POST["personality"]);
    $os = $_POST["os"];
    $minage = $_POST["minage"];
    $maxage = $_POST["maxage"];

    // Define valid choices for OS
    $valid_os = ["Windows", "Mac OS X", "Linux"];

    // Validation patterns
    $name_pattern = "/^.+$/"; // Name must not be empty
    $age_pattern = "/^[0-9]{1,2}$/"; // Age must be an integer between 0-99
    $gender_pattern = "/^(M|F)$/"; // Gender must be M or F
    $personality_pattern = "/^[IE][NS][FT][JP]$/"; // Valid MBTI types
    $age_range_pattern = "/^[0-9]{1,2}$/"; // Age range must be valid numbers

    // Validate inputs
    if (!preg_match($name_pattern, $name) ||
        !preg_match($age_pattern, $age) || $age < 0 || $age > 99 ||
        !preg_match($gender_pattern, $gender) ||
        !preg_match($personality_pattern, $personality) ||
        !in_array($os, $valid_os) ||
        !preg_match($age_range_pattern, $minage) || $minage < 0 || $minage > 99 ||
        !preg_match($age_range_pattern, $maxage) || $maxage < 0 || $maxage > 99 ||
        $minage > $maxage) {
        die("We're sorry. You submitted invalid user information. Please go back and try again.");
    }

    // Check for duplicate names in singles.txt
    $lines = file("singles.txt", FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        $data = explode(",", $line);
        if (strcasecmp($data[0], $name) == 0) { // Case-insensitive match
            die("We're sorry. This user already exists. Please go back and try again.");
        }
    }

    // Save to file
    $entry = "$name,$gender,$age,$personality,$os,$minage,$maxage\n";
    file_put_contents("singles.txt", $entry, FILE_APPEND);

    // Redirect to index
    header("Location: loginScripts/index.php");
    exit;
} else {
    die("Invalid access.");
}
?>
