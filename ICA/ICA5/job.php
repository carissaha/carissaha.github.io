<!DOCTYPE html>
<html>
<head>
<title>Job Application Form</title>
</head>
<body>
<h1>Job Application Form</h1>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $formFields = array(
        'position' => 'Position Applied For',
        'name' => 'Name',
        'gender' => 'Gender',
        'nationality' => 'Nationality',
        'dob' => 'Date of Birth',
        'address' => 'Address',
        'phone' => 'Telephone Number',
        'email' => 'Email',
        'education' => 'Educational History and Qualifications',
        'yearsExperience' => 'Years of Experience',
        'personalStatement' => 'Personal Statement',
        'refereeName' => 'Referee 2 Name',
        'refereeOccupation' => 'Referee 2 Occupation',
        'refereeRelationship' => 'Referee 1 Relationship',
        'refereeAddress' => 'Referee 2 Address',
        'refereePhone' => 'Referee 2 Phone',
        'vegetarian' => 'Vegetarian',
        'fruits' => 'Selected Fruits'
    );

    echo "<h2>Form Data:</h2>";
    echo "<ul>";
    foreach ($formFields as $key => $label) {
        $value = isset($_POST[$key]) ? $_POST[$key] : 'Not Provided';
        echo "<li><strong>$label:</strong> $value</li>";
    }
    echo "</ul>";
}
?>
</body>
</html>
