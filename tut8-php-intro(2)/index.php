<?php
    require './utils.php';

    // the output
    $html = '';


    // q4
    $html .= wrap_html('h1', 'simple arrays');

    $names = array('Jeffery', 'Tom', 'Alex');
    sort($names, SORT_STRING);

    $ul = '';
    foreach ($names as $name) {
        $ul .= wrap_html('li', $name);
    }
    $html .= wrap_html('ul', $ul);


    $ul = '';
    foreach ($names as $name) {
        $ul .= wrap_html('li', strrev($name));
    }
    $html .= wrap_html('ul', $ul);

    $html .= wrap_html('p', implode(', ', $names));

    $cnt = 0;
    foreach ($names as $name) {
        $cnt += strlen($name);
    }
    $html .= wrap_html('p', "the total number of letters in these names is $cnt");

    // q5
    $html .= wrap_html('h1', 'associative arrays');
    $countries = array('UK' => 67330000, 'USA' => 331900000, 'Hungary' => 9710000);
    $table = '';
    foreach ($countries as $name => $population) {
        $table .= wrap_html('tr', wrap_html('td', $name) . wrap_html('td', $population));
    }

    $html .= wrap_html('table', $table);


    // q6
    $html .= wrap_html('h1', 'multi-dimensional arrays');

    $users = array(array('username' => 'Atsuko', 'followers' => 313, 'posts' => 3), 
                array('username' => 'katze99', 'followers' => 32, 'posts' => 389), 
                array('username' => 'Kitty', 'followers' => 91230, 'posts' => 2371));

    $html .= wrap_html('textarea', json_encode($users, JSON_PRETTY_PRINT));


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>textarea {width: 480px; height: 480px;}</style>
    <title>PHP introduction (2)</title>
</head>

<body>
    <?php echo $html; ?>
</body>

</html>