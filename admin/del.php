<?php
require_once "../connect.php";
$del = $_GET['del'];
$query = "delete from tovar where id_tovar = '$del'";
$result = mysqli_query($con, $query);

if ($result) {
    echo "<script>alert('Запись удалена!'); location.href ='../admin/index.php'; </script>";
} else {
    echo "<script>alert('Ошибка!'); location.href ='../admin/index.php';</script>";
}
?>