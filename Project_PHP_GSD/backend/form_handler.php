<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = htmlspecialchars( $_POST["first-name"]);
    $lastName = htmlspecialchars ($_POST["last-name"]);
    $email = htmlspecialchars ($_POST["email"]);
    $message = htmlspecialchars ($_POST["message"]);

    try {
        require_once "db_connection.php";
        require_once "../MVC/form_model.php";
        require_once "../MVC/form_contrl.php";

        // Error handling
        $errors = [];

        if (is_input_empty($firstName, $lastName, $email, $message)) {
            $errors["message_error"] = "All fields must be filled";
        }

        if (is_email_invalid($email)) {
            $errors["email_invalid"] = "Invalid email";
        } 

        require_once "config_session.php";

        if ($errors) { //will return true if errors is not empty
            $_SESSION["errors_contact_form"] = $errors;

            $formData = [
                "first_name" => $firstName,
                "last_name" => $lastName,
                "email" => $email,
                "message" => $message
            ];
            $_SESSION["form_data"] = $formData;

            header("Location: ../frontend/contact.php");
            exit();
         } 

        set_message($pdo, $firstName, $lastName, $email, $message);

        header("Location: ../frontend/contact.php?message=success");

        $pdo = null;

        die();

    }catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header ("Location: ../frontend/contact.php");
}
