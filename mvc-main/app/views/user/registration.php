<h1>Register new user</h1>
<div class="container">
    <form class="form" method="post" action="/user/register">
        <label for="username">Username</label> <br />
        <input type="text" name="username" id="username" pattern="[a-zA-Z0-9]+" minlength="4" maxlength="10" placeholder="Username" required/> <br />
        <!-- Username skal være minimum 4 karaktere langt og maks 10, kan bestå af små og store bogstaver og tal -->
        <label for="password">Password</label> <br />
        <input type="password" name="password" id="password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$" minlength="6" maxlength="16" placeholder="Password" required/> <br />
        <!-- password skal være minimum 6 langt og maks 16, skal indeholde et stort, et lille, et tal og et specialtegn -->
        <label for="password2">Repeat password</label> <br />
        <input type="password" name="password2" id="password2" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$" minlength="6" maxlength="16" placeholder="Repeat password" required/> <br />
        <button type="submit" name="button">Register</button>
        <p>Already a user? Click <a href="/user/login">HERE</a></p> 
    </form>
</div>

