<?php
require_once "../connect.php";
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
        <form action="/admin/addCat.php" method="post">
            <div class="input-group"><label for="name">Категория</label><input type="text" id="name" name="name"></div>
            <input type="submit" value="Добавить" style="margin-top: 20px;">
        </form>
    </div>
</body>
<?php
if (!empty($_POST)) {
    $categ = $_POST['name'];
    $query = "insert into category(id_category,name_category) values(null, '$categ')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('Запись добавлена!'); location.href ='index.php'; </script>";
    } else {
        echo "<script>alert('Ошибка!'); location.href ='index.php';</script>";
    }
}
?>
</html1>