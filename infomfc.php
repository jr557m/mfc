<?php
require("connectdb.php");
$title = "МФЦ";
$content1 = '';
$result1 = mysqli_query($connect, "SELECT * FROM mfc WHERE global_id = '".$_POST["id"]."' ");
if (mysqli_fetch_assoc($result1) != 0){
echo(0);
var_dump($result1);
}
while($mfc1 = mysqli_fetch_assoc($result1)){
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
<p>'.$mfc1['PublicPhone'].'</p>
';    
}           
            
print_r($content1);

require("template.php");
?>