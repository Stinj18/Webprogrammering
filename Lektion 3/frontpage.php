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
if(ISSET($_POST['login_b'])){
    if($_POST['username'] != "" || $_POST['password'] != ""){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username = :username";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);

        
        //En anden måde at logge in på
        //$sql = "SELECT * FROM user WHERE user_name = ? AND password= ?";
        //$query = $conn->prepare($sql);
        //$query -> execute(array($user_name, $password));
        $stmt -> execute();
        $row = $stmt->rowCount();
        $fetch = $stmt->fetch();
        if($row > 0) {
            if(password_verify($password, $fetch['password']) == TRUE){
                header("location: uploadpage.php");
            }
            elseif(password_verify($password, $fetch['password']) == FALSE){
                $issueUsername = "Your username is incorrect";
            }
        }  else{
            $issueUsername = "Your username is incorrect";
        }


        print($username);
        

        
    
        #Jeg tjekker her om de de stemmeroverens så det betyder at man altså kan først tjekke usernamet om det findes 
        #i databasen og hvis det ikke gør kan man give en fejl meddelse der og det samme kan man efterfølgende gøre ved password

        
    }
    else{
        echo "
        <script>alert('Please complete the required field!')</script>
        <script>window.location = 'frontpage.php'</script>
        ";
    }
}
