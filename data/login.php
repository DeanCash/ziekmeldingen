<?php    
    require_once('assets/dblink.php');
    require_once('assets/functions.php');

    // calling this function because by default I made it so that it starts
    // a session for me if none has been started yet
    if (check_logged_in()) {
        header("location:registration.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/indexstyle.css">
    
    <link rel="icon" href="media/favicon.png">
    <title>Login - Ziekmeldingen</title>
</head>
<body class="login-body">
    <div class="login-wrapper">
        <!-- The left Login form -->
        <div class="login-wrapper-half">
            <h2>Login</h2>
            <form method="POST" class="login-wrapper-form">
                <input type="text" name="login-user" placeholder="Username" maxlength="50" required>
                <input type="password" name="login-password" placeholder="Password" required>
                <input type="submit" name="login-submit" value="Login">
            </form>
            <!-- error message that will only be shown when no account matches login -->
            <div class="login-form-error-message" id="login-error-state">This account doesn't exist!</div>
        </div>
        <!-- The right Register form -->
        <div class="login-wrapper-half">
            <h2>Register</h2>
            <form method="POST" class="login-wrapper-form">
                <input type="text" name="register-user" placeholder="New Username" maxlength="50" required>
                <input type="password" name="register-password" placeholder="New Password" required>
                <input type="submit" name="register-submit" value="Register">
            </form>
            <!-- error message that will only be shown when account already exists -->
            <div class="login-form-error-message" id="register-error-state">Username already taken!</div>
        </div>
    </div>
    <?php
        if (isset($_POST['login-submit'])) {
            $username = $_POST['login-user'];
            $password = $_POST['login-password'];
            $query = select_all_q("accounts");

            $results = exec_and_return($query, $conn);
            foreach ($results as $account) {
                if ( ($username == $account->name) && password_verify($password, $account->password) ) {
                    if (!check_logged_in()) {
                        $_SESSION['logged_in'] = true;
                        
                        header("location:registration.php");
                    } else header("location:registration.php");
                }
            }
            echo "<style>#login-error-state{display:block;}</style>";
        }

        if (isset($_POST['register-submit'])) {
            $account_exists = true;
            $new_username = $_POST['register-user'];
            $new_password = $_POST['register-password'];
            $get_query = select_all_q("accounts");

            $results = exec_and_return($get_query, $conn);
            foreach ($results as $account) {
                if ( $new_username == $account->name ) {
                    echo "<style>#register-error-state{display:block;}</style>";
                    $account_exists = false;
                }
            }
            if ($account_exists) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $query = "INSERT INTO accounts ( name, password ) VALUES ( :username, :password )";
                $stm = $conn->prepare($query);
                $stm->bindParam(":username", $new_username);
                $stm->bindParam(":password", $hashed_password);
                if ($stm->execute()) {
                    if (!check_logged_in()) {
                        $_SESSION['logged_in'] = true;
                        header("location:registration.php");
                    }
                }
            }
        }
    ?>

<script defer src="scripts/index.js"></script>
</body>
</html>