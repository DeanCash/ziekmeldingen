<!DOCTYPE html>
<?php    
    require_once('assets/dblink.php');
    require_once('assets/functions.php');

    // if not logged in with account, send back ti login page for safety
    if (!check_logged_in()) {
        header("location:login.php");
    }

    // student card status colors - later used in cards
    $present_color = "rgba(63, 240, 75, 0.8)";
    $absent_color = "rgba(240, 90, 63, 0.8)";

    // check if any of the buttons are clicked
    $present = 1;
    $absent = 0;

    if(isset($_POST['submitPresent'])) {
        $studentid = $_POST['studentid'];
        $updateAttendenceQuery = "UPDATE registration SET present='$present' WHERE sid='$studentid'";
    }
    if(isset($_POST['submitAbsent'])) {
        $studentid = $_POST['studentid'];
        $updateAttendenceQuery = "UPDATE registration SET present='$absent' WHERE sid='$studentid'";
    }

    // if any of the buttons are clicked, update the current students prescence
    if ( isset($_POST['submitPresent']) || isset($_POST['submitAbsent']) ) {
        $stm = $conn->prepare($updateAttendenceQuery);
        if ($stm->execute()) {
            debug_to_console("Updated Students Prescence!", WARN);
        } else debug_to_console("Something went wrong with updating students prescence.", LOG);
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/favicon.png">
    <link rel="stylesheet" href="style/indexstyle.css">
    <title>Registration - Ziekmeldingen</title>
</head>
<body class="background">
    <!-- include the navbar -->
    <?php require_once("assets/navbar.php"); ?>

    <!-- Main page content -->
    <main class="content-wrapper">
        <?php
            // create query with custom function
            $query = select_all_q("registration");
            $stm = $conn->prepare($query);
            if ($stm->execute()) {
                // store results
                $results = $stm->fetchAll(PDO::FETCH_OBJ);
                foreach ($results as $student) {
                    // set the students status bar to correspond to their current attendance
                    if ($student->present) {
                        $attendance = "Present";
                        $status_bar_color = $present_color;
                    } else {
                        $attendance = "Absent";
                        $status_bar_color = $absent_color;
                    }
                    // create a student card on screen
                    echo
                    "<div class='student-card'>".
                        "<div style='background: url($student->profilepicture); background-position: center; background-repeat: no-repeat; background-size: cover;' class='student-card-img'></div>".
                        "<div class='student-name-bar'>$student->name</div>".
                        "<div style='background-color: $status_bar_color;' class='student-status-bar'>$attendance</div>".
                        "<form method='POST' class='student-status-buttons'>".
                            "<input class='present-button' name='submitPresent' type='submit' value='Present'>".
                            "<input class='absent-button' name='submitAbsent' type='submit' value='Absent'>".
                            "<input style='display: none;' name='studentid'  value='$student->sid'>".
                        "</form>".
                    "</div>";
                }
            }
        ?>
    </main>  

<!-- light and dark background toggle script -->
<script defer src="scripts/index.js"></script>
</body>
</html>