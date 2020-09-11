<?php
if (file_exists('db.php')) {
    include 'db.php';
} else {
    include 'includes/db.php';
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_GET['reservation_action'])) {
    $action_reservation = $_GET['reservation_action'];
    switch ($action_reservation) {
        case 'approve':
            $query = "UPDATE customer SET status = 'approved' WHERE customer_id = $id";
            $update = mysqli_query($connection, $query);
            header('Location: http://localhost/mealfirst/admin.php');
            break;
        case 'unapprove':
            $query = "UPDATE customer SET status = 'pending approval' WHERE customer_id = $id";
            $update = mysqli_query($connection, $query);
            header('Location: http://localhost/mealfirst/admin.php');
            break;
        case 'deny':
            $query = "UPDATE customer SET status = 'denied' WHERE customer_id = $id";
            $update = mysqli_query($connection, $query);
            header('Location: http://localhost/mealfirst/admin.php');
            break;
        case 'serve':
            $query = "UPDATE customer SET status = 'served' WHERE customer_id = $id";
            $update = mysqli_query($connection, $query);
            header('Location: http://localhost/mealfirst/admin.php');
            break;
        case 'delete':
            $query = "DELETE FROM customer WHERE customer_id = $id";
            $delete = mysqli_query($connection, $query);
            header('Location: http://localhost/mealfirst/admin.php');
            break;
    }
} else if (isset($_GET['message_action'])) {
    $message_action = $_GET['message_action'];
    switch ($message_action) {
        case 'open':
            header("location: http://localhost/mealfirst/admin.php?dashboard=messages&message_action={$message_action}&id={$id}");
            break;

        case 'delete':
            $query = "DELETE FROM messages WHERE message_id = $id";
            $delete = mysqli_query($connection, $query);
            header('Location: http://localhost/mealfirst/admin.php?dashboard=messages');
            break;
    }
} else if (isset($_GET['menu_action'])) {
    $menu_action = $_GET['menu_action'];
    switch ($menu_action) {
        case 'edit':
            header("Location: http://localhost/mealfirst/admin.php?setting_section=edit_menu&id={$id}");
            break;
        case 'delete':
            $query = "SELECT menu_image FROM menu WHERE menu_id = $id";
            $select = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($select);
            $unique_name = $row['menu_image'];
            unlink('../uploads/original-' . $unique_name);
            unlink("../uploads/resized-" . $unique_name);
            $query = "DELETE FROM menu WHERE menu_id = $id";
            $delete = mysqli_query($connection, $query);
            header('Location: http://localhost/mealfirst/admin.php?dashboard=menu');
            break;
    }
}
?>

<?php
if (isset($_GET['cat_action'])) {
    $cat_action = $_GET['cat_action'];

    switch ($cat_action) {
        case 'edit':
            header("Location: http://localhost/mealfirst/admin.php?dashboard=settings&setting_section=edit_category&cat_id=$id");
            break;
        case 'delete':
            $query = "DELETE FROM category WHERE cat_id = $id";
            $delete = mysqli_query($connection, $query);
            header('Location: http://localhost/mealfirst/admin.php?dashboard=settings&setting_section=add_category');
            break;
    }
}

?>

<?php

if (isset($_GET['categorize_action'])) {
    $mc_id = $_GET['mc_id'];
    $query = "DELETE FROM menu_category_relationships WHERE mc_id = $mc_id";
    $uncategorize = mysqli_query($connection, $query);
    header("Location: http://localhost/mealfirst/admin.php?dashboard=settings&setting_section=categorize");
}







?>