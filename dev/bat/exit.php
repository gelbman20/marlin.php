<?php
  include_once "../config.php";

  unset($_SESSION[ 'login' ]);
  unset($_SESSION[ 'email' ]);

  header("Location: ../index.php");