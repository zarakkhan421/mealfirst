<?php
if (isset($_POST['user_name']) && isset($_POST['user_password'])) {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    if ($user_name == 'zarak' && $user_password == 'asd') {
        echo $user_name . ' ' . $user_password;
        session_start();
        $_SESSION['user_name'] = 'zarak';
        header("Location: http://localhost/mealfirst/admin.php");
    }
}


?>
<div class="login">
    <h3 class="login_heading">Login</h3>
    <form action="includes/login.php" method="post">
        <div class="form_group">
            <label for="user_name">Username</label>
            <input type="text" name="user_name">
        </div>
        <div class="form_group">
            <label for="user_password">Password</label>
            <input type="password" name="user_password">
        </div>
        <div class="form_group_buttons">
            <button type="reset">Clear</button>
            <button type="submit">Login</button>
        </div>
    </form>
</div>