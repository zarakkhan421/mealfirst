<?php
include 'includes/db.php';
?>

<?php
$cat_id = $_GET['cat_id'];
?>

<?php

if (isset($_POST['cat_name_submit'])) {
    $cat_name = $_POST['cat_name'];
    $query = "UPDATE category SET cat_name = '$cat_name' WHERE cat_id = '$cat_id'";
    $update = mysqli_query($connection, $query);
    header('Location: http://localhost/mealfirst/admin.php?dashboard=settings&setting_section=add_category');
}

?>

<?php
$query = "SELECT * FROM category WHERE cat_id = $cat_id";
$select = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($select);
$cat_name = $row['cat_name'];

?>


<form action="" method="post">
    <h2 class="text-center mr-5 settings_heading">Edit Category</h2>
    <div class="form-group row justify-content-around mt-4 mx-0">
        <label for="item_name" class="col-sm-2">Category Name</label>
        <div class="col-sm-4">
            <input type="text" name="cat_name" value="<?php echo $cat_name; ?>" class="form-control" placeholder="Category Name">
        </div>
    </div>
    <div class="row justify-content-center mt-2 mx-0">
        <button class="setting_button add_category_button">Reset</button>
        <button type="submit" name="cat_name_submit" class="setting_button add_category_button">Save Changes</button>
    </div>
</form>
<?php
$query = "SELECT * FROM category";
$select = mysqli_query($connection, $query);
?>

<table class="table table-striped add_category_table">
    <thead>
        <tr>
            <th class="add_category_table_head">No</th>
            <th class="add_category_table_head">Category Name</th>
            <th class="add_category_table_head">Actions</th>
            <th class="add_category_table_head">No</th>
            <th class="add_category_table_head">Category Name</th>
            <th class="add_category_table_head">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $num = 1;
        for ($i = 1; $i <= (mysqli_num_rows($select) / 2) + 1; $i++) :
        ?>
            <tr>
                <?php
                for ($j = 0; $j < 2; $j++) :
                    $row = mysqli_fetch_assoc($select);
                    if ($row['cat_name']) {
                ?>
                        <th class="add_category_table_body"><?php echo $num; ?></th>
                        <th class="add_category_table_body"><?php echo $row['cat_name']; ?></th>
                        <th class="add_category_table_body actions">
                            <a href="http://localhost/mealfirst/actions.php?cat_action=edit&id=<?php echo $row['cat_id']; ?>">Edit</a> |
                            <a href="http://localhost/mealfirst/actions.php?cat_action=delete&id=<?php echo $row['cat_id']; ?>">Delete</a></th>
                <?php
                        $num++;
                    }
                endfor;
                ?>
            </tr>
        <?php
        endfor;
        ?>
    </tbody>
</table>