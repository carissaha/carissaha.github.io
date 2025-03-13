<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup - NerdLuv</title>
    <link rel="stylesheet" href="nerdluv.css">
</head>
<body>
    <h1>NerdLuv</h1>
    <fieldset>
        <legend>New User Signup:</legend>
        <form action="signup-submit.php" method="post">
            <label><strong>Name:</strong></label> 
            <input type="text" name="name" maxlength="16" required><br>

            <label><strong>Gender:</strong></label> 
            <input type="radio" name="gender" value="M" required> Male 
            <input type="radio" name="gender" value="F"> Female<br>

            <label><strong>Age:</strong></label> 
            <input type="number" name="age" min="18" max="99" required><br>

            <label><strong>Personality Type:</strong></label> 
            <input type="text" name="personality" maxlength="4" pattern="[IE][NS][TF][JP]" required>
            <small>Example: INTJ</small><br>

            <label><strong>Favorite OS:</strong></label>
            <select name="os" required>
                <option value="Windows">Windows</option>
                <option value="Mac OS X">Mac OS X</option>
                <option value="Linux">Linux</option>
            </select><br>

            <label><strong>Seeking Age:</strong></label> 
            <input type="number" name="minage" min="18" max="99" required> to
            <input type="number" name="maxage" min="18" max="99" required><br>

            <input type="submit" value="Sign Up">
        </form>
    </fieldset>
</body>
</html>
