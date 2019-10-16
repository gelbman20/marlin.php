<?php

  include '../config.php';

  if ( !empty($_POST[ 'email' ]) && !empty($_POST['password']) ) {
    $user_email = $_POST['email'];
    $user_password = $_POST[ 'password' ];

    try {
      $pdo = new PDO($dsn, $db_user_name, $db_user_password, $options);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT * FROM `users` WHERE user_email = '$user_email' AND `user_password` = '$user_password'";
      $data = $pdo->query($sql);
      $res = array();

      foreach ( $data as $row ) {
        $res[] = $row;
      }

      echo '<pre>';
      echo '<code>';
      var_dump($res);
      echo '</code>';
      echo '</pre>';

    } catch (Exception $e) {
      echo $e;
    }




//    header('Location: ../index.php');
//    exit();
  }

//  header('Location: ../login.php');
//  exit();