<?php
    $html = '';
    $logout = '';


    if (isset($_COOKIE['username'])) {
        $username = $_COOKIE['username'];
        $html .= "welcome, $username!";
        $logout = ' | <a href="index.php?logout=1">logout</a>';

    }
    else {
        $html = '<a href="index.php">please login here</a>';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP maintaining state with cookies</title>
    <style>input {display: block;} body {font-family: sans-serif; padding: 64px;}</style>

</head>
<body>
    <h1>PHP maintaining state with cookies</h1>

    <h2>page 2</h2>

    <?php echo $html; ?>

    <hr>

    <a href="index.php">page 1</a> | <a href="index3.php">page 3</a>

    <?php echo $logout; ?>
</body>
</html>