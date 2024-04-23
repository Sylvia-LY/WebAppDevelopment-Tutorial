<?php
    session_start();
    $session_id = session_id();
    echo "session id: $session_id";

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
    <h1>page 1</h1>
    
    <form action="index2.php" method="POST">
        <label for="firstname">first name: </label>
        <input type="text" id="firstname" name="firstname" required>
        <label for="lastname">last name: </label>
        <input type="text" id="lastname" name="lastname" required>
        <input type="submit" value="next">
    </form>
    
</body>
</html>