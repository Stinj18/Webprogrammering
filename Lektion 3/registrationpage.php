<html>
<head>
        <title> Registration </title>
        <script src="registrationscript.js"></script>
</head>
   <body>
    <div class="container">
      <form class="form" method="post" action=".Register.php">
        <label for="name">Name</label> <br />
        <input type="text" name="name" id="name" pattern="[a-zA-Z0-9]+" minlength="4" maxlength="10" placeholder="Name" required/> <br />
        <label for="username">Username</label> <br />
        <input type="text" name="username" id="username" pattern="[a-zA-Z0-9]+" minlength="4" maxlength="10" placeholder="Username" required/> <br />
        <label for="password">Password</label> <br />
        <input type="password" name="password" id="password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" minlength="6" maxlength="16" placeholder="Password" required/> <br />
        <label for="password2">Repeat password</label> <br />
        <input type="password" name="password2" id="password2" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" minlength="6" maxlength="16" placeholder="Repeat password" required/> <br />
        <button type="submit" name="button">Register</button>
        <p>Already a user? Click <a href="index.php">HERE</a></p>
      </form>
    </div>
  </body>

</html>
