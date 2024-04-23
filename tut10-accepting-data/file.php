<?php
    $html = '';
    $show_form = false;


    if (isset($_POST['caption']) && isset($_FILES['image'])) {

        $caption = htmlentities($_POST['caption']);
        $source = $_FILES['image']['tmp_name'];
        $target = $_FILES['image']['name'];

        if (move_uploaded_file($source, $target)) {
            $html = '<figure>'
                    . "<img src=\"$target\" alt=\"$caption\">"
                    . "<figcaption>$caption</figcaption>"
                    . '</figure>';
        }
        else {
            $html = '<p>upload failed, try again</p>';
            $show_form = true;
        }

    }
    else {
        $show_form = true;
    }
    

    if ($show_form) {
        $html .= '<form action="'
                . $_SERVER['PHP_SELF']
                . '" method="POST" enctype="multipart/form-data">'
                . '<label for="caption">caption: </label>'
                . '<input type="text" id="caption" name="caption" required>'
                . '<label for="image">upload image: </label>'
                . '<input type="file" id="image" name="image" accept=".jpg,.png,.gif" required>'
                . '<input type="submit" value="upload">'
                . '</form>';

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP accepting data</title>
    <style>input {display: block;}</style>
</head>
<body>
    <?php echo $html; ?>
    
</body>
</html>