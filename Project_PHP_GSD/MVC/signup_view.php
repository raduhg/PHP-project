<?php

declare(strict_types = 1);

function signup_inputs() {

    //first name
    if (isset($_SESSION["signup_data"]["first_name"])) {
        echo '<input type="text" class="form-control my-3 input-opacity" id="first-name" name="first-name" aria-describedby="personal-info" placeholder="First name" value="'.$_SESSION["signup_data"]["first_name"] .'">';
    } else {
        echo '<input type="text" class="form-control my-3 input-opacity" id="first-name" name="first-name" aria-describedby="personal-info" placeholder="First name">'; 
    }

    //last name
    if (isset($_SESSION["signup_data"]["last_name"])) {
        echo '<input type="text" class="form-control my-3 input-opacity" id="last-name" name="last-name" aria-describedby="personal-info" placeholder="Last name" value="'.$_SESSION["signup_data"]["last_name"] .'">';
    } else {
        echo ' <input type="text" class="form-control my-3 input-opacity" id="last-name" name="last-name" aria-describedby="personal-info" placeholder="Last name">'; 
    }

    //age
    if (isset($_SESSION["signup_data"]["age"])) {
        echo '<input type="number" class="form-control my-3 input-opacity" id="age" name="age" aria-describedby="personal-info" placeholder="Your age" value="'.$_SESSION["signup_data"]["age"] .'">';
    } else {
        echo '<input type="number" class="form-control my-3 input-opacity" id="age" name="age" aria-describedby="personal-info" placeholder="Your age">';
    }

    //phone number
    if (isset($_SESSION["signup_data"]["phone_number"])) {
        echo '<input type="phone" class="form-control my-3 input-opacity" id="phone" name="phone-number" aria-describedby="personal-info" placeholder="Phone number" value="'.$_SESSION["signup_data"]["phone_number"] .'">';
    } else {
        echo '<input type="phone" class="form-control my-3 input-opacity" id="phone" name="phone-number" aria-describedby="personal-info" placeholder="Phone number">'; 
    }

    //email
    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_taken"]) && !isset($_SESSION["errors_signup"]["invalid_email"])) {
        echo '<input type="email" class="form-control my-3 input-opacity" id="signup-email" name="email" aria-describedby="personal-info" placeholder="Email" value="'.$_SESSION["signup_data"]["email"] .'">';
    } else {
        echo '<input type="email" class="form-control my-3 input-opacity" id="signup-email" name="email" aria-describedby="personal-info" placeholder="Email">'; 
    }

    //password
    echo '<input type="password" class="form-control my-3 input-opacity" id="signup-password" name="psw" placeholder="Password">';
    echo '<small id="personal-info" class="form-text text-color">We will never share your personal info with anyone else.</small>';
}

function check_signup_errors() 
{
    if (isset($_SESSION["errors_signup"])){
        $errors = $_SESSION["errors_signup"];

         echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="errors">' .$error . '</p>';
        }

        unset($_SESSION["errors_signup"]);
    } else if (isset($_GET["signup"]) && $_GET["signup"] == "success") {
        echo '<p class="success">Signup success! You are now a member.</p>';
        
    }
}