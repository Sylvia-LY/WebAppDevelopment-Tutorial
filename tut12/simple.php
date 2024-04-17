
<?php
    $html = '';

    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['phone'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];

        // check values
        // - empty/ correct length?
        // - format? allowed characters?
        // ...
        // sanitise values with mysqli::real_escape_string()

        $mysqli = new mysqli('localhost', 'user', 'password', 'database');

        // check if db connection successful

        $sql = "insert into `people` (`firstname`, `lastname`, `phone`)"
                . " values ('$firstname', '$lastname', '$phone');";

        $mysqli->query($sql);

        // check if query executed successfully
        
        $id = $mysqli->insert_id;

        $mysqli->close();
    }


    if (isset($id)) {
        $html = "<p>$firstname $lastname was added to the database</p>"
                . '<a href="'
                . $_SERVER["PHP_SELF"]
                . '">add another</a>';
    }
    else {
        $html = '<form method="POST" action="'
                . $_SERVER["PHP_SELF"]
                . '">'
                . '<label for="firstname">first name:</label>'
                . '<input type="text" name="firstname" id="firstname">'
                . '<label for="lastname">last name:</label>'
                . '<input type="text" name="lastname" id="lastname">'
                . '<label for="phone">phone:</label>'
                . '<input type="text" name="phone" id="phone">'
                . '<input type="submit" value="add person">'
                . '</form>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>simple db example</title>
    <style>input {display: block;} body {font-family: sans-serif; padding: 64px;}</style>
</head>
<body>
    <h1>simple db example</h1>
    <?php echo $html; ?>
</body>
</html>