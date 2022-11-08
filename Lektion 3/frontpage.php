<?php
session_start();
include "config.php";
include "index.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username)) {
        echo("Location: index.php?error= Username is required");
    }
    elseif (empty($password)) {
        echo "<br> Password is empty <br>";
    }
}

/* $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC); */
?>


<?php
//OBS i denne del skal vi være obs på om det er user eller users og user_name eller username
if(ISSET($_POST['login_b'])){
    if($_POST['username'] != "" || $_POST['password'] != ""){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username = :username AND password= :password";

        $query = $conn->prepare($sql);
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);
        
        //En anden måde at logge in på
        //$sql = "SELECT * FROM user WHERE user_name = ? AND password= ?";
        //$query = $conn->prepare($sql);
        //$query -> execute(array($user_name, $password));
        $query -> execute();
        $row = $query->rowCount();
        $fetch = $query->fetch();
        print($username);

        if($row > 0) {
            $_SESSION['username'] = $fetch['password'];
            header("location: uploadpage.php");
        }  else{
             echo "
            <script>alert('Invalid username or password')</script>
            <script>window.location = 'frontpage.php'</script>
            "; 
        }
    }
    else{
        echo "
        <script>alert('Please complete the required field!')</script>
        <script>window.location = 'frontpage.php'</script>
        ";
    }
}


