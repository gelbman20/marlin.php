<?php

  include '../config.php';

  if ( !empty($_POST[ 'email' ]) && !empty($_POST[ 'password' ]) ) {
    $user_email = $_POST[ 'email' ];
    $user_password = $_POST[ 'password' ];

    try {
      $pdo = new PDO($dsn, $db_user_name, $db_user_password, $options);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
      $data = $pdo->query($sql);
      $res = array();


      foreach ( $data as $row ) {
        $res[] = $row;
      }

      /*
       * If DB doesn't have the Email
       * Redirect on Login page back
       */
      if ( empty($res) ) {
        header('Location: ../login.php');
        exit();
      }

      /*
       * Check password to equally
       */
      if ( password_verify($user_password, $res[ 0 ][ 'user_hash' ]) ) {

        if ( isset($_POST[ 'remember' ]) ) {
          setcookie('login', $res[ 0 ][ 'user_login' ], time() + 3600 * 24 * 24, '/');
          setcookie('email', $res[ 0 ][ 'user_login' ], time() + 3600 * 24 * 24, '/');
          setcookie('password', $res[ 0 ][ 'user_hash' ], time() + 3600 * 24 * 24, '/');
          setcookie('user_id', $res[ 0 ][ 'user_id' ], time() + 3600 * 24 * 24, '/');
        } else {
          $_SESSION[ 'login' ] = $res[ 0 ][ 'user_login' ];
          $_SESSION[ 'user_id' ] = $res[ 0 ][ 'user_id' ];
          $_SESSION[ 'email' ] = $res[ 0 ][ 'user_email' ];
        }

        header('Location: ../index.php');
        exit();
      }


    } catch ( Exception $e ) {
      echo $e;
    }
  }


      header('Location: ../login.php');
      exit();