<?php

  include '../config.php';

  $pdo = new PDO($dsn, $db_user_name, $db_user_password, $options);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $user = $_POST[ 'name' ];
  $email = $_POST[ 'email' ];
  $password = $_POST[ 'password' ];
  $password_hash = password_hash($password, PASSWORD_DEFAULT );
  $user_ip = $_SERVER[ 'REMOTE_ADDR' ];
  $sql = "INSERT INTO `users` (`user_id`, `user_login`, `user_email`, `user_password`, `user_hash`, `user_ip`, `admin`) VALUES (NULL, '$user', '$email', '$password', '$password_hash', '$user_ip', false)";
  $pdo->exec($sql);
  $pdo = null;

  header('Location: http://marlin.gelbman.online/register.php');
  exit;
