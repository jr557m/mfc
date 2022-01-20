<?php
require("connectdb.php");

$result = mysqli_query($connect, "SELECT * FROM mfc WHERE District LIKE '".$_POST["login"]."' ");


$content1 = '';
$count = 0;
while($mfc = mysqli_fetch_assoc($result)){
    
    $content1 .= '
    <div class="headingInfo">
    <p>МФЦ №</p>
    <table>
        <tr>
            <td>          </td>
            <td>'.$mfc['CommonName'].'</td>
        </tr>
        <tr>
            <td>Округ</td>
            <td>'.$mfc['AdmArea'].'</td>
        </tr>
        <tr>
            <td>Район</td>
            <td>'.$mfc['District'].'</td>
        </tr>
        <tr>
            <td>Адрес</td>
            <td>'.$mfc['Address'].'</td>
        </tr>




    </table>
</div>
    ';
}

$title = "Информация";
require("template.php");

?>






