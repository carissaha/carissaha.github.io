<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education up in Here!</title>
		<link href="https://codd.cs.gsu.edu/~lhenry23/Web/cws/cw05/buyagrade.css" type="text/css" rel="stylesheet" />
	</head>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $section = isset($_POST['section']) ? $_POST['section'] : '';
        $card = isset($_POST['card']) ? $_POST['card'] : '';
        $cardType = isset($_POST['cardType']) ? $_POST['cardType'] : '';

        if (empty($name) || empty($section) || empty($card) || empty($cardType) || !isset($_POST['sucker'])) {
            echo "<h1>Sorry</h1>";
            echo "<p>You didn't fill out the form completely. <a href='buyagrade.html'>Try again?</a></p>";
        }
        else {
            $data = "$name;$section;$card;$cardType\n";
            file_put_contents('suckers.html', $data, FILE_APPEND);
            
    
    ?>

    <body>
        <h1>Thanks, sucker!</h1>
        <p>Your information has been recorded.</p>
        
        <dl>
			<dt>Name</dt>
			<dd><?php print $_POST['name']; ?></dd>

            <dt>Section</dt>
			<dd><?php print $_POST['section']; ?></dd>

            <dt>Credit Card</dt>
			<dd><?php print $_POST['card'] . ' (' . $_POST['cardType'] . ')'; ?></dd>
        </dl>

            <p>Here are all the suckers who have submitted here:</p>
            <pre>
                <?php
                $suckers = file_get_contents('suckers.html');
                echo $suckers;
                ?>
            </pre>
    </body>
    <?php
        }
    }
    ?>
</html>