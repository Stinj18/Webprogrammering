<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $sname = "localhost";
    $unmae = "root";
    $password = "root"; #Koden kan også som standard være ""

    $db_name = "test_db";

    try {
        $conn = new PDO("mysql:host=$sname;dbname=".$db_name, $unmae, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully"; 
      } 
      catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
?>
