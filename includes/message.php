<?php
include 'db.php';

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];
    echo $name . ' ' . $email . ' ' . $phone . ' ' . $message;

    $query = "INSERT INTO messages(message_name, message_email, message_phone, message_text)";
    $query .= "VALUES ('$name', '$email', '$phone', '$message')";

    $insert = mysqli_query($connection, $query);

    if (!$insert) {
        die('Query Failed');
    }
    echo "succesful";
    header("Location: http://localhost/mealfirst/index.php");
}
