<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" href="media/favicon.png">
    <title>Signing Out...</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    body {
        background: linear-gradient(160deg, rgba(160,197,166,1) 15%, rgba(71,113,103,1) 85%);
    }

    .logoutmsg {
        position: absolute;
        left: 50%;
        top: 40%;
        transform: translate(-50%, -50%);
        border: solid 0.2em #000;
        border-radius: 2em;
        text-align: center;
        padding: 2em;
    }
    .logoutmsg h3 {
        font-family: "Roboto";
        font-weight: 600;
        font-size: 2em;
    }
    .logoutmsg p {
        font-family: "Roboto";
        font-weight: 500;
        font-size: 1.5em;
    }
</style>

<?php
    require_once("assets/dblink.php");

    session_unset();
    
    session_destroy();
    
    echo "<div class='logoutmsg'><h3>Successfully Signed Out</h3><p>Redirecting...</p></div>";

    header("refresh:1;url=index.php");
    exit();
?>