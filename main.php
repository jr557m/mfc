<?php
$title = "Поиск МФЦ";
$content1 ='

            <div class="heading">
                <p>Узнать ближайшее доступное МФЦ и полную 
                информацию о нем, в том числе доступность для инвалидов</p>
            </div>
            <div class="search-form">
                <form action="info.php" method="POST" class="search-form">
                    <input type="text" name="login" class="search-field" placeholder="Введите ваш район...">
                    <button class="search-btn" >Показать</button>
                </form>
                
                
    
            
            
        </div>
';

?>
<?php
    require("session.php");
    $title = "Главная";

    ?>
        
    <div class = "ar">
            <?php if(isset($session_user) && $session_user != ""):?> 
                    <label>Вы авторизованы как <?=$_SESSION['user']['name']?> </label>
                    <label></label>
                    <a href="logout.php">Выйти</a>
                    <?php else:?>
                <form method="POST" class = "search-form" action = "auth.php">
                    <label class = "fortext">Логин</label>
                    <input type="text" name="login" />
                    <label class = "fortext">Пароль</label>
                    <input type="password" name="password" />
                    <button class = "btn" type="submit">Войти</button>
                    </form>
                    <form method="POST" class = "search-form" action = "signup.php">
                    <button class = "btn" href="signup.php" >Регистрация</button>
                    </form>
                <?php endif;?>
    </div>

    <?php if(isset($session_user) && $session_user != ""):?> 
            <h1 class = "fortext">Вы авторизированы, вам доступна вся информация и все возможности сайта</h1>
            <!-- <form action="gyms.php" method = "POST">
                <input type="text" id="district" name = "district" placeholder = "Введите ваш район" class = "form-control w-50 p-3 container-fluid text-center mt-3"><br>
                <input type="submit" value = "Отправить" class = "btn btn-success">
            </form> -->
    <?php else:?> 
        <h1 class = "fortext">Если вам необходимы все функции сайта - авторизируйтесь</h1>
        <!-- <p class = " text-danger container-fluid text-center">Чтобы воспользоваться поиском, авторизуйтесь!</p>
        <input type="text" name = "district" placeholder = "Введите ваш район" class = "form-control w-50 p-3 container-fluid text-center mt-3"><br> -->
    <?php endif;?>

<?php

    require("template.php");
    ?>