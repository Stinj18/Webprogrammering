<!DOCTYPE html>
<html>
<head>
    <title> LOGIN </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <form actions="frontpage.php" method="post">
    <h2>LOGIN</h2>
    <?php if(isset($GET['error'])){ ?>
    <p class="error"> <?php echo $GET['error']; ?></p>
      <?php } ?>
    <label> User Name </label>
    <input type="text" name="username" placeholder="username"> <br>
    <label> Password </label>
    <input type="password" name="password" placeholder="password"> <br>

    <button formaction="registrationpage.php"> Create a new login</button>
    <div class="form-group">
      <button class="btn btn-primary form-control" name="login_b">Login</button>
		</div>
    
   </form>
</body>
</html>
