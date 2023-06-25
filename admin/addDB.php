<?php
require_once "../connect.php";
$name_tovar = $_POST['name'];
$cost = $_POST['sale'];
$country = $_POST['country'];
$model = $_POST['model'];
$category = $_POST['category'];
$date = $_POST['date'];
$photo = $_FILES['photo'] ['name'];
$query = "insert into tovar(id_tovar, name_tovar, sale, photo, country, date_tovar, model, category)values(null, '$name_tovar', '$cost', '$photo', '$country', '$date', '$model', '$category')";
$result = mysqli_query($con, $query);

if(isset($_FILES['photo'] ['tmp_name'])){
    $name = '../img/' . $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp_name, $name);
}

if($result){
    echo "<script>alert('Запись доавлена'); location.href='index.php';</script>";
}else{
    echo "<script>alert('Ошибка!'); location.href='admin/';</script>";
}
?>