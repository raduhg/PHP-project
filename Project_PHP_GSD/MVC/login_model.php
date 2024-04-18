<?php

declare(strict_types=1);

function get_member(object $pdo, string $email) 
{
    $query = "SELECT * FROM members WHERE email = :email;";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":email", $email);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result; //if there is a member with this email a string will be returned, otherwise a boolean will be returned
}

function get_admin($result, $pdo) 
{
    $query = "SELECT COUNT(*) AS count FROM admins WHERE member_id = :member_id";
    $statement = $pdo->prepare($query);
    $statement->execute(['member_id' => $result["id"]]);

    $admin = $statement->fetch(PDO::FETCH_ASSOC);
    $adminPass=$admin['count'];
    return $adminPass > 0; // Returns true if the user is an admin, false if not
}
