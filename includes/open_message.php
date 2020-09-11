<?php
$id =$_GET['id'];
$query = "SELECT * FROM messages WHERE message_id='$id'";
$open = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($open);

?>
<div class="mt-2 mx-4 message_display">
    <div class="link_to_messages"><a href="http://localhost/mealfirst/admin.php?dashboard=messages">&larr; Go to messages</a></div>
    <ul class="list-inline message_from">
        <li class="list-inline-item message_from_item">Name:  <?php echo $row['message_name']; ?></li>
        <li class="list-inline-item message_from_item ml-4">Email:  <?php echo $row['message_email']; ?></li>
        <li class="list-inline-item message_from_item ml-4">Phone:  <?php echo $row['message_phone']; ?></li>
    </ul>
    <div class="message_text">
        <?php echo $row['message_text']; ?>
    </div>
</div>