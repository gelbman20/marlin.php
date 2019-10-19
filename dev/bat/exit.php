<?php
  include_once "../config.php";

  setcookie('login', '', time()-3600, '/');
  setcookie('email', '', time()-3600, '/');
  setcookie('password', '', time()-3600, '/');
  setcookie('user_id', '', time()-3600, '/');

  unset($_SESSION[ 'login' ]);
  unset($_SESSION[ 'email' ]);
  unset($_SESSION[ 'user_id' ]);
  
  

  header("Location: ../index.php");