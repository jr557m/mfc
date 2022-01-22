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
    $coords = explode (",", $out);
$content1 .= '
<table>
    <tr>
            <td>          </td>
            <td>'.$mfc1['CommonName'].'</td>
        </tr>
        <tr>
            <td>Округ</td>
            <td>'.$mfc1['AdmArea'].'</td>
        </tr>
        <tr>
            <td>Район</td>
            <td>'.$mfc1['District'].'</td>
        </tr>
        <tr>
            <td>Адрес</td>
            <td>'.$mfc1['Address'].'</td>
        </tr>
        </table>
        <div id="yandexmap" style="width: 500px; height: 500px"></div>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
        <script>
        var map;
        var marker;
        function initMap () {
            map = new ymaps.Map("yandexmap", {
                center: ["'.$coords[1].'","'.$coords[0].'"],
                zoom: 16
            });
            marker = new ymaps.Placemark(["'.$coords[1].'","'.$coords[0].'"], {
                hintContent: "Местоположение",
                balloonContent: "'.$mfc1['CommonName'].'"
                });
              map.geoObjects.add(marker);
        }
        ymaps.ready(initMap);
        </script>
';  
}   
require("template.php");
?>