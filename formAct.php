<?php

  $serverName = "localhost";//This is true
  $use = "adrianco_adrian";//Supposed to be user
  $password = "SECRET";
  $dbName = "SUUUP";

  //Create connection
  $dbcon = new mysqli($serverName, $use, $password, $dbName);

  if ($dbcon->connect_error){
    die("Connection to the server failed");
  }


 ?>
