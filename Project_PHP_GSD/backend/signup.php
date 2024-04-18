<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = $_POST["first-name"];
    $last_name = $_POST["last-name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone-number"];
    $psw = $_POST["psw"];

    try {
        require_once "db_connection.php";
        require_once "../MVC/signup_model.php";
        require_once "../MVC/signup_contrl.php";

        // Error handling
        $errors = [];

        if (is_input_empty($first_name, $last_name, $age, $phone_number, $email, $psw)) {
            $errors["empty_input"] = "All fields must be filled!";
        }

        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Use of invalid email!";
        }

        if (get_email($pdo, $email)) {
            $errors["email_taken"] = "Email already registered!";
        }

        require_once "config_session.php";

        if ($errors) { //will return true if errors is not empty
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "age" => $age,
                "phone_number" => $phone_number,
                "email" => $email
            ];
            $_SESSION["signup_data"] = $signupData;

            header("Location: ../frontend/for_members.php");
            exit();
        }

        create_user($pdo, $first_name, $last_name, $age, $phone_number, $email, $psw);
 
        header("Location: ../frontend/for_members.php?signup=success");

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

