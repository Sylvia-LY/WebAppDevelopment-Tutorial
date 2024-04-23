<?php
    session_start();

    if (isset($_POST['height'])) {
        $_SESSION['height'] = $_POST['height'];
    }
    if (isset($_POST['shoesize'])) {
        $_SESSION['shoesize'] = $_POST['shoesize'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>maintaining state with sessions</title>
    <style>input {display: block;}</style>
</head>
<body>
    <h1>page 3</h1>
    
    <form action="index4.php" method="POST">
        <label for="color">favorite color: </label>
        <input type="text" id="color" name="color" required>
        <label for="bagel">bagel</label>
        <input type="radio" id="bagel" name="food" value="bagel" checked>
        <label for="donut">donut</label>
        <input type="radio" id="donut" name="food" value="donut">

        <input type="submit" value="next">
    </form>
    
</body>
</html>