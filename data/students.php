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
    <title>Students - Ziekmeldingen</title>
</head>
<body class="background bg-color">
    <!-- include the navbar -->
    <?php require_once("assets/navbar.php"); ?>

    <div class="register-student">
        <h2>Create Student</h2>
        <form method="post" class="register-form">
            <input type="text" name='name' maxlength="50" placeholder="student name" required>
            <input type="text" name='profilepicture' placeholder="profile picture link" required>
            <input type="date" name='dateofbirth' required>
            <input type="submit" name='createstudent' value='Add'>
        </form>
        <div class='student-toegevoegd-msg'>Student is toegevoegd!</div>
    </div>

    <?php
        if (isset($_POST['createstudent'])) {
            $studentname = $_POST['name'];
            $profilepicture = $_POST['profilepicture'];
            $dateofbirth = $_POST['dateofbirth'];
            
            $query = "INSERT INTO registration( name, profilepicture, dateofbirth, present ) VALUES ( '$studentname', '$profilepicture', '$dateofbirth', '1' )";
            $stm = $conn->prepare($query);
            if ($stm->execute()) {
                echo "<style>.student-toegevoegd-msg { display: block; }</style>";
            } else {
                $fileName = basename($_SERVER['PHP_SELF']);
                debug_to_console("Executing INSERT query failed - $fileName", ERROR);
            }
        }
    ?>

<!-- light and dark background toggle script -->
<script defer src="scripts/index.js"></script>
</body>
</html>