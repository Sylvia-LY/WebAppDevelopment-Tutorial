<?php
    session_start();


    if (isset($_POST['firstname'])) {
        $_SESSION['firstname'] = $_POST['firstname'];
    }
    if (isset($_POST['lastname'])) {
        $_SESSION['lastname'] = $_POST['lastname'];
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
    <h1>page 2</h1>
    
    <form action="index3.php" method="POST">
        <label for="height">height: </label>
        <input type="text" id="height" name="height" required>
        <label for="shoesize">shoe size: </label>
        <input type="text" id="shoesize" name="shoesize" required>
        <input type="submit" value="next">
    </form>
    
</body>
</html>