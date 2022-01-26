<?php
require("connectdb.php");
require("session.php");
$result = mysqli_query($connect, "SELECT * FROM mfc WHERE District LIKE '%".$_POST["district"]."%' ");
if (empty($_POST["district"])){
    echo '<script type="text/javascript">alert("Ничего не было введено!")</script>';
    $content1 .='
    <div class = "fortext">
        <form method="POST" class = "search-form1" action = "main.php">
            <button class = "btn" href="main.php" >Вернуться к поиску</button>
    </div>
        </form>

';
}
elseif(!$result || mysqli_num_rows($result) == 0){
    $content1 .= '<div class = "fortext">
    <form method="POST" class = "search-form1" action = "main.php">
        <button class = "btn" href="main.php" >Вернуться к поиску</button>
</div>
    </form>
    <h2>По запросу '.$_POST["district"].' информация отсутсвует.</h2> 
    
        ';
}
else {
    if(isset($session_user) && $session_user != ""){
        $content1 .='
<div class = "fortext">
    
        <form method="POST" class = "search-form1" action = "distance.php">
            <input hidden value="'.$_POST["district"].'" type="text" name="distric">
            <button class = "btn footer2" href = "distance.php">Узнать информацию о дистанционных услугах</button>
        </form>        
</div>
<div class = "fortext">
    <form method="POST" class = "search-form1" action = "main.php">
        <button class = "btn" href="main.php" >Вернуться к поиску</button>
</div>
    </form>';
    }
    else {  
        $content1 .='
<div class = "fortext">
    <form method="POST" class = "search-form1" action = "main.php">
        <button class = "btn" href="main.php" >Вернуться к поиску</button>
</div>
    </form>';
    }
$count = 0;
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
            <td class = "bolder headingInfotable">'.$mfc['CommonName'].'</td>
        </tr>
        <tr>
            <td class = "bolder">Округ</td>
            <td class = "headingInfotable">'.$mfc['AdmArea'].'</td>
        </tr>
        <tr>
            <td class = "bolder">Район</td>
            <td class = "headingInfotable">'.$mfc['District'].'</td>
        </tr>
        <tr>
            <td class  = "bolder">Адрес</td>
            <td class = "headingInfotable">'.$mfc['Address'].'</td>
        </tr>
        <input hidden value="'.$mfc["global_id"].'" type="text" name="id">
        <input hidden value="'.$_POST["district"].'" type="text" name="distric">
    </button>
    </form>
    </table>
</div>
    ';
}
}
$title = "Информация";
?>
<?php
require("template.php");

?>






