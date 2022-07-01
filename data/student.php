<!DOCTYPE html>
<?php    
    require_once('assets/dblink.php');
    require_once('assets/functions.php');

    // if not logged in, send back ti login page for safety
    if (!check_logged_in()) {
        header("location:login.php");
    }

    $studentid = $_GET['studentid'];

    $student = exec_and_return("SELECT * FROM registration WHERE sid='$studentid'", $conn);
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/favicon.png">
    <link rel="stylesheet" href="style/indexstyle.css">
    <title>Students - Overzicht</title>
</head>
<body class="background">
    <!-- include the navbar -->
    <?php require_once("assets/navbar.php"); ?>

    <div class="studentpage-wrapper">
        <div style='background: url($student->profilepicture); background-position: center; background-repeat: no-repeat; background-size: cover;' class='studentpage-img'></div>
    </div>

<!-- light and dark background toggle script -->
<script defer src="scripts/index.js"></script>
</body>
</html>