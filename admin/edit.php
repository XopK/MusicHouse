<?php
require_once "../connect.php";
$sql_query = "select * from tovar";
$querycat = "select * from category";
$resultcat = mysqli_query($con, $querycat);
$query_first = "select id_tovar from tovar limit 1";
$result_first_id = mysqli_fetch_array(mysqli_query($con, $query_first));
$result = mysqli_query($con, $sql_query);
$tovar_id = !empty($_GET["edit"]) ? $_GET["edit"] : $result_first_id['id_tovar'];
$tovar_info = mysqli_fetch_array(mysqli_query($con, "select * from tovar where id_tovar = '$tovar_id'"));
$category_info = mysqli_fetch_array(mysqli_query($con, "select * from category join tovar on category.id_category = tovar.category where id_category = category"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Админка</title>
</head>

<body>
    <a href='/admin/index.php'><Button class='btn log-btn'>Назад</Button></a>
    <div class="editBlock">
        <img src="../img/<?=$tovar_info['photo']?>" alt="<?=$tovar_info['photo']?>" style="width: 320px;">
        <form action="../admin/edit.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" id="id_tovar" name="id_tovar" value="<?= $tovar_id ?>">
            <div class="input-group"><label for="name">Название товара</label><input value="<?= $tovar_info['name_tovar'] ?>" type="text" id="name" name="name"></div>
            <div class="input-group"><label for="cost">Цена</label><input value="<?= $tovar_info['sale'] ?>" type="text" id="sale" name="sale"></div>
            <div class="input-group"><label for="Country">Страна произодитель</label><input value="<?= $tovar_info['country'] ?>" type="text" id="country" name="country"></div>
            <div class="input-group"><label for="model">Модель</label><input value="<?= $tovar_info['model'] ?>" type="text" id="model" name="model"></div>
            <div class="input-group"><select name="category" id="category">
                    <?php
                    while ($category = mysqli_fetch_array($resultcat)) {
                    ?>
                        <option value="<?= $category['id_category']; ?>"><?= $category['name_category'] ?></option>
                    <?php
                    }
                    ?>
                </select></div>
            <div class="input-group"><label for="photo"></label><input value="<?= $tovar_info['photo'] ?>" type="file" id="photo" name="photo"></div>
            <input type="submit" value="Редактировать" style="margin-top: 20px;">
        </form>
    </div>
    <?php
    if (!empty($_POST)) {
        $id = $_POST['id_tovar'];
        $name_tovar = $_POST['name'];
        $cost = $_POST['sale'];
        $country = $_POST['country'];
        $model = $_POST['model'];
        $category = $_POST['category'];
        $photo = $_FILES['photo'] ['name'];

        $update = "update tovar set name_tovar = '$name_tovar', sale = '$cost', country = '$country', model = '$model', category = '$category', photo = '$photo' where id_tovar = '$id'";
        $update_result = mysqli_query($con, $update);

        if(isset($_FILES['photo'] ['tmp_name'])){
            $name = '../img/' . $_FILES['photo']['name'];
            $tmp_name = $_FILES['photo']['tmp_name'];
            move_uploaded_file($tmp_name, $name);
        }

        if ($update_result) {
            echo "<script>alert('Запись обновлена!'); location.href ='../admin/index.php'; </script>";
        } else {
            echo "<script>alert('Ошибка!'); location.href ='../admin/index.php';</script>";
        }
    }
    ?>
</body>

</html>