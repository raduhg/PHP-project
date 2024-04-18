<?php

function form_inputs() {

    //first name
    if (isset($_SESSION["form_data"]["first_name"])) {
        echo '<div class="form-row">';
        echo '<div class="input-box">';
        echo '<span>First Name</span>';
        echo '<input id="first-name" type="text" name="first-name" value="'.$_SESSION["form_data"]["first_name"] .'">';
        echo '</div>';
    } else {
        echo '<div class="form-row">';
        echo '<div class="input-box">';
        echo '<span>First Name</span>';
        echo '<input id="first-name" type="text" name="first-name">'; 
        echo '</div>';
    }

    //last name
    if (isset($_SESSION["form_data"]["last_name"])) {
        echo '<div class="input-box">';
        echo '<span>Last Name</span>';
        echo '<input id="last-name" type="text" name="last-name" value="'.$_SESSION["form_data"]["last_name"] .'">';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<div class="input-box">';
        echo '<span>Last Name</span>';
        echo ' <input id="last-name" type="text" name="last-name">'; 
        echo '</div>';
        echo '</div>';
    }

    //email
    if (isset($_SESSION["form_data"]["email"]) && !isset($_SESSION["errors_contact_form"]["email_invalid"])) {
        echo '<div class="form-row">';
        echo '<div class="input-box">';
        echo '<span>Your email</span>';
        echo '<input id="email" type="email" name="email" value="'.$_SESSION["form_data"]["email"] .'">';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<div class="form-row">';
        echo '<div class="input-box">';
        echo '<span>Your email</span>';
        echo '<input id="email" type="email" name="email">'; 
        echo '</div>';
        echo '</div>';
    }

    //message
    if (isset($_SESSION["form_data"]["message"])) {
        echo '<div class="form-row-message">';
        echo '<div class="input-box">';
        echo '<span>Your message</span>';;
        echo '<textarea id="message" name="message"  placeholder="Write your message or question"'.$_SESSION["form_data"]["message"] .'"></textarea>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<div class="form-row-message">';
        echo '<div class="input-box">';
        echo '<span>Your message</span>';
        echo '<textarea id="message" name="message"  placeholder="Write your message or question"></textarea>'; 
        echo '</div>';
        echo '</div>';
    }
}

function check_form_errors() 
{
    if (isset($_SESSION["errors_contact_form"])){
        $errors = $_SESSION["errors_contact_form"];

         echo "<br>";

        foreach ($errors as $error) {
            echo '<p class="errors">' .$error . '</p>';
        }

        unset($_SESSION["errors_contact_form"]);
    } else if (isset($_GET["message"]) && $_GET["message"] == "success") {
        unset($_SESSION["form_data"]);
        echo '<p class="success">Message sent successfuly!</p>';
    }
}