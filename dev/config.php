<?php
  // Start Session
  session_start();

  // Configuration
  $driver = 'mysql';
  $server_name = "localhost";
  $db_user_name = "u631198982_root";
  $db_user_password = "ul[z@+1m66cGQR";
  $db_name = "u631198982_marlin_db";
  $charset = 'utf8';
  $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

  $dsn = "$driver:host=$server_name;dbname=$db_name;charset=$charset";


