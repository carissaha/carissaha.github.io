<!DOCTYPE html>
<html lang=”en”>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>CW03</title>
</head>
<body>

<h1>Exercise 1</h1>
    <?php
    function hello_world() {
        echo "Hello world!";
    }
    hello_world();
    ?>

<h1>Exercise 2</h1>
<?php
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}
?>

<h1>Exercise 3</h1>
<?php
function triangle($size) {
    for ($i = 1; $i <= $size; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }
        echo "<br>";
    }
}

triangle(5);
?>

<h1>Exercise 4</h1>
<?php
function word_count($str) {
    $count = 0;  
    $inWord = false;

    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] != ' ') {  
            if (!$inWord) {  
                $count++;
                $inWord = true;
            }
        } else {
            $inWord = false;
        }
    }

    return $count;
}

echo "Word count: " . word_count("hello, how are you?") . "<br>";
?>

<h1>Exercise 5</h1>
<?php
function countWords($str) {
    $str = strtolower($str);
    $words = preg_split('/\s+/', trim($str));
    $wordCount = [];

    foreach ($words as $word) {
        if (!empty($word)) {
            if (isset($wordCount[$word])) {
                $wordCount[$word]++;
            } else {
                $wordCount[$word] = 1;
            }
        }
    }

    return $wordCount;
}

$sentence = "Hello hello world world world";
$wordFrequency = countWords($sentence);

echo "<pre>";
print_r($wordFrequency);
echo "</pre>";
?>

<h1>Exercise 6</h1>
<?php
function remove_all($str, $char) {
    $result = "";

    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] != $char) { 
            $result .= $str[$i];
    }

    return $result;
    }
}

echo remove_all("Summer is here!", 'e') . "<br>";
?>


</body> 
</html>