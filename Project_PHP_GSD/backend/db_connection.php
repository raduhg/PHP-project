<?php
//creates the connection between the php and the database
$dsn = "mysql:host=localhost;dbname=sa_homework";
$dbusername = "root";
$dbpassword = "Raduhang3002!";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection to the database failed: " . e->getMessage();
}