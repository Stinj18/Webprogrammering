
<form action="/home/uploadpage" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" class="upload_file" onchange="base64img(this)">
    <label> Image header </label>
    <input type="text" name = "img" id="img">
    <input type="text" name="imgheader" placeholder="image header"> <br>
    <label> Image decription </label>
    <input type="text" name="imgdescription" placeholder="image description"> <br>
    <input type="submit" value="Upload Image" name="submit">
</form>
