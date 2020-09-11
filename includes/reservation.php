<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $count = $_POST['count'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $status = $_POST['status'];
    echo $name . ' ' . $email . ' ' . $phone . ' ' . $count . ' ' . $date . ' ' . $time;

    $query = "INSERT INTO customer(customer_name, customer_email, customer_phone, customer_count, date, time, status)";
    $query .=  "VALUES ('$name', '$email', '$phone', '$count', '$date', '$time', 'pending approval')";

    $insert = mysqli_query($connection, $query);

    if (!$insert) {
        die('Query Failed' . mysqli_error($insert));
    }
    echo 'successful';

    header("Location: http://localhost/mealfirst/index.php");
}
