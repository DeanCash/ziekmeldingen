<!DOCTYPE html>
<?php    
    require_once('assets/dblink.php');
    require_once('assets/functions.php');

    // if not logged in, send back ti login page for safety
    if (!check_logged_in()) {
        header("location:login.php");
    }
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

    <div class="overview-content-wrapper">
        <table class="overview-table">
            <tr>
                <th>naam</th>
                <th>geboortedatum</th>
                <th>ziektegeschiedenis</th>
            </tr>

            <?php
                $query = "SELECT * FROM registration";
                $results = exec_and_return($query, $conn);
                foreach ($results as $student) {
                    echo
                    "<tr>".
                        "<td>$student->name</td>".
                        "<td>$student->dateofbirth</td>".
                        "<td><a style='color: cyan; text-decoration: underline;' href='student.php?studentid=$student->sid'>Geschiedenis</a></td>".
                    "</tr>";
                }
            ?>
        </table>
    </div>

<!-- light and dark background toggle script -->
<script defer src="scripts/index.js"></script>
</body>
</html>