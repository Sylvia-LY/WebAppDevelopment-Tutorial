<?php
    $html = '';
    $logout = '';

    if (isset($_COOKIE['username'])) {
        if (isset($_GET['logout'])) {
            setcookie('username', '', time()-60*60);
        }
        else {
            $username = $_COOKIE['username'];
        }
    }
    elseif (isset($_POST['username']) && isset($_POST['password'])) {
        // check password here

        $username = $_POST['username'];
        setcookie('username', $username, time()+60*60);
    }


    if (isset($username)) {
        $html .= "welcome, $username!";
        $logout = ' | <a href="index.php?logout=1">logout</a>';
    }
    else {
        $html .= '<form action="'
                . $_SERVER["PHP_SELF"]
                . '" method="POST">'
                . '<label for="username">username</label>'
                . '<input type="text" name="username" id="username">'
                . '<label for="password">password</label>'
                . '<input type="password" name="password" id="password">'
                . '<input type="submit" value="login">'
                . '</form>';
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

    <h2>page 1</h2>

    <?php echo $html; ?>

    <hr>

    <a href="index2.php">page 2</a> | <a href="index3.php">page 3</a>

    <?php echo $logout; ?>
    
</body>
</html>