<?php
  
  include '../config.php';
  
  if ( !empty( $_POST[ 'name' ] ) && !empty( $_POST[ 'email' ] ) && !empty( $_POST[ 'password' ] ) && !empty( $_POST[ 'password_confirmation' ] ) ) {
    $pdo = new PDO( $dsn, $db_user_name, $db_user_password, $options );
    $pdo -> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    
    $user = $_POST[ 'name' ];
    $email = $_POST[ 'email' ];
    $password = $_POST[ 'password' ];
    $password_hash = password_hash( $password, PASSWORD_DEFAULT );
    $user_ip = $_SERVER[ 'REMOTE_ADDR' ];
    
    $sql = $pdo -> query( "SELECT * FROM `users` WHERE `user_login` = '$user' OR `user_email` = '$email'" );
    
    $result = array();
    
    foreach ( $sql as $row ) {
      $result[] = $row;
    }
    
    if ( !empty( $result ) ) {
      $myJson = array();
      foreach ( $result as $row ) {
        if ( $row[ 'user_login' ] == $user ) {
          $myJson['login'] = true;
        }
        if ( $row[ 'user_email' ] == $email ) {
          $myJson['email'] = true;
        }
      }
      echo json_encode($myJson);
    } else {
      $sql = "INSERT INTO `users` (
                     `user_id`, 
                     `user_login`,
                     `user_email`, 
                     `user_password`, 
                     `user_hash`,
                     `user_ip`,
                     `admin`
                     ) VALUES (
                               NULL,
                               '$user',
                               '$email',
                               '$password', 
                               '$password_hash',
                               '$user_ip', 
                               false)";
      $pdo -> exec( $sql );
      $pdo = null;
      echo json_encode( [ 'login' => false, 'email' => false ] );
    }
  }


