

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" class="upload_file">
    Give your image a header: 
    <input type="text" name="imageheader" id="imageheader">
    Lav en beskrivelse af billedet: 
    <input type="text" name="imageDescription" id="imageDescription">
    <input type="submit" value="Upload Image" name="submit">
</form>
