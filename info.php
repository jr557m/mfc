<?php
require("connectdb.php");
require("session.php");
$result = mysqli_query($connect, "SELECT * FROM mfc WHERE District LIKE '%".$_POST["login"]."' ");

$content1 = '';
$count = 0;
if(!$result || mysqli_num_rows($result) == 0){
    $content .= '<h2>По запросу '.$_POST["login"].' информация отсутсвует.</h2> ';
}
while($mfc = mysqli_fetch_assoc($result)){
    $count++;
    $id = $mfc['global_id'];
    $content1 .= '
    <div class="headingInfo">
    <p>МФЦ №'.$count.'</p>
    <form  action = "infomfc.php" method = "POST"> 
    
    <button class = "btninfo"> 
    <table>
    <tr>
            <td>          </td>
            <td>'.$mfc['CommonName'].'</td>
        </tr>
        <tr>
            <td class = "bolder">Округ</td>
            <td>'.$mfc['AdmArea'].'</td>
        </tr>
        <tr>
            <td class = "bolder">Район</td>
            <td>'.$mfc['District'].'</td>
        </tr>
        <tr>
            <td class  = "bolder">Адрес</td>
            <td>'.$mfc['Address'].'</td>
        </tr>
        <input hidden value="'.$mfc["global_id"].'" type="text" name="id">

    </button>
    </form>
    </table>
</div>
    ';
}

$title = "Информация";
?>
<div class = "fortext">
<?php if(isset($session_user) && $session_user != ""):?> 
    <form method="POST" class = "search-form1" action = "distance.php">
    <button class = "btn footer2" href = "distance.php">Узнать информацию о дистанционных услугах</button>
</form>        
    <?php else:?>
    
<?php endif;?>
    </div>
<div class = "fortext">
<form method="POST" class = "search-form1" action = "main.php">
<button class = "btn" href="main.php" >Вернуться к поиску</button>
</div>
</form>
<?php
require("template.php");

?>






