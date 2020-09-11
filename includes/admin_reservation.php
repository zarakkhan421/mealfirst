<?php include 'includes/reservation.php'; ?>
<div class="body_actions d-flex flex-column justify-content-between w-100">

    <table class="table table-bordered mb-auto mt-1 reservations_table">
        <thead>
            <tr class="table_head">
                <th class="head_item"><input type="checkbox" name="all_check" onclick="check_all()"></th>
                <th class="head_item">Name</th>
                <th class="head_item">Email</th>
                <th class="head_item">Phone</th>
                <th class="head_item">No of Persons</th>
                <th class="head_item">Date</th>
                <th class="head_item">Time</th>
                <th class="head_item">Status</th>
                <th class="head_item">Action</th>
            </tr>
        </thead>
        <tbody>
            <form action="includes/bulk_actions.php" method="post">
                <?php
                $records_per_page = 10;
                $query = "SELECT customer_id FROM customer";
                $select = mysqli_query($connection, $query);
                $records_num = mysqli_num_rows($select);
                $num_of_pages = ceil($records_num / $records_per_page);

                if (!isset($_GET['page'])) {
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }

                $current_records = ($page - 1) * $records_per_page;
                $query = "SELECT * FROM customer LIMIT $current_records, $records_per_page";
                $select = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select)) :
                    $id = $row['customer_id'];
                    $name = $row['customer_name'];
                    $email = $row['customer_email'];
                    $phone = $row['customer_phone'];
                    $count = $row['customer_count'];
                    $date = $row['date'];
                    $time = $row['time'];
                    $status = $row['status'];
                ?>


                    <tr class="table_body">
                        <th class="body_item"><input type="checkbox" name="check_list[]" value="<?php echo $id; ?>"></th>
                        <th class="body_item"><?php echo $name; ?></th>
                        <th class="body_item"><?php echo $email; ?></th>
                        <th class="body_item"><?php echo $phone; ?></th>
                        <th class="body_item"><?php echo $count; ?></th>
                        <th class="body_item"><?php echo $date; ?></th>
                        <th class="body_item"><?php echo $time; ?></th>
                        <th class="body_item status"><?php echo $status; ?></th>
                        <th class="body_item actions">
                            <?php
                            if ($status == 'approved') {
                            ?> <a href="includes/actions.php?id=<?php echo $id; ?>&reservation_action=unapprove">Unapprove</a> |<?php
                                                                                                                            } else { ?>
                                <a href="includes/actions.php?id=<?php echo $id; ?>&reservation_action=approve">Approve</a> |
                            <?php }
                            ?>

                            <a href="includes/actions.php?id=<?php echo $id; ?>&reservation_action=deny">Deny</a> |
                            <a href="includes/actions.php?id=<?php echo $id; ?>&reservation_action=serve">Serve</a> |
                            <a href="includes/actions.php?id=<?php echo $id; ?>&reservation_action=delete">Delete</a>
                        </th>
                    </tr>
                <?php
                endwhile;
                ?>
        </tbody>
    </table>
    <ul class="pagination m-0 justify-content-center">
        <?php
        for ($page = 1; $page <= $num_of_pages; $page++) {
        ?>

            <li class="page-item"><a href="http://localhost/mealfirst/admin.php?dashboard=reservations&page=<?php echo $page; ?>" class="page-link"><?php echo $page; ?></a></li>

        <?php
        }
        ?>
    </ul>

    <div class="bottom_menu mx-2 pl-2 pt-3 pb-2">
        <h5 class="menu_heading ml-2">Bulk Actions</h5>
        <div class="bulk_inputs ml-2">
            <select name="bulk_action" id="" class="select">
                <option value="">Bulk Actions</option>
                <option value="approve">Approve</option>
                <option value="unapprove">Unapprove</option>
                <option value="deny">Deny</option>
                <option value="serve">Serve</option>
                <option value="delete">Delete</option>
            </select>
            <input type="submit" class="setting_button bulk_apply" value="Apply" name="submit_reservation">
        </div>
    </div>
    </form>
</div>