<nav>
    <div>amazing menu: 
        <?php if(isset($_SESSION['logged_in'])) : ?>
            <a href="/user/logout">logout</a>
            
        <?php else : ?>
            <a href="/user/login">login</a>
        <?php endif; ?>

        <a href="/user/register">register</a>
        <a href="/home/imagefeed">imagefeed</a> <!-- Get metode til at komme til restricted page  -->
        
        <a href="/home/uploadpage">upload image</a>
        <a href="/user/userlist">userlist</a>
        
    </div>
</nav>
<?php
/**
 * The menu file contains the top menu of the project.
 */