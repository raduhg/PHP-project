<?php

declare(strict_types = 1);

function is_input_empty(string $first_name, string $last_name, string $age, string $phone_number, string $email, string $psw) 
{
    if (empty($first_name) || empty($last_name) || empty($age) || empty($phone_number) || empty($email) || empty($psw)) {
        return true;
    } else {
         return false;
    }
}

function is_email_invalid(string $email) 
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
         return false;
    }
}

function is_email_taken(object $pdo, string $email) 
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
         return false;
    }
}

function create_user(object $pdo, string $first_name, string $last_name, string $age, string $phone_number, string $email, string $psw)
{
    set_user($pdo, $first_name, $last_name, $age, $phone_number, $email, $psw);
}