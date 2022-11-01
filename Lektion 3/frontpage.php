<?php
session_start();
include "config.php";

if (isset($_POST['user_name']) && isset($_POST['password'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    if (empty($user_name)) {
        echo("Location: index.php?error= Username is required");
    }
    elseif (empty($password)) {
        echo "<br> Password is empty <br>";
    }
}

$sql = "SELECT * FROM user WHERE user_name = :username AND password = :password";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $user_name);
$stmt->bindParam(':password', $password);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<pre>
    <?php
print_r($result);
?>
</pre>

<?php
//OBS i denne del skal vi være obs på om det er user eller users og user_name eller username
if(ISSET($_POST['login_b'])){
    if($_POST['user_name'] != "" || $_POST['password'] != ""){
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user WHERE user_name = :user_name AND password= :password";

        $query = $conn->prepare($sql);
        $query->bindParam(':user_name', $user_name);
        $query->bindParam(':password', $password);
        
        //En anden måde at logge in på
        //$sql = "SELECT * FROM user WHERE user_name = ? AND password= ?";
        //$query = $conn->prepare($sql);
        //$query -> execute(array($user_name, $password));
        $query -> execute();
        $row = $query->rowCount();
        $fetch = $query->fetch();
        if($row > 0) {
            $_SESSION['user_name'] = $fetch['password'];
            header("location: uploadpage.php");
        } else{
            echo "
            <script>alert('Invalid username or password')</script>
            <script>window.location = 'index.php'</script>
            ";
        }
    }
    else{
        echo "
        <script>alert('Please complete the required field!')</script>
        <script>window.location = 'index.php'</script>
        ";
    }
}


