<?php
    $user = "root";
    $pword = "";
    $dbase = "FlashCards";
    $table = "Fish";
    $mydb = new mysqli('localhost', $user, $pword, $dbase);
    if ($mydb->connect_error) {
      die( "Failed to connect to MySQL: " . $mydb->connect_error);
    }
    $target = $_GET['row'];
    $query = "SELECT name, url FROM $table WHERE id = $target";
    if ($result = $mydb->query($query)) {
      $row = $result->fetch_assoc();
      $reply = $row["name"] . "," . $row["url"];
      print ($reply);
    } else {
      print ("query error,");
    }
    $mydb->close();
?>