<?php
require_once "../connect.php";
$query1 = "select * from category";
$result1 = mysqli_query($con, $query1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Админка</title>
</head>

<body>
    <a href='/admin/index.php'><Button class='btn log-btn'>Назад</Button></a>
    <div class="check">
        <form action="./editCat.php" method="get">
            <label for="cat">Выберите категорию</label>
            <select name="category" id="category">
                <?php
                while ($catego = mysqli_fetch_array($result1)) {
                ?>
                    <option value="<?= $catego['id_category']; ?>"><?= $catego['name_category']; ?></option>
                <?php
                }
                ?>
            </select>
            <button>Выбрать</button>
    </div>
    </form>
    <?php
    $id_cat = $_GET['category'];
    $selet = "select * from category where id_category = '$id_cat'";
    $res = mysqli_fetch_array(mysqli_query($con,$selet));
    ?>
    <div class="editBlock">
        <form action="/admin/editCat.php" method="post">
            <input type="hidden" value="<?=$id_cat?>" name = "id_smdskd">
            <div class="input-group"><label for="name">Категория</label><input type="text" id="name" name="name" value="<?=$res['name_category']?>"></div>
            <input type="submit" value="Добавить" style="margin-top: 20px;">
        </form>
    </div>
</body>
<?php
if (!empty($_POST)) {
    $id_sds = $_POST['id_smdskd'];
    $categ = $_POST['name'];
    $query = "UPDATE `category` SET `name_category`='$categ' where id_category = '$id_sds'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Обновлена!'); location.href ='/admin'; </script>";
    } else {
        echo "<script>alert('Ошибка!'); location.href ='/admin';</script>";
    }
}
?>
</html1>