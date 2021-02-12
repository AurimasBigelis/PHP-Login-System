<?php
session_start();
if (@$_SESSION['user']) {
    header('Location: profile.php');
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>

        <form action="vendor/singup.php" method="POST" enctype="multipart/form-data">
            <label>Vardas Pavarde</label>
            <input type="text" name="full_name" placeholder="Iveskite savo varda ir pavarde">
            <label>Login</label>
            <input type="text" name="login" placeholder="Iveskite savo login">
            <label>Pastas</label>
            <input type="email" name="email" placeholder="Iveskite savo el.pasta">
            <label>Portfilio nuotrauka</label>
            <input type="file" name="avatar">
            <label>Slaptazodis</label>
            <input type="password" name="password" placeholder="Iveskite savo slaptazodi">
            <label>Slaptazodio patvirtinimas</label>
            <input type="password" name="password_confirm" placeholder="Iveskite savo slaptazodi">
            <button type="submit" name="reg_user">Prisijungti</button>
            <p>Jus jau turite paskyra - <a href="index.php">Autorizuokites</a></p>


            <?php
            if (@$_SESSION['message']) { //jei $_SESSION['message'] yra
                echo '<p class="msg">'.$_SESSION['message'].'</p>'; //ivedame pastraipoje p class=msg $_SESSION['message'] turini
            }
            unset($_SESSION['message']); // ir naikiname $_SESSION['message'], nes kitaip perkrovus puslapi register.php i isliks
            ?>

        </form>

    </body>
</html>
