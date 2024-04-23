<?php

    $html = '';
    session_start();

    if (isset($_POST['color'])) {
        $_SESSION['color'] = $_POST['color'];

    }
    if (isset($_POST['food'])) {
        $_SESSION['food'] = $_POST['food'];
    }

    foreach ($_SESSION as $key => $value) {
        $html .= "<p>$key: $value</p>";
    }

    session_destroy();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>maintaining state with sessions</title>
</head>
<body>
    <h1>results</h1>

    <?php echo $html; ?>
    <hr>

    <a href="index.php">start again</a>


</body>
</html>