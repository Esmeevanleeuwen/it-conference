<?php
require './db/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];
    $specialty_id = $_POST['specialty_id'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE attandee SET first_name = :first_name, last_name = :last_name, date_of_birth = :date_of_birth, specialty_id = :specialty_id, email = :email, phone = :phone WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':date_of_birth', $date_of_birth);
    $stmt->bindParam(':specialty_id', $specialty_id);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);

    if ($stmt->execute()) {
        header('Location: successmessage.php');
    } else {
        echo 'error';
        print_r($stmt->errorInfo());
    }
} else {
    echo 'Invalid request method';
}
?>
