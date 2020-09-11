<?php
if (isset($_GET['message_action'])) {
    include 'includes/open_message.php';
} else {
?>
    <div class="body_actions d-flex flex-column justify-content-between w-100">

        <table class="table table-bordered mb-auto mt-1 messages_table">
            <thead>
                <tr class="table_head">
                    <th class="head_item"><input type="checkbox" name="all_check" onclick="check_all()"></th>
                    <th class="head_item">Name</th>
                    <th class="head_item">Email</th>
                    <th class="head_item">Phone</th>
                    <th class="head_item">Action</th>
                </tr>
            </thead>
            <tbody>
                <form action="includes/bulk_actions.php" method="post">
                    <?php
                    $records_per_page = 10;
                    $query = "SELECT message_id FROM messages";
                    $select = mysqli_query($connection, $query);
                    $records_num = mysqli_num_rows($select);
                    $num_of_pages = ceil($records_num / $records_per_page);
                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }
                    $current_records = ($page - 1) * $records_per_page;
                    $query = "SELECT * FROM messages LIMIT $current_records, $records_per_page";
                    $select = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select)) :
                        $id = $row['message_id'];
                        $name = $row['message_name'];
                        $email = $row['message_email'];
                        $phone = $row['message_phone'];
                    ?>
                        <tr class="table_body">
                            <th class="body_item"><input type="checkbox" name="check_list[]" value="<?php echo $id; ?>"></th>
                            <th class="body_item"><?php echo $name; ?></th>
                            <th class="body_item"><?php echo $email; ?></th>
                            <th class="body_item"><?php echo $phone; ?></th>
                            <th class="body_item actions">
                                <a href="includes/actions.php?id=<?php echo $id; ?>&message_action=open">Open</a> |
                                <a href="includes/actions.php?id=<?php echo $id; ?>&message_action=delete">Delete</a>
                            </th>
                        </tr>
                    <?php endwhile; ?>
            </tbody>
        </table>
        <ul class="pagination m-0 justify-content-center">
            <?php
            for ($page = 1; $page <= $num_of_pages; $page++) {
            ?>
                <li class="page-item"><a href="http://localhost/mealfirst/admin.php?dashboard=messages&page=<?php echo $page; ?>" class="page-link"><?php echo $page; ?></a></li>
            <?php
            }
            ?>
        </ul>
        <div class="bottom_menu mx-2 pl-2 pt-3 pb-2">
            <h5 class="menu_heading ml-2">Bulk Actions</h5>
            <div class="bulk_inputs ml-2">
                <select name="bulk_action" id="" class="select">
                    <option value="">Bulk Actions</option>
                    <option value="delete">Delete</option>
                </select>
                <input type="submit" class="setting_button bulk_apply" value="Apply" name="submit_messages">
            </div>
        </div>
        </form>
    </div>
<?php } ?>