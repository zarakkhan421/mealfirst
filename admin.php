<?php
session_start();
if (isset($_SESSION['user_name'])) {

  $dashboard = NULL;
  if (isset($_GET['dashboard'])) {
    $dashboard = $_GET['dashboard'];
  }
  include 'includes/header.php';
?>
  <div class="d-flex my-body">

    <ul class="nav d-flex flex-column side-nav pt-1">

      <li class="nav-item mb-1"><a href="admin.php?dashboard=reservations" class="nav-link <?php if ($dashboard == 'reservations' || $dashboard == NULL) {
                                                                                              echo 'active_tab';
                                                                                            } ?>">Reservations</a></li>
      <li class="nav-item mb-1"><a href="admin.php?dashboard=messages" class="nav-link <?php if ($dashboard == 'messages') {
                                                                                          echo 'active_tab';
                                                                                        } ?>">Messages</a></li>
      <li class="nav-item mb-1"><a href="admin.php?dashboard=menu" class="nav-link <?php if ($dashboard == 'menu') {
                                                                                      echo 'active_tab';
                                                                                    } ?>">Menu</a></li>
      <li class="nav-item"><a href="admin.php?dashboard=settings" class="nav-link <?php if ($dashboard == 'settings') {
                                                                                    echo 'active_tab';
                                                                                  } ?>">Settings</a></li>
    </ul>
    <?php
    if ($dashboard == 'reservations' || $dashboard == NULL) {
      include 'includes/admin_reservation.php';
    } else if ($dashboard == 'messages') {
      include 'includes/admin_messages.php';
    } else if ($dashboard == 'menu') {
      include 'includes/admin_menu.php';
    } else {
      include 'includes/admin_settings.php';
    }
    ?>
  </div>
<?php
} else {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/admin_style.css">
  </head>

  <body>

  <?php
  include "includes/login.php";
}
  ?>

  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  </body>

  </html>