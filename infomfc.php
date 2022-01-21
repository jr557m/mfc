<?php
require("session.php");
require("connectdb.php");
$title = "МФЦ";
$content1 = '';
$result1 = mysqli_query($connect, "SELECT * FROM mfc WHERE global_id = '".$_POST["id"]."' ");
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
// $content1.= '
// <iframe src="https://maps.google.com/?saddr=Current+Location&daddr=43.12345,-76.12345" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
// ';         

require("template.php");
?>