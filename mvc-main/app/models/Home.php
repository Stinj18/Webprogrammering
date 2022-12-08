<?php
/**
 * The home model simply exists as proof of concept
 * The model contains the data of an entity which is why
 * it extends the Database so it always has access to the DB connection
 */
class Home extends Database {
	
	public function x_string($string){
		return "x_" . $string; #Returnere hvad du har givet den efterfulgt af en X_
		#Et simpelt eksempel på at man kan kalde en model 
		#Den vil normalt get some data fra en database 
	}
	function check() {
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
		} 
    }
	
	public function upload(){
        //if(isset($_POST["submit"])) {
            $target_dir = "uploads/";
            $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    
                if(TRUE)
                //if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
                {
                    echo "The file ".basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                    //echo  '<img src="'.base64_encode($_FILES["fileToUpload"]["tmp_name"]) . '">';
        
                    $username = filter_var ( $_POST['username'], FILTER_SANITIZE_STRING);
                    $img = filter_var ( $_POST['img'], FILTER_SANITIZE_STRING);
                    $imgheader = filter_var ($_POST['imgheader'], FILTER_SANITIZE_STRING);
                    $imgdescription = filter_var ($_POST['imgdescription'], FILTER_SANITIZE_STRING); 
        
                    $sql = "INSERT INTO images (username, img, imgheader, imgdescription)
                            VALUES (:username, :img, :imgheader, :imgdescription);";
                    $stmt = $conn->prepare($sql);
                    
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':img', $img, PDO::PARAM_STR_CHAR);
                    $stmt->bindParam(':imgheader', $imgheader);
                    $stmt->bindParam(':imgdescription', $imgdescription);
        
                    $stmt->execute();
        
                    //header("location:imagefeed.php");
                } 
                else 
                {
                    echo "Sorry, there was an error uploading your file.";
                }
            //}
        }
    /**
	 * Gets all users from the database, but without revealing their password hash
	 */
	public function get_images () {
		$sql = "SELECT image_id ,image, imgheader, imgdescription FROM images";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}


    /*
	 * Gets a single image from the database, from image_id
	 */
	public function get_image ($image_id) {
		$sql = "SELECT image_id, image, imgheader, imgdescription FROM images WHERE image_id = :image_id";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':image_id', $image_id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

}