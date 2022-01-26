<?php
require("session.php");
require("connectdb.php");
$title = "МФЦ";
$content1 = '';

$result1 = mysqli_query($connect, "SELECT * FROM mfc WHERE global_id = '".$_POST["id"]."' ");
while($mfc1 = mysqli_fetch_assoc($result1)){
    $in = $mfc1['geodata_center'];
    preg_match_all('/\[(.+?)\]/', $in, $out);
    $out = trim($out[0][0], "[");
    $out = trim($out, "]");
    $coords = explode(",", $out);
    $hours = explode("\n", $mfc1['WorkingHours']);
$content1 .= '
<form method="POST"  action = "choose.php">
    <input hidden value= "'.$_POST["distric"].'" type="text" name="district">
    <button class = "btn">Вернуться к списку МФЦ</button>
</form>
<h1 class = "headingmfc">'.$mfc1['ShortName'].'</h1>
<div class = "container4">
<div class = "left footer2">
<div id="yandexmap" style="width: 545px; height: 545px"></div>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
        <script>
        var map;
        var marker;
        function initMap () {
            map = new ymaps.Map("yandexmap", {
                center: ["'.$coords[1].'","'.$coords[0].'"],
                zoom: 15
            });
            marker = new ymaps.Placemark(["'.$coords[1].'","'.$coords[0].'"], {
                hintContent: "Местоположение",
                balloonContent: "'.$mfc1['ShortName'].'"
                });
              map.geoObjects.add(marker);
        }
        ymaps.ready(initMap);
        </script>
</div>
                <div class = "container4 ">
                <div class = "left1 footer2">
                <p class = "bolder" >График Работы:</p>
                <p>'.$hours[0].'</p>
                <p>'.$hours[1].'</p>
                <p>'.$hours[2].'</p>
                <p>'.$hours[3].'</p>
                <p>'.$hours[4].'</p>
                <p>'.$hours[5].'</p>
                <p>'.$hours[6].'</p>
                <p>'.$hours[7].'</p>
                <p>'.$hours[8].'</p>
                <p>'.$hours[9].'</p>
                <p>'.$hours[10].'</p>
                <p>'.$hours[11].'</p>
                <p>'.$hours[12].'</p>
                <p>'.$hours[13].'</p>
                </div>
                <div class = "right1 footer2">
                <p class = "bolder" >Возможные услуги:</p>  
                <p>'.$mfc1['ExtraServices'].'</p>
                <br>
                <br>
                <h1 class = "bolder">Дополнительные сведения</h1>
                <p class = "bolder" >'.$mfc1['ChiefPosition'].'</p>  
                <p>'.$mfc1['ChiefName'].'</p>

                <p class = "bolder" >Дата открытия:</p>  
                <p>'.$mfc1['OpenDate'].'</p>
                
                <p class = "bolder">Площадь</p>  
                <p>'.$mfc1['CenterArea'].'</p>
                <br>
                
                <p>'.$mfc1['ClarificationOfWorkingHours'].'</p>
                </div>
                </div>
                
                <div class = "right1 footer2">
                <p class = "bolder" >Полное официальное наименование:</p>  
                <p>'.$mfc1['FullName'].'</p>

                <p class = "bolder" >Сокращенное официальное наименование:</p>  
                <p>'.$mfc1['ShortName'].'</p>
                
                <p class = "bolder">Административный округ: </p>  
                <p>'.$mfc1['AdmArea'].'</p>
                
                <p class = "bolder">Район: </p> 
                <p>'.$mfc1['District'].'</p> 
                
                <p class = "bolder">Адрес учреждения: </p> 
                <p>'.$mfc1['Address'].'</p>
                
                <p class = "bolder">Сайт: </p>
                <a href = "https://www.mos.ru">'.$mfc1['WebSite'].'</a>
                
                    <p class = "bolder">Контактный телефон: </p>
                    <p>'.$mfc1['PublicPhone'].'</p>
                
                <p class = "bolder">Кол-во окон:</p>
                <p>'.$mfc1['WindowCount'].'</p> 
            </div> 
            </div>
            
            
            
';  
}  
?>

  
<?php  

require("template.php");
?>