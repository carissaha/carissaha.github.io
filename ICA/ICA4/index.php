<h1>Voting Exercise</h1>
<?php
function check($age) {
    if ($age >= 18) {
        return "You are eligible to vote.";
    } 
    else {
        return "You are not eligible to vote.";
    }
}

$age = 20;
echo check($age) . "<br>";
?>

<br>

<h1>Rectangle Exercise</h1>
<?php
function area($length, $width) {
    return $length * $width;
}

$length = 5;
$width = 10;

$area = area($length, $width);
echo "The area of the rectangle is: " . $area . ".<br>";
?>

<br>

<h1>Charlie Exercise (reload to test it)</h1>
<?php
// Part 1
function bit() {
    return rand(0, 1) == 1;
}

// Part 2
if (bit()) {
    echo "Charlie bit your finger!<br>";
} else {
    echo "Charlie did not bite your finger!<br>";
}
?>

