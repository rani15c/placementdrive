<?php

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    http_response_code(405);

    echo json_encode([
        "success" => false,
        "message" => "Only POST requests are allowed"
    ]);

    exit;
}

require_once "db.php";

$student_name = trim($_POST["student_name"] ?? "");
$roll_no = trim($_POST["roll_no"] ?? $_POST["roll_number"] ?? "");
$email = trim($_POST["email"] ?? "");
$branch = trim($_POST["branch"] ?? "");
$year = trim($_POST["year"] ?? "");
$company = trim($_POST["company"] ?? "");
$registration_date = trim($_POST["registration_date"] ?? "");

if (
    $student_name === "" ||
    $roll_no === "" ||
    $email === "" ||
    $branch === "" ||
    $year === "" ||
    $company === "" ||
    $registration_date === ""
) {
    echo json_encode([
        "success" => false,
        "message" => "Please fill all fields"
    ]);

    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    echo json_encode([
        "success" => false,
        "message" => "Invalid email address"
    ]);

    exit;
}

try {

    $query = $db->prepare("
        INSERT INTO registrations
        (
            student_name,
            roll_no,
            email,
            branch,
            year,
            company,
            registration_date
        )
        VALUES
        (
            :student_name,
            :roll_no,
            :email,
            :branch,
            :year,
            :company,
            :registration_date
        )
    ");

    $query->execute([
        ":student_name" => $student_name,
        ":roll_no" => $roll_no,
        ":email" => $email,
        ":branch" => $branch,
        ":year" => $year,
        ":company" => $company,
        ":registration_date" => $registration_date
    ]);

    echo json_encode([
        "success" => true,
        "message" => "Registration successful"
    ]);

} catch (PDOException $error) {

    http_response_code(500);

    echo json_encode([
        "success" => false,
        "message" => "Registration failed",
        "error" => $error->getMessage()
    ]);
}

?>