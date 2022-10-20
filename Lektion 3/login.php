/*  https://www.simplilearn.com/tutorials/php-tutorial/php-login-form */
<?php
session_start();
include "config.php";

if(isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return data;
    }
}

$uname = validate($_POST['uname']);
$pass = validate($_post['password']);

if(empty($uname)){
    header("Location: index.php?error= User Name is required");
    exit();
}
else if(empty($pass)){
    header("Location: index.php?error= Password is required");
    exit();
}

$sql = "SELECT * FROM users WHERE user_name='$uname' ABS password='$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    if($row['user_name'] === "$uname" && $row['password'] === $pass) {
        echo "Logged in";
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("Location: uploadpage.php");
        exit();
    }
    else {
        header("Location: index.php?error=Incorrect User Name or Password");
        exit();
    }
}
else {
    header("Location: index.php");
    exit();
}
