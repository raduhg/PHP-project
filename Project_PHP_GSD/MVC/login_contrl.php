<?php

declare(strict_types=1);

function is_input_empty( string $email, string $psw) 
{
    if (empty($email) || empty($psw)) {
        return true;
    } else {
         return false;
    }
}

 function is_email_wrong(bool|array $result) 
 {
    if (!$result) {
        return true;
    } else {
        return false;
    }
 }

 function is_password_wrong(string $psw, string $hashedPsw) 
 {
    if (!password_verify($psw, $hashedPsw)) {
        return true;
    } else {
        return false;
    }
 }