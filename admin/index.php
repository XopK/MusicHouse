<?php
require_once "../connect.php";
$query = "select * from tovar";
$result = mysqli_query($con, $query);
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
    <a href="/admin/addTovar.php"><button class='btn log-btn'>Добавить товар</button></a>
    <a href="/admin/addCat.php"><button class='btn log-btn'>Добавить катгорию</button></a>
    <a href="/admin/editCat.php"><button class='btn log-btn'>Редактировать катгорию</button></a>
    <a href="/admin/ordersAdmin.php"><button class='btn log-btn'>Заказы</button></a>
    <a href="../destroy.php"><button class='btn log-btn'>Выйти</button></a>
    <div class="admin-con">
        <h1>Товары</h1>
        <div class="Tovar">
            <?php
            while ($tovar = mysqli_fetch_array($result)) {
            ?>
                <div class="product">
                    <img src="/img/<?= $tovar['photo']; ?>" alt="Product 1">
                    <h2><?= $tovar['name_tovar']; ?></h2>
                    <p><? echo $tovar['country'] . " " . $tovar['date_tovar'] . " " .  $tovar['model']; ?></p>
                    <span class="price"><?= $tovar['sale']; ?> Руб</span>
                    <a href="/admin/edit.php?edit=<?=$tovar['id_tovar'];?>"><button class="btn btn-edit">Редактировать</button></a>
                    <a href="/admin/del.php?del=<?=$tovar['id_tovar'];?>"><button class="btn btn-del">Удалить</button></a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>