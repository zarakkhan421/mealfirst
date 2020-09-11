<?php
include 'db.php';


if (isset($_POST['menu_submit'])) {
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_detail = $_POST['item_details'];
    $file = $_FILES['item_image'];
    if (!empty($item_name) && !empty($item_price) && !empty($item_detail) && !empty($file)) {
        print_r($file);
        echo '</br> ' . $file['tmp_name'];
        $file_name = $file['name'];
        $file_type = $file['type'];
        $file_tmpname = $file['tmp_name'];
        $file_error = $file['error'];
        $file_size = $file['size'];
        $file_explode = explode('.', $file_name);
        $file_name = $file_explode[0];
        $file_extension = strtolower($file_explode[1]);
        $allowed = array('jpg', 'jpeg', 'png');
        if (in_array($file_extension, $allowed)) {
            if ($file_error === 0) {
                if ($file_size < 10485760) {
                    $unique_name = uniqid('', true) . '.' . $file_extension;
                    $original_name = 'original-' . $unique_name;
                    move_uploaded_file($file_tmpname, '../uploads/' . $original_name);
                    resize('../uploads/' . $original_name, 30, 30, $unique_name, $file_extension);
                } else {
                    echo 'File size is too high.';
                }
            } else {
                echo 'Error during upload.';
            }
        } else {
            echo 'Not a valid image file';
        }

        $query = "INSERT INTO menu(menu_name, menu_image, menu_price, menu_detail) VALUES('$item_name', '$unique_name', '$item_price', '$item_detail')";
        $insert = mysqli_query($connection, $query);
        header('Location: http://localhost/mealfirst/admin.php?dashboard=settings&add=item');
    } else {
        header('Location: http://localhost/mealfirst/admin.php?dashboard=settings&add=item&fields=empty');
    }
}



function resize($file_name, $max_width, $max_height, $unique_name, $file_extension)
{
    list($orig_width, $orig_height) = getimagesize($file_name);
    if ($orig_height > $max_height) {
        $height = ($max_width / $max_width) * $orig_height;
        $width = $max_width;
    }

    if ($orig_width > $max_width) {
        $width = ($max_height / $orig_height) * $orig_width;
        $height = $max_height;
    }
    $resized_image_dist = imagecreatetruecolor($width, $height);
    $resized_name = 'resized-' . $unique_name;
    if ($file_extension == 'jpeg' || $file_extension == 'jpg') {
        $resized_image_src = imagecreatefromjpeg($file_name);
        imagecopyresized($resized_image_dist, $resized_image_src, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);
        imagejpeg($resized_image_dist, '../uploads/' . $resized_name, 100);
    } else if ($file_extension == 'png') {
        $resized_image_src = imagecreatefrompng($file_name);
        imagecopyresized($resized_image_dist, $resized_image_src, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);
        imagepng($resized_image_dist, '../uploads/' . $resized_name, 0);
    }
}

?>



<form action="includes/add_item.php" method="post" enctype="multipart/form-data">
    <h2 class="text-center mr-5 settings_heading">Add Item</h2>
    <div class="form-group row justify-content-around mt-4 mx-0">
        <label for="item_name" class="col-sm-2">Item Name</label>
        <div class="col-sm-4">
            <input type="text" name="item_name" class="form-control" placeholder="Item Name">
        </div>
    </div>
    <div class="form-group row justify-content-around mt-2 mx-0">
        <label for="file" class="col-sm-2">Choose Image</label>
        <div class="col-sm-4">
            <label for="file">
                <input type="file" name="item_image" class="form-control-file">
        </div>
    </div>
    <div class="form-group row justify-content-around mt-2 mx-0">
        <label for="price" class="col-sm-2">Price</label>
        <div class="col-sm-4">
            <input type="text" name="item_price" class="form-control" placeholder="Price">
        </div>
    </div>
    <div class="form-group row justify-content-around mt-2 mx-0">
        <label for="details" class="col-sm-2">Detail</label>
        <div class="col-sm-4">
            <textarea type="text" name="item_details" class="form-control" placeholder="Write short detail about the item." row="3"></textarea>
        </div>
    </div>
    <?php
    if (isset($_GET['fields'])) {
    ?>
        <span class="warning row justify-content-center mx-0">Fill all fields.</span>
    <?php
    }
    ?>
    <div class="row justify-content-center mt-2 mx-0">
        <button class="setting_button add_item_button" type="reset">Clear</button>
        <button type="submit" name="menu_submit" class="setting_button add_item_button">Add Item</button>
    </div>
</form>