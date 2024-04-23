<?php
    $html = '';
    $show_form = true;
    $param1 = '';
    $param2 = '';

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (strlen($password) < 8) {
            $html .= '<p>your password must contain at least 8 characters</p>';
        }
        else {
            $username = htmlentities($username);
            $password = htmlentities($password);

            $html = "<p>welcome back, $username!</p>"
                    . '<a href="post.php?param1=' . urlencode($username)
                    . '&param2=' . urlencode($password) . '">edit</a>';

            $show_form = false;

        }

    }

    if (isset($_GET['param1']) && isset($_GET['param2'])) {
        $param1 = $_GET['param1'];
        $param2 = $_GET['param2'];
    }

    
    if ($show_form) {
        $html .= '<form method="POST">'
                . '<label for="username">username</label>'
                . '<input type="text" id="username" name="username" value="'
                . $param1
                . '" required>'
                . '<label for="password">password</label>'
                . '<input type="password" id="password" name="password" value="'
                . $param2
                . '" required>'
                . '<input type="submit" value="login"></form>';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accepting post parameters</title>
    <style>input {display: block;}</style>
</head>
<body>
    <?php echo $html; ?>
    
</body>
</html>