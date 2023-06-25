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
    <div class="reg">
        <form action="/authoDB.php" method="post">
        <h1 class="reg-text">Авторизация</h1>
            <div class="object-form"><input type="text" placeholder="Логин" name="login"></div>
            <div class="object-form"><input type="password" placeholder="Пароль" name="password"></div>
            <input type="submit" class="btn regi-btn">
        </form>
    </div>
</body>