<?php
if (isset($_POST['edit_menu_submit'])) {
    include "db.php";
} else {
    include "includes/db.php";
}
?>

<?php
$id = $_GET['id'];
$query = "SELECT * FROM menu WHERE menu_id = $id";
$select = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($select);
$unique_name = $row['menu_image'];
?>

<?php

if (isset($_POST['edit_menu_submit'])) {
    $item_name = $_POST['item_name'];
    if (!empty($_FILES['item_image']['name'])) {
        unlink('uploads/original-' . $unique_name);
        unlink("uploads/resized-" . $unique_name);
        $file = $_FILES['item_image'];
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
                    move_uploaded_file($file_tmpname, 'uploads/' . $original_name);
                    resize('uploads/' . $original_name, 30, 30, $unique_name, $file_extension);
                } else {
                    echo 'File size is too high.';
                }
            } else {
                echo 'Error during upload.';
            }
        } else {
            echo 'Not a valid image file';
        }
    }

    $item_price = $_POST['item_price'];
    $item_detail = $_POST['item_details'];
    $query = "UPDATE menu SET menu_name = '$item_name', menu_image = '$unique_name', menu_price = '$item_price', menu_detail = '$item_detail' WHERE menu_id = '$id'";
    $update = mysqli_query($connection, $query);
    header('Location: http://localhost/mealfirst/admin.php?dashboard=menu');
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
        imagejpeg($resized_image_dist, 'uploads/' . $resized_name, 100);
    } else if ($file_extension == 'png') {
        $resized_image_src = imagecreatefrompng($file_name);
        imagecopyresized($resized_image_dist, $resized_image_src, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);
        imagepng($resized_image_dist, 'uploads/' . $resized_name, 0);
    }
}
?>




<form action="includes/edit_menu.php?id=<?php echo $id; ?>" method="post" class="mt-4" enctype="multipart/form-data">
    <h2 class="text-center mr-5 settings_heading">Edit Item</h2>
    <div class="form-group row justify-content-around mt-4">
        <label for="item_name" class="col-sm-2">Item Name</label>
        <div class="col-sm-4">
            <input type="text" name="item_name" value="<?php echo $row['menu_name']; ?>" class="form-control" placeholder="Item Name">
        </div>
    </div>
    <div class="form-group row justify-content-around mt-2">
        <label for="file" class="col-sm-2">Choose Image</label>
        <div class="col-sm-4">
            <input type="file" name="item_image" class="form-control-file">
            <label style="font-size: .75rem;">Don't choose image, if you want to leave it unchanged.</label>
        </div>
    </div>
    <div class="form-group row justify-content-around mt-2">
        <label for="price" class="col-sm-2">Price</label>
        <div class="col-sm-4">
            <input type="text" name="item_price" value="<?php echo $row['menu_price']; ?>" class="form-control" placeholder="Price">
        </div>
    </div>
    <div class="form-group row justify-content-around mt-2">
        <label for="details" class="col-sm-2">Detail</label>
        <div class="col-sm-4">
            <textarea type="text" name="item_details" class="form-control" placeholder="Write short detail about the item." row="3"><?php echo $row['menu_detail']; ?></textarea>
        </div>
    </div>
    <div class="row justify-content-center mt-2">
        <button class="setting_button add_item_button">Reset</button>
        <button type="submit" name="edit_menu_submit" class="setting_button add_item_button">Save Changes</button>
    </div>
</form>