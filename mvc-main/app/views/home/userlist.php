<HTML>
    <head>
        <title> User list </title>
    </head>
    
    <body>
        <h1> Users: </h1>

        <table class ="Userslist">
            <tr>
                <!-- <td> Usernames: </td> -->
            </tr>
            <tr>
                <?php
                    foreach ($result as $user) {
                        echo "<tr>".
                        "<td>" . $user["username"] . "</td>" .
                        "</tr>";
                    }
                ?>
            </tr>
        </table>
    </body>


</HTML>
