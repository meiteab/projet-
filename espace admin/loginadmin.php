<?php
session_start();
if (isset($_POST['valider'])) {
    if (!empty($_POST['username']) and !empty($_POST['pass'])) {
        $userdefault = "admin";
        $passdefault = "mdp123";

        $trueuser = htmlspecialchars($_POST['username']);
        $truepass = htmlspecialchars($_POST["pass"]);

        if ($trueuser == $userdefault and $truepass == $passdefault) {
            $_SESSION["pass"]  = $truepass;
            header("Location: admin.php");
        } else {
            echo "incorrect password or user";
        }
    } else {
        echo "fill in empty fields";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connection</title>
</head>

<body>
    <form method="POST" action="">
        <input type="text" name="username" autocomplete="off">
         <br>
        <input type="password" name="pass"> 
        <br><br>
        <input type="submit" name="valider">
    </form>
</body>
</html>