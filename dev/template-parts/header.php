<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php echo isset($page_title) ? $page_title : "Title" ?></title>

  <link rel="icon" href="/img/favicon.png" type="image/x-icon">

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="css/app.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

</head>
<body>
<div id="app">
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="/">
        Project
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->

          <?php if(empty($_SESSION['login'])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="#"><?php echo  $_SESSION['login'] ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bat/exit.php">Exit</a>
            </li>
          <?php } ?>

        </ul>
      </div>
    </div>
  </nav>
