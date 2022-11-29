<?php 
session_start();
include "config.php";
<?php 
if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    ?>

    <!DOCTYPE html>
    <html>
    <head>

        <title>HOME</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
        <a href="logout.php">Logout</a>
    </body>
    </html>

    <?php
}
else {
    header("Location: index.php");
    exit();
}
?>

//Fetch all users in table 
$sql = "SELECT * FROM users;";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<html>
    <head>
        <title> User list </title>
        <link rel="stylesheet" type="text/css" href="imagefeedCSS.css">
    </head>
    
    <body>

        <header id="header">
            <nav> 
            <a href="./imagefeed.php">Image feed</a>
            <a href="./uploadpage.php">Upload image</a>
            <a href="./userlist.php">User list</a>
            </nav>
        </header>

        <h1> Users: </h1>

        <table class ="Userslist">
            <tr>
                <!-- <td> Usernames: </td> -->
            </tr>
            <tr>
                <?php
                    foreach ($result as $user) {
                        echo "<tr>".
                        "<td>" . $user["username"] . "</td>" .
                        "</tr>";
                    }
                ?>
            </tr>
        </table>
    </body>

</html>
