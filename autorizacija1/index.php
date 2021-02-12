<?php
session_start();
if (@$_SESSION['user']) {
    header('Location: profile.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <!--Autorizacijos forma -->

        <form action="vendor/singin.php" method="POST">
            <label>Login</label>
            <input type="text" name="login" placeholder="Iveskite savo login">
            <label>Slaptazodis</label>
            <input type="password" name="password" placeholder="Iveskite savo slaptazodi">
            <button type="submit">Pirijuntgi</button>
            <p>Jus neturite Paskyros - <a href="register.php">Registruokites</a></p>
            <?php
            if (@$_SESSION['message']) { //jei $_session['message'] yra
                echo '<p class="msg">'.$_SESSION['message'].'</p>'; //isvedame pastraipoje p class=msg $_session['messae'] turini
            }
            unset($_SESSION['message']); //ir naikiname $_SESSION['messae']
            ?>
        </form>

    </body>
</html>
