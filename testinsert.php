<?php

require_once "db.php";

try {

    $query = $db->prepare("
        INSERT INTO registrations
        (student_name, roll_no, email, branch, year, company, registration_date)
        VALUES
        (?, ?, ?, ?, ?, ?, ?)
    ");

    $query->execute([
        "Test Student",
        "TEST001",
        "test@gmail.com",
        "AIML",
        "3rd Year",
        "TCS",
        date("Y-m-d")
    ]);

    echo "INSERT SUCCESSFUL";

} catch (PDOException $error) {

    echo "INSERT FAILED: " . $error->getMessage();

}

?>