<?php
session_start();
require_once 'scripts/connect.php';
require_once 'scripts/functions.php';

    if(isset($_REQUEST['id'])){
        $id = (int) $_REQUEST['id'];

        //Если передан неккоректный id
        if($id == 0){
            echo "Ошибка(Неверный id)";
            exit();
        }

        if(isset($_POST['login'])
            && isset($_POST['name'])
            && isset($_POST['surname'])
            && isset($_POST['trip-start'])
            && isset($_POST['password'])
            && isset($_POST['password_confirm'])){

            $login = filter($_POST['login']);
            $name = filter($_POST['name']);
            $surname = filter($_POST['surname']);
            $gender = filter($_POST['pol']);
            $date = $_POST['trip-start'];
            $password = ($_POST['password']);
            $password_confirm = ($_POST['password_confirm']);
            if ($password === $password_confirm) {
                print($date);
                update_user($connect, $_POST, $id);
                //header('Location: ../admin.php');
            } else $_SESSION['message'] = 'Пароли не совпадают';

        }
        else {
            $user = get_user_by_id($connect, $id);
            if(!$user){
                echo "Данный пользователь не найден";
                exit();
            }

            $id    = $user['id'];
            $login = $user['login'];
            $name = $user['name'];
            $surname = $user['surname'];
            $gender = $user['gender'];
            $date = $user['date of birth'];
        }
    }
    else {
        echo "Ошибка";
        exit();
    }
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Редактирование пользователя </title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <form action="edit_user.php" method="post" >
        <label>Фамилия</label>
        <input type="text" name="surname" value="<?=$surname?>">
        <label>Имя</label>
        <input type="text" name="name" value="<?=$name?>">
        <label>Логин</label>
        <input type="text" name="login" value="<?=$login?>">
        <input type="hidden" name="id" value="<?=$id?>"  />
        <label>Выберете ваш пол</label>
        <p>
            <select size="1" name="pol">
                <option value="1">Мужчина</option>
                <option value="0">Женщина</option>
            </select>
        </p>
        <label>Дата рождения </label>
        <input type="date" id="start" name="trip-start"
               value="<?=$date?>"
               min="1900-01-01" max="2021-10-05">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите новый">
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit" class="register-btn">Редактировать</button>
        <button href="admin.php" type="submit" class="register-btn">Вернуться обратно</button>
        <?php
        if (isset($_SESSION['message'])) {
            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>