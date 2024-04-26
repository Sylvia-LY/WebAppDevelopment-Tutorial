<?php
    $html = '';

    $mysqli = new mysqli('localhost', 'user', 'password', 'database');

    if (isset($_GET['add']) || isset($_GET['edit'])) {
        $form_id = '';
        $firstname = '';
        $lastname = '';
        $phone = '';

        if (isset($_GET['edit']) && isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "select firstname, lastname, phone from people where id=$id";
            if ($result = $mysqli->query($query)) {
                $row = $result->fetch_assoc();
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $phone = $row['phone'];

                $form_id = '<input name="id" type="hidden" value="'. $id . '">';
            }
        }

        $html = '<form method="POST" action="advanced.php">'
                . '<label for="firstname">first name</label>'
                . '<input id="firstname" name="firstname" type="text" value="' . $firstname . '" required>'
                . '<label for="lastname">last name</label>'
                . '<input id="lastname" name="lastname" type="text" value="' . $lastname . '" required>'
                . '<label for="phone">phone</label>'
                . '<input id="phone" name="phone" type="text" value="' . $phone . '" required>'
                . $form_id
                . '<input type="submit" value="submit">'
                . '</form>';

    }
    else {
        if (isset($_POST['firstname'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $phone = $_POST['phone'];

            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $query = "update people set firstname='$firstname', lastname='$lastname', phone='$phone' where id=$id";
            }
            else {
                $query = "insert into people (firstname, lastname, phone) values ('$firstname', '$lastname', '$phone')";
            }
            $mysqli->query($query);

            
        }
        elseif (isset($_GET['delete']) && isset($_GET['id'])) {
            $query = 'delete from people where id=' . $_GET['id'];
            $mysqli->query($query);

        }


        $query = 'select * from people';
        if ($result = $mysqli->query($query)) {
            $html = '<table>';
            while ($row = $result->fetch_assoc()) {
                $html .= '<tr>'
                        . '<td>' . $row['id'] . '</td>'
                        . '<td>' . $row['firstname'] . '</td>'
                        . '<td>' . $row['lastname'] . '</td>'
                        . '<td>' . $row['phone'] . '</td>'
                        . '<td>'
                        . '<a href="advanced.php?edit=1&id=' . $row['id'] . '">edit</a>'
                        . ' | '
                        . '<a href="advanced.php?delete=1&id=' . $row['id'] . '">delete</a>'
                        . '</td>'
                        . '</tr>';
            }
            $html .= '<tr>'
                    . '<td></td><td></td><td></td><td></td>'
                    . '<td><a href="advanced.php?add=1">add</a></td>'
                    . '</tr>'
                    . '</table>';
        }

        $mysqli->close();



    }





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>advanced database example</title>
    <style>input {display: block;} body {font-family: sans-serif; padding: 64px;}</style>
</head>
<body>
    <h1>advanced database example</h1>

    <?php echo $html; ?>
    
</body>
</html>