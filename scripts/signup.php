<?php

    session_start();
    require_once 'connect.php';


    $login = $_POST['login'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $gender = $_POST['pol'];
    $date = $_POST['trip-start'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password === $password_confirm) {

        $password = md5($password);

        mysqli_query($connect, "INSERT INTO `users` (`login`, `pass`, `name`, `surname`, `gender`, `date of birth`) VALUES ('$login', '$password', '$name', '$surname', '$gender', '$date')");

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../index.php');


    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../register.php');
    }

?>
