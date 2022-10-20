<html>
<head>
    <title> Form for username and password </title>

    <link rel="stylesheet" type="text/css" href="Form.css">

</head>
<body>
    <form method="post" action="<php ech $_SERVER['PHP_SELF'];?>">
        <h2>LOGIN</h2>    
        Name: <input type = "text" name="vname">
        <br>
        Password: <input type = "text" name="passw">
        <br>
        <input type="submit" name="Submit">
    </form>
</body>
</html>


<?php 
include "db_config.php";

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $name = $_POST['vname'];
    if (empty($name)) {
        echo "<br> Name is empty <br>";
    }
    elseif ($_POST['vname']=="Malle") {
        echo "<br> Dette brugernavn er allerede brugt";
    }
    else {
        echo "Du har skrevet dette navn: $name";
    }

    $password = $_POST['passw'];
    if (empty($password)) {
        echo "<br> Password is empty <br>";
    } else {
        echo "<br>";
        echo "Dit valgte password er: $password" ;
        echo "<br>";
        echo "To log out click here:";
    }
}
?>

<?php if (isset($_POST['Submit'])){
    echo "Du trykkede på sumbit";
}
?>

