<?php
    require("assets/dblink.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            background-color: grey;
        }

        form {
            padding-block: 5em;
            gap: 2em;
            display: flex;
            flex-direction: column;
            background-color: lightslategray;
            align-items: center;
        }

        input {
            padding: 1em;
            width: 10%;
            border-radius: 10px;
            border: lightseagreen solid 2px;
        }
    </style>
</head>
<body>
    <?php
        echo "1";
    ?>

    <?php
        header("location:registration.php");
    ?>
</body>
</html>