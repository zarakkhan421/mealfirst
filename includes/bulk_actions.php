<?php
include 'db.php';

if (isset($_POST["submit_reservation"])) {

    $check_list = $_POST['check_list'];
    $bulk_action = $_POST['bulk_action'];

    switch ($bulk_action) {

        case 'approve':
            for ($i = 0; $i < count($check_list); $i++) {
                $query = "UPDATE customer SET status = 'approved' WHERE customer_id = $check_list[$i]";
                $update = mysqli_query($connection, $query);
            }
            header('Location: http://localhost/mealfirst/admin.php');
            break;

        case 'unapprove':
            for ($i = 0; $i < count($check_list); $i++) {
                $query = "UPDATE customer SET status = 'pending approval' WHERE customer_id = $check_list[$i]";
                $update = mysqli_query($connection, $query);
            }
            header('Location: http://localhost/mealfirst/admin.php');
            break;

        case 'deny':
            for ($i = 0; $i < count($check_list); $i++) {
                $query = "UPDATE customer SET status = 'denied' WHERE customer_id = $check_list[$i]";
                $update = mysqli_query($connection, $query);
            }
            header('Location: http://localhost/mealfirst/admin.php');
            break;

        case 'serve':
            for ($i = 0; $i < count($check_list); $i++) {
                $query = "UPDATE customer SET status = 'served' WHERE customer_id = $check_list[$i]";
                $update = mysqli_query($connection, $query);
            }
            header('Location: http://localhost/mealfirst/admin.php');
            break;

        case 'delete':
            for ($i = 0; $i < count($check_list); $i++) {
                $query = "DELETE FROM customer WHERE customer_id = $check_list[$i]";
                $delete = mysqli_query($connection, $query);
            }
            header('Location: http://localhost/mealfirst/admin.php');
            break;
    }
}

if (isset($_POST['submit_menu'])) {
    $check_list = $_POST['check_list'];
    $bulk_action = $_POST['bulk_action'];
    echo $bulk_action;
    print_r($check_list);
    if ($bulk_action == 'delete') {
        for ($i = 0; $i < count($check_list); $i++) {
            $query = "SELECT menu_image FROM menu WHERE menu_id=$check_list[$i]";
            $select = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($select);
            $unique_name = $row['menu_image'];
            unlink('../uploads/original-' . $unique_name);
            unlink("../uploads/resized-" . $unique_name);
            $query = "DELETE FROM menu WHERE menu_id = $check_list[$i]";
            $delete = mysqli_query($connection, $query);
        }
        header("Location: http://localhost/mealfirst/admin.php?dashboard=menu");
    }
}

if (isset($_POST['submit_messages'])) {
    $check_list = $_POST['check_list'];
    $bulk_action = $_POST['bulk_action'];
    echo $bulk_action;
    print_r($check_list);
    if ($bulk_action == 'delete') {
        for ($i = 0; $i < count($check_list); $i++) {
            $query = "DELETE FROM messages WHERE message_id = $check_list[$i]";
            $delete = mysqli_query($connection, $query);
        }
        header("Location: http://localhost/mealfirst/admin.php?dashboard=messages");
    }
}
