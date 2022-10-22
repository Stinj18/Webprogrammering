<!DOCTYPE html>
<head>
    <title> Upload page </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <nav class="topnav">
        <a href="./imagefeed.php">Image feed</a>
        <a class="active" href="./uploadpage.php">Upload image</a>
        <a href="./userlist.php">User list</a>
    </nav>
    
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>


<?php 

#Jeg kan ikke få nav bar øverst??? 
#session_start(); /*creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.*/



########################### FØLGENDE SIKRER AT MAN IKKE KAN TILGÅ DENNE SIDE MED MINDRE MAN ER LOGGET IND!!!!  ############
/*if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){
    ?>

    <!DOCTYPE html>
    <html>
    <head>

        <title>HOME</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>Hello, <?php echo $_SESSION['user_name']; ?></h1>
        <a href="logout.php">Logout</a>
    </body>
    </html>

    <?php
}
else {
    header("Location: index.php");
    exit();
}
?>*/
?>
</html>
