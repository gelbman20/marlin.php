<?php
  include '../config.php';

  // Insert data to DB
  if (!empty($_POST[ 'name' ]) && !empty($_POST[ 'text' ])) {
    $pdo = new PDO($dsn, $db_user_name, $db_user_password, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $comment_name = $_POST[ 'name' ];
    $comment_text = $_POST[ 'text' ];
    $sql = "INSERT INTO comments (id, name, avatar, date_time, text) VALUES (NULL, '$comment_name', 'img/no-user.jpg', CURRENT_TIMESTAMP, '$comment_text')";
    $pdo->exec($sql);
    $pdo = null;
  }

  // Ajax request
  $pdo  = new PDO($dsn, $db_user_name, $db_user_password, $options);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $data = $pdo->query('SELECT * FROM comments');

  $res = array();

  foreach ($data as $row) {
    $res[] = $row;
  }

  // Output json file
  echo json_encode($res);