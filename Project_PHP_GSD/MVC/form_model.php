<?php

declare(strict_types = 1);

function set_message(object $pdo, string $firstName, string $lastName, string $email, string $message)
{
    $query = "INSERT INTO messages (first_name, last_name, email, message) VALUES(:first_name, :last_name, :email, :message);";

    $statement = $pdo->prepare($query);

    
    $statement->bindParam(":first_name", $firstName);
     $statement->bindParam(":last_name", $lastName);
    $statement->bindParam(":email", $email);
    $statement->bindParam(":message", $message);
    $statement->execute();
}