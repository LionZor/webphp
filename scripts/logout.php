<?php
session_start();
unset($_SESSION['user']);
//setcookie('user[name]', $user['name'], time()-3600, "/");
//setcookie('user[surname]', $user['surname'], time()-3600, "/");
//setcookie('user[date]', $user['date of birth'], time()-3600, "/");
header('Location: ../index.php');