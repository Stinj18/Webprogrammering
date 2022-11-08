<?php session_start();
  include "config.php";

  $username = $_POST["username"];
  $password = $_POST["password"];
  $password2 = $_POST["password2"];

  if ($password == $password2) {
    $hashed_psw = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password)
            VALUES (:username, :hashed_psw);";


    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':hashed_psw', $hashed_psw);

    $stmt->execute();

    header("location: ../userList.php");
  } else {
    echo "Passwords not the same";
  }
?>