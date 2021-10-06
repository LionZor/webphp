<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);
        print_r($user);

        /*$_COOKIE['user'] = [
            "id" => $user['id'],
            "name" => $user['name'],
            "surname" => $user['surname'],
            "date" => $user['date of birth']
        ];*/

        //print_r($_COOKIE['user']);

        //setcookie('user[name]',$user['name'], time()+3600, "/");
        //setcookie('user[surname]',$user['surname'], time()+3600, "/");
        //setcookie('user[date]',$user['date of birth'], time()+3600, "/");

        $_SESSION['user'] = [
            "id" => $user['id'],
            "name" => $user['name'],
            "surname" => $user['surname'],
            "date" => $user['date of birth'],
            "admin" => $user['is_admin']
        ];
        if ($_SESSION['user']['admin']){
            header('Location: ../admin.php');
        }
        else header('Location: ../profile.php');

    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../index.php');
    }
    ?>

<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>
</pre>
