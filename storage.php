<?php
require_once "connect.php";
?>
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
   include("header.php");
   ?>
   <div class="cart">
  <h1 class="cart-title">Корзина</h1>
  <?php
  $total = 0;
  if(isset($_GET['dell'])){
    unset($_SESSION['storage'] [$_GET['dell']]);
  }
  if(isset($_SESSION['storage'])){
  foreach($_SESSION['storage'] as $key => $elem){
    $query = "select * from tovar where id_tovar = '$elem'";
    $tovar = mysqli_fetch_array(mysqli_query($con, $query));
    $total = $total + $tovar['sale'];
    ?>
  <div class="cart-items">
    <div class="cart-item">
      <div class="item-image">
        <img src="/img/<?=$tovar['photo'];?>" alt="<?=$tovar['name_tovar'];?>">
      </div>
      <div class="item-info">
        <h3 class="item-title"><?=$tovar['name_tovar'];?></h3>
        <p class="item-price">Цена: <?=$tovar['sale'];?> руб.</p>
        <a href="?dell=<?=$key?>"><button class="btn btn-del">Удалить</button></a>
      </div>
    </div>
  </div>
  <?php
  }
  $rand = rand(1, 1000000);
}
  ?>
  <div class="cart-total">
    <p>Итого: <?=$total?> руб.</p>
    <a href="/order.php?code=<?=$rand?>"><button class="btn btn-buy">Оформить заказ</button></a>
  </div>
</div>
</body>
</html>