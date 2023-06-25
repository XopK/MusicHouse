<?php
require_once "../connect.php";
$querycat = "select * from category";
$resultcat = mysqli_query($con, $querycat);
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
    <div class="admin-con add">
        <form action="/admin/addDB.php" method="post" enctype="multipart/form-data">
            <div class="input-group"><label for="name">Название товара</label><input type="text" id="name" name="name"></div>
            <div class="input-group"><label for="cost">Цена</label><input type="text" id="sale" name="sale"></div>
            <div class="input-group"><label for="Country">Страна произодитель</label><input type="text" id="country" name="country"></div>
            <div class="input-group"><label for="model">Модель</label><input type="text" id="model" name="model"></div>
            <div class="input-group"><label for="model">Дата производства</label><input type="date" id="date" name="date"></div>
            <div class="input-group"><select name="category" id="category">
                    <?php
                    while ($category = mysqli_fetch_array($resultcat)) {
                    ?>
                        <option value="<?= $category['id_category']; ?>"><?= $category['name_category'] ?></option>
                    <?php
                    }
                    ?>
                </select></div>
            <div class="input-group"><label for="photo"></label><input type="file" id="photo" name="photo"></div>
            <input type="submit" value="Добавить" style="margin-top: 20px;">
        </form>
    </div>
</body>

</html>