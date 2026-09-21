<?php

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    http_response_code(405);
    echo json_encode(["message" => "Method not allowed"]);
    exit;
}

require_once "db.php";

try {
    $company = trim((string)($_GET["company"] ?? ""));

    if ($company !== "") {
        $query = $db->prepare(
            "SELECT * FROM registrations
            WHERE company = :company
            ORDER BY id DESC"
        );
        $query->execute([":company" => $company]);
    } else {
        $query = $db->query(
            "SELECT * FROM registrations ORDER BY id DESC"
        );
    }

    echo json_encode($query->fetchAll());
} catch (PDOException $error) {
    http_response_code(500);
    echo json_encode(["message" => "Unable to fetch registrations"]);
}
