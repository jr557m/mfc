<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="header">
        <div class="container">
            
        </div>
    </header>
    <main>
        <p><?=$content1;?></p>
        
    </main>
    

    <footer class="footer">
    
        <?php if(isset($session_user) && $session_user != ""):?> 
            <div class = "container3 ">
                <div class = "left footer2">
                    <?php echo date('d.m.Y H:i:s') . '<br>';?> 
                    <br><a class = "footer2" >©Данный сайт придуман и разработан Меняйловым И.Д.</a> 
                </div>
                <div class = "right footer2">
                    imeego5@gmail.com <br>
                    <br> <a class = "white" href="https://github.com/jr557m/mfc">Код сайта на GitHub.com</a>
                </div>
             </div>  
        <?php else:?>
            <div> 
                <?php echo date('d.m.Y H:i:s') . '<br>';?> 
                ©Данный сайт придуман и разработан Меняйловым И.Д.
            </div>
        <?php endif;?>
        
    </footer>
</body>
</html>