<?php

  include '../config.php';

  if ( !empty($_POST[ 'name' ]) && !empty($_POST[ 'email' ]) && !empty($_POST[ 'password' ]) && !empty($_POST[ 'password_confirmation' ]) ) {
    $pdo = new PDO($dsn, $db_user_name, $db_user_password, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $user = $_POST[ 'name' ];
    $email = $_POST[ 'email' ];
    $password = $_POST[ 'password' ];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $user_ip = $_SERVER[ 'REMOTE_ADDR' ];

    $loginSql = $pdo->query("SELECT * FROM `users` WHERE `user_login` = '$user'");
    $emailSql = $pdo->query("SELECT * FROM `users` WHERE `user_email` = '$email'");

    $loginRes = array();
    $emailRes = array();

    foreach ( $loginSql as $row ) {
      $loginRes[] = $row;
    }

    foreach ( $emailSql as $row ) {
      $emailRes[] = $row;
    }

    if ( !empty($loginRes) ) {
      echo json_encode(['login' => true]);
    } else if ( !empty($emailRes) ) {
      echo json_encode(['email' => true]);
    } else {
      $sql = "INSERT INTO `users` (`user_id`, `user_login`, `user_email`, `user_password`, `user_hash`, `user_ip`, `admin`) VALUES (NULL, '$user', '$email', '$password', '$password_hash', '$user_ip', false)";
      $pdo->exec($sql);
      $pdo = null;
      echo json_encode(['login' => false, 'email' => false]);
    }
  }


