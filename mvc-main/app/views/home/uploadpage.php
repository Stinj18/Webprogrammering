

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" class="upload_file">
    Give your image a header: 
    <input type="text" name="imageheader" id="imageheader">
    <label> Image decription </label>
    <input type="text" name="imgdescription" placeholder="image description"> <br>
    <input type="submit" value="Upload Image" name="submit">
</form>
