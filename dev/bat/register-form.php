<?php
  
  include '../config.php';
  
  class User {
    // User info
    public $login;
    public $email;
    public $password;
    public $password_hash;
    public $user_ip;
    public $pdo;
    public $sql;
    public $result = array();
    public $myJson = array();
    
    public function __construct( $login, $email, $password, $user_ip ) {
      $this->login = $login;
      $this->email = $email;
      $this->password = $password;
      $this->password_hash = password_hash( $password, PASSWORD_DEFAULT );
      $this->user_ip = $user_ip;
    }
    
    public function create_pdo( $dsn, $db_user_name, $db_user_password, $options ) {
      $this->pdo = new PDO( $dsn, $db_user_name, $db_user_password, $options );
      $this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      $this->set_sql_query();
      $this->add_new_user_to_db();
    }
    
    public function set_sql_query() {
      $this->sql = $this->pdo->query( "SELECT * FROM `users` WHERE `user_login` = '$this->login' OR `user_email` = '$this->email'" );
      foreach ( $this->sql as $row ) {
        $this->result[] = $row;
      }
    }
    
    public function add_new_user_to_db() {
      // Check login and email in DB
      if ( !empty( $this->result ) ) {
        foreach ( $this->result as $row ) {
          if ( $row[ 'user_login' ] == $this->login ) $this->myJson[ 'login' ] = true;
          if ( $row[ 'user_email' ] == $this->email ) $this->myJson[ 'email' ] = true;
        }
        echo json_encode( $this->myJson );
        $this->pdo = null;
        return false;
      }
      
      // Add new User to DB
      $this->sql = "INSERT INTO `users` (`user_id`, `user_login`, `user_email`, `user_avatar`, `user_password`, `user_hash`, `user_ip`, `admin` ) VALUES ( NULL, '$this->login', '$this->email', 'img/register-user.jpg', '$this->password', '$this->password_hash', '$this->user_ip', false)";
      $this->pdo->exec( $this->sql );
      $this->pdo = null;
      echo json_encode( [ 'login' => false, 'email' => false ] );
      return true;
    }
  }
  
  // User info from post and server
  $login = $_POST[ 'name' ];
  $email = $_POST[ 'email' ];
  $password = $_POST[ 'password' ];
  $password_confirmation = $_POST[ 'password_confirmation' ];
  $user_ip = $_SERVER[ 'REMOTE_ADDR' ];
  
  if ( !empty( $login ) && !empty( $email ) && !empty( $password ) && !empty( $password_confirmation ) ) {
    $user = new User( $login, $email, $password, $user_ip );
    $user->create_pdo( $dsn, $db_user_name, $db_user_password, $options );
  }