<?php

include "includes/db.php";
$query = "SELECT * FROM category";
$cat_id = mysqli_fetch_assoc(mysqli_query($connection, $query))['cat_id'];

if (isset($_GET['cat_id'])) {
    $cat_id = $_GET['cat_id'];
}

if (isset($_POST['categorize'])) {
    $cat_id = $_POST["cat_id"];
    $menu_id = $_POST['menu_id'];
    if (!empty($cat_id) || !empty($menu_id)) {
        $query = "SELECT menu_id, cat_id FROM menu_category_relationships WHERE menu_id = {$menu_id} AND cat_id = {$cat_id}";
        $select = mysqli_query($connection, $query);

        if (mysqli_num_rows($select) == 0) {
            $query = "INSERT INTO menu_category_relationships(cat_id, menu_id) VALUES('$cat_id','$menu_id')";
            $insert = mysqli_query($connection, $query);
            header("Location: http://localhost/mealfirst/admin.php?dashboard=settings&cat=categorize&cat_id={$cat_id}");
        } else {
            header("Location: http://localhost/mealfirst/admin.php?dashboard=settings&cat=categorize&fields=already_exist");
        }
    } else {
        header("Location: http://localhost/mealfirst/admin.php?dashboard=settings&cat=categorize&fields=empty");
    }
}
?>


<?php
$query = "SELECT menu_id, menu_name FROM menu";
$select_items = mysqli_query($connection, $query);

$query = "SELECT * FROM category";
$select_cats = mysqli_query($connection, $query);

?>



<form action="" method="post">
    <h2 class="text-center settings_heading">Select Items and Category to Categorize</h2>
    <div class="row justify-content-center mx-0">
        <div class="form-group text-center col-4 mb-0 mt-4">
            <label class="categorize_label" for="cat_name">Select Category</label>
            <select class="categorize_select" name="cat_id" id="" class="form-control-sm">
                <option value="">Select Category</option>
                <?php while ($row = mysqli_fetch_assoc($select_cats)) : ?>
                    <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group text-center col-4 mb-0 mt-4">
            <label class="categorize_label" for="item_name">Item Name</label>
            <select class="categorize_select" name="menu_id" id="" class="form-control-sm">
                <option value="">Item Name</option>
                <?php while ($row = mysqli_fetch_assoc($select_items)) : ?>
                    <option value="<?php echo $row['menu_id']; ?>"><?php echo $row['menu_name']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
    </div>
    <?php
    if (isset($_GET['fields'])) {
        if ($_GET['fields'] == 'already_exist') {
    ?>
            <span class="warning row justify-content-center mx-0">Already categorized as such.</span>
        <?php
        } else {
        ?>
            <span class="warning row justify-content-center mx-0">Fill all fields.</span>
    <?php
        }
    }
    ?>
    <div class="row justify-content-center mx-0">
        <button class="col-2 setting_button categorize_button" type="reset">Reset</button>
        <button class="col-2 setting_button categorize_button" type="submit" name="categorize">Submit</button>
    </div>
</form>



<div class="d-flex categorize_body">
    <?php
    $query = "SELECT * FROM category";
    $select_cats = mysqli_query($connection, $query);

    $query = "SELECT category.cat_id, menu.menu_id, category.cat_name, menu.menu_name
FROM
category
INNER JOIN
menu_category_relationships ON category.cat_id=menu_category_relationships.cat_id
INNER JOIN 
menu ON menu_category_relationships.menu_id=menu.menu_id WHERE category.cat_id = $cat_id";
    $select_num_records = mysqli_query($connection, $query);
    $num_records = mysqli_num_rows($select_num_records);
    $records_per_page = 6;
    $num_of_pages = ceil($num_records / $records_per_page);
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $current_record = ($page - 1) * $records_per_page;


    $query = "SELECT category.cat_id, menu.menu_id, category.cat_name, menu.menu_name
FROM
category
INNER JOIN
menu_category_relationships ON category.cat_id=menu_category_relationships.cat_id
INNER JOIN 
menu ON menu_category_relationships.menu_id=menu.menu_id WHERE category.cat_id = $cat_id LIMIT $current_record, $records_per_page";
    $select_cat_menu = mysqli_query($connection, $query);

    ?>

    <ul class="list-group categorize_category_list">
        <?php
        while ($row = mysqli_fetch_assoc($select_cats)) {
        ?>
            <li class="<?php if ($row['cat_id'] == $cat_id) {
                            echo "active_tab";
                        }  ?> list-group-item categorize_category_tab">
                <a class="<?php if ($row['cat_id'] == $cat_id) {
                                echo "active_tab";
                            } ?> " href="http://localhost/mealfirst/admin.php?dashboard=settings&setting_section=categorize&cat_id=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></a>
            </li>
        <?php
        }
        ?>
    </ul>

    <?php
    $query = "SELECT mc_id FROM menu_category_relationships";
    $select_mc_id = mysqli_query($connection, $query);
    ?>

    <table class="table table-striped categorize_table">
        <thead>
            <tr>
                <th class="categorize_table_head">Menu Name</th>
                <th class="categorize_table_head">Action</th>
                <th class="categorize_table_head">Menu Name</th>
                <th class="categorize_table_head">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $records = mysqli_num_rows($select_cat_menu);
            for ($i = 1; $i < ($records / 2) + 1; $i++) {
            ?>

                <tr>
                    <?php
                    for ($j = 1; $j <= 2; $j++) {
                        $row = mysqli_fetch_assoc($select_cat_menu);
                        $mc_id_row = mysqli_fetch_assoc($select_mc_id);
                        if ($row['menu_name']) {
                    ?>
                            <th class="w-25 categorize_table_body"><?php echo $row['menu_name']; ?></th>
                            <th class="w-25 categorize_table_body actions">
                                <a href="includes/actions.php?categorize_action=un_cat&mc_id=<?php echo $mc_id_row['mc_id'];  ?>">Uncategorize</a>
                            </th>
                    <?php
                        }
                    }
                    ?>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<ul class="pagination justify-content-center">
    <?php
    for ($page = 1; $page <= $num_of_pages; $page++) {
    ?>

        <li class="page-item"><a class="page-link" href="http://localhost/mealfirst/admin.php?dashboard=settings&cat=categorize&cat_id=<?php echo $cat_id; ?>&page=<?php echo $page; ?>"><?php echo $page; ?></a></li>

    <?php
    }
    ?>
</ul>