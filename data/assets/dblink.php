<?php

    //* DATA = "text"   ||   MODE = [log - warn - error]

    // defining some constants - you can use these for the second argument
    // of the debug_to_console function, instead of typing it all out as a string
    define("LOG", "log");
    define("WARN", "warn");
    define("ERROR", "error");
    
    // PHP function where you can log something to the web console
    // defaults to a standard log, but can be a warn or error messge
    function debug_to_console(string $data, string $mode = LOG)
    {
        if ($mode == "log") {
            echo "<script>console.log('$data');</script>";
        }
        
        if ($mode == "warn") {
            echo "<script>console.warn('$data');</script>";
        }

        if ($mode == "error") {
            echo "<script>console.error('$data');</script>";
        }
    }

    $host     = "localhost";
    $dbname   = "ziekmeldingen";
    $user     = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        debug_to_console("CONNECTION DATABASE SUCCESS", LOG);
    } catch (PDOException $ex) {
        debug_to_console("CONNECTION DATABASE FAILED. || Try checking XAMPP", ERROR);
    }

?>