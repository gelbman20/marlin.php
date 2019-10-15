<?php

  include '../config.php';

  if ( !empty($_POST[ 'name' ]) && !empty($_POST[ 'email' ]) && !empty($_POST[ 'password' ]) ) {
    $pdo = new PDO($dsn, $db_user_name, $db_user_password, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $user = $_POST[ 'name' ];
    $email = $_POST[ 'email' ];
    $password = $_POST[ 'password' ];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $user_ip = $_SERVER[ 'REMOTE_ADDR' ];
    $sql = "INSERT INTO `users` (`user_id`, `user_login`, `user_email`, `user_password`, `user_hash`, `user_ip`, `admin`) VALUES (NULL, '$user', '$email', '$password', '$password_hash', '$user_ip', false)";
    $pdo->exec($sql);
    $pdo = null;


  }


  // Ajax request
  $pdo  = new PDO($dsn, $db_user_name, $db_user_password, $options);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $data = $pdo->query( "SELECT * FROM users");

  $res = array();

  foreach ($data as $row) {
    $res[] = $row;
  }

  // Output json file
  echo json_encode($res);
