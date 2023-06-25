<?php
session_start();
require_once "connect.php";
$login = $_POST['login'];
$password = $_POST['password'];

$query = "select * from users where `login` = '$login'";
$check = mysqli_fetch_array(mysqli_query($con, $query));

if($check['password'] == $password && $check['login'] == $login){
    $role = $check['role'];
    $_SESSION['id_user'] = $check['id_user'];
    $_SESSION['role'] = $role;
    if ($_SESSION['role'] == 1){
        echo "<script>alert('Вы успешно авторизировались!'); location.href ='/admin'; </script>";
    }else{
        echo "<script>alert('Вы успешно авторизировались!'); location.href ='/'; </script>";
    }
   
    
}else{
    echo "<script>alert('Ошибка авторизации, проверьте введеные данные!'); location.href ='/autho.php'; </script>";
}
