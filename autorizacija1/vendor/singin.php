<?php

session_start();
require_once 'connect.php';


$login = $_POST['login'];
$password = md5($_POST['password']);

$checkUser = mysqli_query($connect, "SELECT * FROM users WHERE 'login' = '$login' AND 'password' = '$password'");

if ($checkUser) { //if (mysqli_num_rows($checkUser) > 0)
    $user = mysqli_fetch_assoc($checkUser); //prevercia $checkUser asociatu masyvu
    //sukuriame masyva SESSION['user'] su mums reikalingais laukais
    $_SESSION['user'] = [
        'id' => $user['id'],
        'full_name' => $user['full_name'],
        'avatar' => $user['avatar'],
        'email' => $user['email']
    ];
    header('Location:../profile.php');
} else {
    $_SESSION['massage'] = 'Registracija sekminga';
    header('Location: ../index.php');
}
?>
