<?php
session_start();
require_once "connect.php";
$query = "select * from tovar";

$filter = empty($_POST["category"]) ? false : $_POST["category"];

if ($filter && $filter != 0) {
  $query = $query . " WHERE category = " . $filter;
}

$result = mysqli_query($con, $query);


$query1 = "select * from category";
$result1 = mysqli_query($con, $query1);
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
  <h1 style="font-family: Dewberry; text-align: center; color: white;">Каталог</h1>
  <div class="filters">
    <h2>Фильтр</h2>
    <form action="/catalog.php" method="post">
      <select name="category" id="category">
        <option value="0" selected disabled>Все товары</option>
        <?php
        while ($catego = mysqli_fetch_array($result1)) {
        ?>
          <option value="<?= $catego['id_category']; ?>"><?= $catego['name_category']; ?></option>
        <?php
        }
        ?>
      </select>
      <label for="year"></label>
      <input type="submit" value="Применить">
    </form>
  </div>
  <div class="products">

    <?php
    while ($tovar = mysqli_fetch_array($result)) {
      $tovar['date_tovar'] = date('Y');
    ?>
      <div class="product">
        <img src="img/<?= $tovar['photo']; ?>" alt="Product 1">
        <h2><?= $tovar['name_tovar']; ?></h2>
        <p><? echo $tovar['country'] . " " . $tovar['date_tovar'] . " " .  $tovar['model']; ?></p>
        <span class="price"><?= $tovar['sale']; ?> Руб</span>
        <?php
        if (isset($_SESSION['role'])) {
        ?>
          <a href="?cartItem=<?= $tovar['id_tovar'] ?>"><button class="buy-button" name="addCart">Купить</button></a>
        <?php
        } else {
          echo "<a href='/registration.php'><button class='buy-button'>Купить</button></a>";
        }
        ?>
      </div>
    <?php
    }
    if (!empty($_GET)) {
      $_SESSION['storage'] = (!empty($_SESSION['storage'])) ? $_SESSION['storage'] : array();
      array_push($_SESSION['storage'], $_GET['cartItem']);
    }
    ?>
  </div>


</body>

</html>