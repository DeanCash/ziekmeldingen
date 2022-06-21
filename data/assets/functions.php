<?php

// creates select all query - takes in table name
function select_all_q($table): string {
    return "SELECT * FROM $table";
}

// creates stm, executes, and returns results - takes in a query, and PDO object
function exec_and_return (string $query, PDO $pdoconn): array {
    $stm = $pdoconn->prepare($query);
    if ($stm->execute()) {
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
}

// takes in optional start boolean, defaults to true
function check_logged_in(bool $start_if_none = true): bool {
    // if start argument is true, will start a session none already
    if ( (session_status() == PHP_SESSION_NONE) && $start_if_none ) {
        session_start();
    }
    
    // checks if logged_in array key exists, if not create it and set logged_in to false
    if (!array_key_exists('logged_in', $_SESSION)) {
        $_SESSION['logged_in'] = false;
    }
    // when checked return the state of logged_in session variable
    if ($_SESSION['logged_in'] == true) {
        return true;
    } else return false;
}