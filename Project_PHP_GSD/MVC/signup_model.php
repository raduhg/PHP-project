<?php

declare(strict_types = 1);

function get_email(object $pdo, string $email)
{
    $query = "SELECT email FROM members WHERE email = :email;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":email", $email);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $first_name, string $last_name, string $age, string $phone_number, string $email, string $psw)
{
    $query = "INSERT INTO members (email, psw, phone, first_name, last_name, age) VALUES(:email, :psw, :phone, :first_name, :last_name, :age);";

    $statement = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];

    //hashing the password
    $hashedPsw = password_hash($psw, PASSWORD_BCRYPT, $options);

    $statement->bindParam(":email", $email);
    $statement->bindParam(":psw", $hashedPsw);
    $statement->bindParam(":first_name", $first_name);
    $statement->bindParam(":last_name", $last_name);
    $statement->bindParam(":phone", $phone_number);
    $statement->bindParam(":age", $age);
    $statement->execute();
}