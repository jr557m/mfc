<?php
require("connectdb.php");
require("session.php");
$result = mysqli_query($connect, "SELECT * FROM distance ORDER BY ID ASC");

$content1 = '';
while($dist = mysqli_fetch_assoc($result)){
    $content1 .= '
    <table class = "tableds">     
        <tr>
            <td class = "bolder forfooter">'.$dist['ID'].'</td>
            <td>'.$dist['NameOfStateService'].'</td>
        </tr>
        <tr>
            <td class = "bolder">Сcылка на сайт</td>
            <td><a href = '.$dist['WebSite'].'>'.$dist['WebSite'].'</a></td>
            
        </tr>
    </table>
    ';
}
?>
<form  action = "info.php" method = "POST" class = "seacrh-form"> 
    <button class="btn">Вернуться к списку мфц</button>
    
    </form>
    <?php
require("template.php");

?>