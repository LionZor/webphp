<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: profile.php');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>

    <form action="scripts/signup.php" method="post" >
        <label>Фамилия</label>
        <input type="text" name="surname" placeholder="Введите свою фамилию">
        <label>Имя</label>
        <input type="text" name="name" placeholder="Введите свое полное имя">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Выберете ваш пол</label>
        <p>
            <select size="1" name="pol">
                <option value="1">Мужчина</option>
                <option value="0">Женщина</option>
            </select>
        </p>
        <label>Дата рождения </label>
        <input type="date" id="start" name="trip-start"
               value="2000-01-01"
               min="1900-01-01" max="2021-10-05">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button type="submit" class="register-btn">Зарегистрироваться</button>
        <p>
            У вас уже есть аккаунт? - <a href="/">авторизируйтесь</a>!
        </p>
        <?php
            if (isset($_SESSION['message'])) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>