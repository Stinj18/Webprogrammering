<!DOCTYPE html>
<html>
<head>
    <title> Upload page </title>
    <link rel="stylesheet" type="text/css" href="style.css">

    <?php 
        session_start();
        include "config.php";
        ?>
</head>
    ########################### FØLGENDE PHP SIKRER AT MAN IKKE KAN TILGÅ DENNE SIDE MED MINDRE MAN ER LOGGET IND!!!!  ############
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

<body>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" class="upload_file" onchange="base64img(this)">
    <label> Image decription </label>
    <input type="text" name="imgdescription" placeholder="image description"> <br>
    <input type="submit" value="Upload Image" name="submit">
</form>

<script>
    function base64img(obj){
        var reader = new FileReader();
        reader.readAsDataURL(obj.files[0]);
        reader.onload = function() {
            document.getElementById('base64').innerText = reader.result;
            document.getElementById('b64img').scr = reader.result;
            document.getElementById('b64i').value = reader.result;
        }
    }
</script>
<?php

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        //echo '<a href="'.$target_file.'">Download you file here</a>';
        $uploadOk = 1;
    } 
    else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } 
    else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
        {
            echo "The file ".basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            //echo  '<img src="'.base64_encode($_FILES["fileToUpload"]["tmp_name"]) . '">';

            $sql = "INSERT INTO images (username, image, imgdescription)
                    VALUES (:username, :fileToUpload, :imgdescription);";

            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':fileToUpload', $image);
            $stmt->bindParam(':imgdecription', $imgdescription);

            $stmt->execute();

            header("location: imagefeed.php");
        } 
        else 
        {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
</body>



#session_start(); /*creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.*/




?>
</html>
