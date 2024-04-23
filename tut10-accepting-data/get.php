<?php
    $html = 'please call me with 2 get parameters called param1 and param2';


    if (isset($_GET['param1']) && isset($_GET['param2'])) {

        // get parameters and convert html tags to entities
        $param1 = htmlentities($_GET['param1']);
        $param2 = htmlentities($_GET['param2']);

        // output
        $html = "output: $param1 $param2";
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accepting get parameters</title>
</head>
<body>

    <?php echo $html; ?>
    
</body>
</html>