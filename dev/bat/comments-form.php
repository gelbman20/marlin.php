<?php
  include '../config.php';

  // Insert data to DB

  $comment_name = $_POST[ 'name' ] ? $_POST[ 'name' ] : $_SESSION[ 'login' ];
  $comment_text = $_POST[ 'text' ];

  if ( !empty($comment_name) && !empty($comment_text) ) {
    $pdo = new PDO($dsn, $db_user_name, $db_user_password, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ( isset($_SESSION[ 'login' ]) ) {
      $user_id = $_SESSION[ 'user_id' ];
      $sql = "INSERT INTO comments (id, user_id, name, avatar, date_time, text) VALUES (NULL, '$user_id', '$comment_name', 'img/no-user.jpg', CURRENT_TIMESTAMP, '$comment_text')";
      $pdo->exec($sql);
    } else {
      $sql = "INSERT INTO comments (id, name, avatar, date_time, text) VALUES (NULL, '$comment_name', 'img/no-user.jpg', CURRENT_TIMESTAMP, '$comment_text')";
      $pdo->exec($sql);
    }
    $pdo = null;
  }

  // Ajax request
  $pdo = new PDO($dsn, $db_user_name, $db_user_password, $options);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $data = $pdo->query("SELECT * FROM comments ORDER BY `id` DESC");

  $res = array();

  foreach ( $data as $row ) {
    // Format Date
    $date_time = strtotime($row[ 'date_time' ]);
    $row[ 'date_time' ] = date("d/m/Y", $date_time);

    $res[] = $row;
  }

  // Output json file
  echo json_encode($res);