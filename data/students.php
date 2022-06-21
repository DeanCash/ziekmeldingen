<?php    
    require_once('assets/dblink.php');
    require_once('assets/functions.php');

    // if not logged in, send back ti login page for safety
    if (!check_logged_in()) {
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/favicon.png">
    <link rel="stylesheet" href="style/indexstyle.css">
    <title>Students - Ziekmeldingen</title>
</head>
<body class="background">
    <!-- include the navbar -->
    <?php require_once("assets/navbar.php"); ?>

<!-- light and dark background toggle script -->
<script defer src="scripts/bgtoggle.js"></script>
</body>
</html>