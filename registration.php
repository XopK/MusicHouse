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
        <form action="/registrationDB.php" method="post">
        <h1 class="reg-text">Регистрация</h1>
            <div class="object-form"><input type="text" placeholder="Имя" name="name" required></div>
            <div class="object-form"><input type="text" placeholder="Фамилия" name="surname" required></div>
            <div class="object-form"><input type="text" placeholder="Отчество" name="patronymic" required></div>
            <div class="object-form"><input type="text" placeholder="Логин" name="login" required></div>
            <div class="object-form"><input type="email" placeholder="Почта" name="email" required></div>
            <div class="object-form"><input type="password" placeholder="Пароль" name="password" required></div>
            <input type="checkbox" name="check" id="check"><a href="" style="text-decoration: none;"><label for="rules" style="font-family: Dewberry; color: white;">Я согласен с условиями регистрации сайта</label></a>
            <br>
            <input type="submit" class="btn regi-btn">
        </form>
    </div>
</body>
</html>