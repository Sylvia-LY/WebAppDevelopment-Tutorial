<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index of examples</title>
</head>
<body>
    <h1>index of examples</h1>
    <?php
        $handle = opendir('.');
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != ".." && $entry != basename(__FILE__)) {
                echo "<p><a href='./$entry'>$entry</a></p>";
            }
        }
    ?>

    
</body>
</html>