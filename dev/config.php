<?php

  // Configuration
  $driver = 'mysql';
  $server_name = "localhost";
  $db_user_name = "root";
  $db_user_password = "";
  $db_name = "marlin_db";
  $charset = 'utf8';
  $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

  $dsn = "$driver:host=$server_name;dbname=$db_name;charset=$charset";


