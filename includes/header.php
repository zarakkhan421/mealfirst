<?php

include 'includes/db.php';
if (!isset($_SESSION)) {
  session_start();
}

?>
<!doctype html>
<html lang="en">

<head>
  <title>MealFirst &mdash; Admin </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
  <link rel="icon" href="mf.png" type="image/png" size="50x50">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/admin_style.css">
</head>

<body>
  <nav class="navbar navbar-expand py-2 my-nav">
    <a href="http://localhost/mealfirst/" class="navbar-brand">MealFirst</a>
    <ul class="navbar-nav ml-2 mr-auto">
      <li class="nav-item d-none d-md-block"><a href="#admin" class="nav-link disabled">Admin</a></li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item d-none d-md-block"><a href="http://localhost/mealfirst/" class="nav-link nav_link_nav">Home Site</a></li>
      <li class="nav-item"><a href="includes/logout.php" class="nav-link nav_link_nav">Logout</a></li>
    </ul>
  </nav>