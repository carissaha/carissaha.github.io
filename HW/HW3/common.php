<?php
function do_header() {
    echo <<<HTML
    <body>
        <div id="bannerarea">
            <h1>
            <span style="color: grey;">Nerd</span>
            <span style="color: blue;">Luv™</span></h1>
            </h1>
            <p>Where Meek Geeks Meet</p>
        </div>
HTML;
}

function do_footer() {
    echo <<<HTML
        <p>This page is for single nerds to meet and date each other! Type in
		your personal information and wait for the nerdly luv to begin!<br>
		Thank you for using our site.</p>
	    
        <p>Results and page (C) Copyright NerdLuv Inc.</p>
	
	    <p><a href="logout.php">Logout</a></p><br><br>
        
        <div id="w3c">
            <p>
                <a href="https://validator.w3.org/">HTML Validator</a> |
                <a href="https://jigsaw.w3.org/css-validator/">CSS Validator</a>
            </p>
        </div>
HTML;
}
?>
