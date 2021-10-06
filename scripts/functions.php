<?php
    require_once 'connect.php';

    function get_all_users($connect){
        $check_users = mysqli_query($connect, "SELECT * FROM `users`");
        $users = mysqli_fetch_all($check_users);
        return $users;
    }

function filter($str){
    $str = trim($str);
    $str = strip_tags($str);
    $str = htmlspecialchars($str);
    $str = stripcslashes($str);
    return $str;
}

function get_user_by_id($connect, $id ){
    $check_users = mysqli_query($connect, "SELECT * FROM `users` WHERE id = $id");
    $user = mysqli_fetch_assoc($check_users);
    return $user;
}

function update_user($connect, $user, $id){
    $login = $user['login'];
    $name = $user['name'];
    $surname = $user['surname'];
    $gender = $user['pol'];
    $date = $user['trip-start'];
    $password = $user['password'];
    $password = md5($password);
    mysqli_query($connect, "UPDATE `users` SET `login` = '$login', `pass` = '$password', `name` = '$name', `surname` = '$surname',
                   `gender` = '$gender', `date of birth` = '$date' WHERE `users`.`id` = $id");

    $_SESSION['message'] = 'Редактирование прошло успешно!';
    header('Location: ../admin.php');

}

function delete_user($connect, $id){
    mysqli_query($connect, "DELETE FROM `users` WHERE `users`.`id` = $id");
    header('Location: ../admin.php');
}

