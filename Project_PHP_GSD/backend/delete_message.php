<?php

if (isset($_POST['id']) && !empty($_POST['id'])) {
    try {
        require_once "db_connection.php";

        $query = "DELETE FROM messages WHERE message = :message";
        $statement = $pdo->prepare($query);
        $statement->bindParam(':message', $_POST['message']);
        $statement->execute();

        header("Location: ../frontend/admin_profile.php?delete=success");
        exit();
    } catch (PDOException $e) {
        header("Location: ../frontend/admin_profile.php?delete=error");
        exit();
    }
} else {
    header("Location: ../frontend/admin_profile.php?delete=error");
    exit();
}
