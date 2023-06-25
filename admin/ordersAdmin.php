<?php
require_once "../connect.php";
$query23 = "select * from orders join tovar on orders.tovar = tovar.id_tovar join status on orders.status = status.id_status join users on orders.user = users.id_user";
$res22 = mysqli_query($con, $query23);
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

    <table class="table-d">
        <h1 style="text-align: center;font-family: Dewberry;color: white; font-weight: bold; ">Заказы</h1>
        <thead>
            <tr>
                <th>Номер заказа</th>
                <th>Товар</th>
                <th>Пользователь</th>
                <th>Статус</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?
            while ($order = mysqli_fetch_array($res22)) {
            ?>
                <tr>
                    <td><?= $order['code_order'] ?></td>
                    <td><?= $order['name_tovar'] ?></td>
                    <td><?= $order['name'] ?> <?= $order['surname'] ?></td>
                    <td><?= $order['name_status'] ?></td>
                    <td>
                        <?
                        if ($order['status'] == 3) {
                        ?>
                            <a href='/admin/orderDDB.php?yes=<?= $order['id_order'] ?>'><Button class='or-btn yes-btn'>Принять</Button></a>
                            <a href='/admin/orderDDB.php?no=<?= $order['id_order'] ?>'><Button class='or-btn no-btn'>Отклонить</Button></a>
                        <?
                        }else{
                            ?>
                            <?
                        }
                        ?>

                    </td>
                </tr>
            <?
            }
            ?>
        </tbody>
    </table>
</body>

</html>