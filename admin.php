<?php
    require_once 'scripts/functions.php';
    require_once 'scripts/connect.php';
    session_start();
    if (!$_SESSION['user']['admin']) {
        header('Location: /');
    }
?>

<?php

    $page = 1;
    $per_page = 4;

    if(isset($_GET['count'])){
        $per_page = $_GET['count'];
    }

    $table = get_all_users($connect);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <forma>
            <table border="1" >
                <caption>Таблица пользователей</caption>
                <tr>
                    <th>id</th>
                    <th>log</th>
                    <th>name</th>
                    <th>surname</th>
                    <th>gender</th>
                    <th>date of birth</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>

            <?php
                foreach ($table as $value) {
                    $id = $value['0'];
                    $login = $value['1'];
                    $name = $value['3'];
                    $surname = $value['4'];
                    $gender = $value['5'];
                    $date = $value['6'];
                    require 'templates/new_row.php';
                }
            ?>

            </table>
        <a href="scripts/logout.php" class="logout">Выход</a>
    </forma>
</body>
</html>