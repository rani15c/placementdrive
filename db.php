<?php

$host = "localhost";
$dbname = "placement_drive";
$username = "root";
$password = "";

try {

    $db = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $db->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $error) {

    die("Database connection failed: " . $error->getMessage());

}

?>