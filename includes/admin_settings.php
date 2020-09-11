<?php
$setting = NUll;
if (isset($_GET['setting_section'])) {
    $setting = $_GET['setting_section'];
}
if (isset($_GET['cat'])) {
    $setting = $_GET['cat'];
}
?>
<div class="settings d-flex flex-column justify-content-between ml-1 mt-1 w-100">
    <div class="setting_body">
        <?php
        if ($setting == 'add_item' || $setting == NULL) {
            include 'includes/add_item.php';
        } else if ($setting == 'add_category') {
            include 'includes/add_category.php';
        } else if ($setting == 'edit_category') {
            include 'includes/edit_category.php';
        } else if ($setting == 'categorize') {
            include 'includes/categorize.php';
        } else if ($setting == 'edit_item') {
            include 'includes/edit_menu.php';
        }
        ?>
    </div>
    <div class="settings_bottom_menu mx-2 pl-2 pt-3 pb-4">
        <h5 class="settings_bottom_menu ml-2">Items and Categories</h5>
        <div class="d-flex flex-row setting_items ml-2">
            <div class="single_setting"><a href="admin.php?dashboard=settings&setting_section=add_item" class="<?php if ($setting == 'add_item' || $setting == NULL) {
                                                                                                                    echo 'active_tab';
                                                                                                                } ?>">Add Menu Item</a></div>
            <div class="single_setting ml-2"><a href="admin.php?dashboard=settings&setting_section=add_category" class="<?php if ($setting == 'add_category') {
                                                                                                                            echo 'active_tab';
                                                                                                                        } ?>">Add Category</a></div>
            <div class="single_setting ml-2"><a href="admin.php?dashboard=settings&setting_section=categorize" class="<?php if ($setting == 'categorize') {
                                                                                                                            echo 'active_tab';
                                                                                                                        } ?>">Categorize Items</a></div>
        </div>
    </div>

</div>