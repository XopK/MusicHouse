<?php
require_once "connect.php";
$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$query = "insert into users(id_user, name, surname, patronymic, login, email, password, role) values (null, '$name', '$surname', '$patronymic', '$login', '$email', '$password', 2)";
$result = mysqli_query($con, $query);
if($result){
    echo "<script>alert('Регистрация прошла успешно'); location.href='/';</script>";
}else{
    echo "<script>alert('Ошибка регистрации'); location.href='/registration.php';</script>";
}
?>