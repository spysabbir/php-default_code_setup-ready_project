<?php
  $serverName = "localhost";
  $userName = "root";
  $password = "";
  $dbName = "php_default_setup";

  $db_connect = mysqli_connect($serverName, $userName, $password, $dbName);

  if (!$db_connect) {
    die("Connection failed: " . mysqli_connect_error());
  }

?>