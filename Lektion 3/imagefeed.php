<?php
include "config.php";
?>

<html>
<head>
    <title> Your image feed </title>
    <link rel="stylesheet" type="text/css" href="imagefeedCSS.css">
</head>

<body>
    <header id="header">
        <nav>
            <a href="./imagefeed.php">Image feed</a>
            <a href="./uploadpage.php">Upload image</a>
            <a href="./userlist.php">User list</a>
        </nav>
    </header>

    <div class="imagefeed"> /*Skal gentages så mange gange som der er brugere i databasen*/
        <div id="navn">
            <p> username </p> /* Skal hentes fra databasen?? */
        </div>

        <div id="image">
            <p> imageheader </p> /*Skal hentes fra databasen */
            <img src="Jordbaertaerte.jpg" alt="En jordbærtærte" title="Jordbærtærte"/> /*Skal hentes fra databasen */

            <p> decription </p> /*Skal også hentes fra databasen*/
        </div>
    </div>

    <hr> 

</body>

</html>
