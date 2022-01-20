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
require("template.php");
?>