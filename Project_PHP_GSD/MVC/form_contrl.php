<?php

declare(strict_types = 1);

function is_input_empty(string $first_name, string $last_name, string $email, string $message) 
{
    if (empty($first_name) || empty($last_name) || empty($email) || empty($message)) {
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