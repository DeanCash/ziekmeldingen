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
    $ispresent = $student[0]->present ? "Aanwezig" : "Afwezig";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/favicon.png">
    <link rel="stylesheet" href="style/indexstyle.css">
    <title>Student - Ziekmeldingen</title>
</head>
<body class="background">
    <!-- include the navbar -->
    <?php require_once("assets/navbar.php"); ?>

    <div class="studentpage-wrapper">
        <div class="studentpage-topinfo">
            <div style='background: url(<?= $student[0]->profilepicture ?>); background-position: center; background-repeat: no-repeat; background-size: cover;' class='studentpage-img'></div>
            <h2><?= $student[0]->name ?></h2>
            <h3><?= $ispresent ?></h3>
        </div>
        <table class="studentpage-table">
            <tr>
                <th>Ziekdatum</th>
                <th>Beterdatum</th>
                <th>Reden</th>
                <th>Bewerk</th>
            </tr>
            <?php
                echo
                "<form method='POST'>".
                    "<tr>".
                        "<td>1</td>".
                        "<td>2</td>".
                        "<td><input type='text' name='reden'></td>".
                        "<td><input type='submit' value='bewerk' name='bewerkbtn'></td>".
                    "</tr>".
                "</form>";
            ?>
            </table>
    </div>

    <?php
        if(isset($_POST['bewerkbtn'])) {
            $reden = $_POST['reden'];
            debug_to_console("$reden", ERROR);
        }
    ?>

<!-- light and dark background toggle script -->
<script defer src="scripts/index.js"></script>
</body>
</html>