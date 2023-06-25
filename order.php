<?php
session_start();
require_once "connect.php";
if (isset($_SESSION['storage'])) {
    $id_user = $_SESSION['id_user'];
    $code = $_GET['code'];
    foreach ($_SESSION['storage'] as $key => $elem) {
        $query = "select * from tovar where id_tovar = '$elem'";
        $tovar = mysqli_fetch_array(mysqli_query($con, $query));
        $tovarqq = $tovar['id_tovar'];
        $query_insert = "INSERT INTO `orders`(`id_order`, `code_order`, `user`, `tovar`, `status`) VALUES (null, '$code', '$id_user','$tovarqq', 3)";
        $ress = mysqli_query($con, $query_insert);
    }
    if ($ress) {
        echo "<script>alert('Заказ оформлен'); location.href='/';</script>";
        unset($_SESSION['storage']);
    } else {
        echo "<script>alert('Ошибка');</script>";
        echo mysqli_error($con);
    }
}
