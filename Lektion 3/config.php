<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $servername = "localhost";
    $username = "root";
    $password = ""; #Koden kan som standard være "" eller root

    $db_name = "migration";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=".$db_name, $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully"; 
      } 
      catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }

    $conn = null;
?>
