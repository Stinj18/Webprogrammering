<!DOCTYPE html>
<html>
<head>
    <title> LOGIN </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <form actions="login.php" method="post">
    <h2>LOGIN</h2>
    <?php if(isset($GET['error'])){ ?>
    <p class="error"> <?php echo $GET['error']; ?></p>
      <?php } ?>
    <label> User Name </label>
    <input type="text" name="uname" placeholder="User Name"> <br>
    <label> Password </label>
    <input type="password" name="password" placeholder="password"> <br>

      <button type="submit">Login</button>
   </form>
</body>
</html>