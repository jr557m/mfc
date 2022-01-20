<?php
require("connectdb.php");

$result = mysqli_query($connect, "SELECT * FROM mfc WHERE District LIKE '%".$_POST["login"]."' ");


$content1 = '';
$count = 0;
while($mfc = mysqli_fetch_assoc($result)){
    $count++;
    $content1 .= '
    <div class="headingInfo">
    <p>МФЦ №'.$count.'</p>
    <form method = "POST" action = "infomfc.php?id='.$mfc['global_id'].'"> 
    
    <button class = "btninfo"> 
    <table>
    <tr>
            <td>          </td>
            <td>'.$mfc['CommonName'].'</td>
        </tr>
        <tr>
            <td class "bolder">Округ</td>
            <td>'.$mfc['AdmArea'].'</td>
        </tr>
        <tr>
            <td class "bolder">Район</td>
            <td>'.$mfc['District'].'</td>
        </tr>
        <tr>
            <td class "bolder">Адрес</td>
            <td>'.$mfc['Address'].'</td>
        </tr>


    </button>
    </form>
    </table>
</div>
    ';
}

$title = "Информация";
require("template.php");

?>






