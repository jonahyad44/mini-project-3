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
    $query = "SELECT name FROM $table WHERE id != $target ORDER BY rand() LIMIT 4;";
    if ($result = $mydb->query($query)) {
      $row = $result->fetch_assoc();
      $names = $row["name"];
      while ($row = $result->fetch_assoc())
        $names .= "," . $row["name"];
      print ($names);
    } else {
      print ("query error");
    }
    $mydb->close();
?>