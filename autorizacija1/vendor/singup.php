<?php
session_start();
require_once 'connect.php';





$full_name = $_POST['full_name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

//apdorojame situacija, kai slaptazodis nesutampa
if ($password === $password_confirm) {
    //cia tesim registracija
    //nuotraukos pakrovimas
   // die('if - password');
    $path = 'uploads/'.time().$_FILES['avatar']['name']; //formuojame path - kur bus talpinamos kraunamos nuotraukos
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../'.$path)) {//jei klaida
        $_SESSION['message'] = 'Klaida kraunant faila'; //formuojame $_SESSION['message']
        header('Location: ../register.php'); //ir nukreipiame vartotoja vel i registracijos forma
     //   die('if - move file');
    }
    //naujas irasas DB test = registracijos duomenys irasomi i DB test i lentele users
    $password = md5($password); //keschuojame slaptazodi
    $sql = "INSERT INTO users VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path')"; //istrinti ('id', 'full_name', 'login', 'email', 'password', 'avatar')
    mysqli_query($connect, $sql);
    $_SESSION['message'] = 'Registracija sekminga';
    header('Location: ../index.php');
} else {
    $_SESSION['message'] = 'Slaptazodis nesutampa'; // i masyva SESSION talpiname pranesima
// key: massage, value: Slaptazodiai nesutampa
    header('Location: ../register.php'); //mes griztame i puslapi register.php, kuriame
    //apacioje bus ivestas tekstas: Slaptazodiai nesutampa
 //   die('if -else');
}
?>
