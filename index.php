<?php
require_once "connect.php";
$query = "select * from tovar order by id_tovar desc limit 3";
$result = mysqli_query($con, $query);
$tovar = mysqli_fetch_array($result)
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
    <section>
        <div class="container">
            <h1 class="logo2">Music House</h1>
            <div class="content">
                <div class="text">
                    <p>Компания "Music House" является одним из ведущих магазинов музыкальных инструментов в своей области. Компания была основана в 2005 году, и за это время она зарекомендовала себя как надежный и качественный поставщик музыкальных инструментов для профессионалов и любителей.</p>
                    <p>"Music House" предлагает широкий ассортимент музыкальных инструментов, включая гитары, барабаны, клавишные, духовые, струнные инструменты и многое другое. Все товары, представленные в магазине, проходят тщательный отбор и проверку качества, что гарантирует покупателям высокое качество продукции.</p>
                </div>
            </div>
            <img src="/img/maxresdefault.jpg" alt="artist" class="img-text">
            <img src="/img/photoeditorsdk-export (5).png" alt="artist" class="img-text drum">
        </div>

    </section>
</body>

</html>