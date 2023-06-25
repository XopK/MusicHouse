<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Music House</title>

</head>

<body>
    <?php   
    session_start();
    $id_us = $_SESSION['id_user'];
    include("header.php");
    $query23 = "select * from orders join tovar on orders.tovar = tovar.id_tovar join status on orders.status = status.id_status where user = '$id_us' ";
    $result = mysqli_query($con, $query23);
    ?>
    <h1 style="text-align:center; font-family: Dewberry; font-weight: bold; color:white;">Заказы</h1>
    <div class="container-account">
        <div class="block_order">
            <?
            while ($tovar = mysqli_fetch_array($result)) {
            ?>
                <div class="order_item">
                    <div class="img_or">
                    <img src="/img/<?= $tovar['photo']?>" alt="<?= $tovar['photo'] ?>">
                    </div>
                    <div class="text_or">
                        <h2>Код заказа: <?=$tovar['code_order']?></h2>
                        <h4>Товар: <?=$tovar['name_tovar']?></h4>
                        <p>Цена: <?=$tovar['sale']?>₽</p>
                        <h3>Статус: <?=$tovar['name_status']?></h3>
                    </div>
                </div>
            <?
            }
            ?>
        </div>
    </div>
</body>

</html>