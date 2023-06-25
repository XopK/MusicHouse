<?php
require_once "../connect.php";
$no = !empty($_GET['no']) ? $_GET['no'] : false;
$yes = !empty($_GET['yes']) ? $_GET['yes'] : false;
$id_user = "SELECT * FROM `orders` WHERE id_order = '$yes' or id_order = '$no'";
$res_user = mysqli_fetch_array(mysqli_query($con,$id_user));
$id = $res_user['user'];
if(isset($no) || isset($yes)){
    if(!empty($no)){
        $query_no = "UPDATE `orders` SET `status`= 2 where id_order = '$no'";
        $no_result = mysqli_query($con,$query_no);
    }else{
        $query_yes = "UPDATE `orders` SET `status`= 1 where id_order = '$yes'";
        $yes_result = mysqli_query($con,$query_yes);
    }
    if ($no_result || $yes_result) {
        echo "<script>alert('Успех'); location.href = '/admin/ordersAdmin.php';</script>";
    } else {
        echo "<script>alert('Ошибка');</script>";
    }
}
?>