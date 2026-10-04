<?php

include "connection.php";

$firstName = $_POST["firstname"];
$middleName = $_POST["middlename"];
$lastName = $_POST["lastname"];
$email = $_POST["email"];
$age = $_POST["age"];
$birthDate = $_POST["birth_date"];

$stmt = $conn->prepare("INSERT INTO info (firstname, middlename, lastname, email, age, birth_date) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssis", $firstName, $middleName, $lastName, $email, $age, $birthDate);

if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "id" => $conn->insert_id,
        "firstname" => $firstName
    ]);
} else {
    echo json_encode([
        "success" => false
    ]);
}
