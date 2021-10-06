<?php
    require_once 'scripts/functions.php';
    require_once 'scripts/connect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            print('good2');
            delete_user($connect, $id);
            //header('Location: ../admin.php');
        }
        else {
            echo 'ошибка';
        }

    }
