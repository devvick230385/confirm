<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logged</title>
</head>
<body>
    <?php

        if(isset($_GET['ins'])){
            $good = $_GET['ins'];
            echo '<h1>Welcome to the page '.$good.'</h1>';
        }

    ?>
</body>
</html>