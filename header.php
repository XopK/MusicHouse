<header>
        <?php
        session_start();
        require_once "connect.php";
        $id = $_SESSION['id_user'];
        $query = "select * from users where id_user = '$id'";
        $res = mysqli_fetch_array(mysqli_query($con,$query));
        ?>
        <div class="logo">
        <a href="/" style="text-decoration: none;"><h1 style="color: white; font-family: Aegan;">Music House</h1></a>
        </div>
        <?php
        if(empty($_SESSION)){
        echo "
        <nav>
            <li><a href='/aboutUs.php'>О нас</a></li>
            <li><a href='/catalog.php'>Каталог</a></li>
            <li><a href='/WhereUsFind.php'>Где нас найти?</a></li>
        </nav>
        <div class='auth'>
        <a href='/autho.php'><Button class='btn log-btn'>Войти</Button></a>
        <a href='/registration.php'><Button class='btn reg-btn'>Регистрация</Button></a>
        </div>";
        }else if ($_SESSION['role'] == 1){
            echo "
            <nav>
            <li><a href='/aboutUs.php'>О нас</a></li>
            <li><a href='/catalog.php'>Каталог</a></li>
            <li><a href='/WhereUsFind.php'>Где нас найти?</a></li>
            <li><a href='/storage.php'>Корзина</a></li>
            </nav>
            <div class='auth'>
            <a href='/admin/index.php'><Button class='btn log-btn'>Админка</Button></a>
            <a href='/destroy.php'><Button class='btn log-btn'>Выйти</Button></a>
            </div>";
        }else if ($_SESSION['role'] == 2){
            ?>
            <nav>
            <li><a href='/aboutUs.php'>О нас</a></li>
            <li><a href='/catalog.php'>Каталог</a></li>
            <li><a href='/WhereUsFind.php'>Где нас найти?</a></li>
            <li><a href='/storage.php'>Корзина</a></li>
            </nav>
            <div class='auth'>
            <a href='/account.php'><Button class='btn log-btn'><?=$res['name']?></Button></a>
            <a href='/destroy.php'><Button class='btn log-btn'>Выйти</Button></a>
            </div>
            <?
        }
        ?>
</header>