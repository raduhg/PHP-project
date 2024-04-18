<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $psw = $_POST["psw"];

    try {
        require_once "db_connection.php";
        require_once "../MVC/login_model.php";
        require_once "../MVC/login_contrl.php";

        // Error handling
        $errors = [];

        if (is_input_empty($email, $psw)) {
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        $result =  get_member($pdo, $email);
        $admin = get_admin($result, $pdo);

        if (is_email_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect login info!";
        } 

        if (!is_email_wrong($result) && is_password_wrong($psw, $result["psw"])) {
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        require_once "config_session.php";

        if ($errors) { //will return true if errors is not empty
            $_SESSION["errors_login"] = $errors;

            header("Location: ../frontend/for_members.php");
            exit();
        }
        
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"]  = $result["id"];
        $_SESSION["email"]  = $result["email"];
        
        $_SESSION["last_regeneration"] = time();

        if ($admin == true){
            header("Location: ../frontend/admin_profile.php?login=success");
        } else {
            header("Location: ../frontend/member_profile.php?login=success");
        }
        //header("Location: ../frontend/member_profile.php?login=success");
        $pdo = null;
        $statement = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../frontend/for_members.php");
    exit();
}