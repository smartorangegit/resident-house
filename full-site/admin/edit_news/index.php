<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
session_start();
if(empty($dt)){
    $dt = "..";
}
include ($dt."/bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
$check0 = $DB->query("SELECT * FROM `users`");
while ($myrow0 = mysqli_fetch_array($check0)) {

    $sec_k = $myrow0['sec_code'];
}
if(!empty($_SESSION['check']) && $_SESSION['check']==$sec_k){
?>
<!DOCTYPE html>
<html>
<head>
    <title>Список новостей</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/style.css">
</head>
<body>
<?require ($_SERVER['DOCUMENT_ROOT'].'admin/menu.php');?>
<div class="container">
    <div class="row">
    <?php mb_internal_encoding("UTF-8"); ?>
    <?
        $sel = $DB->query("SELECT * FROM `news`");
            while ($myrow = mysqli_fetch_array($sel)) {
        $kol_lan = 0;
    ?>
    <div class="col s3">
        <div class="card">
            <div class="card-image">
                <?if(!empty($myrow['img_name'])){?>
                    <img src="<?=$myrow['img_path'].'/'.$myrow['img_name'];?>"/>
                <?}?>
            </div>
            <div class="card_content">
                <?
                if(!empty($myrow['name_news_ua'])){
                    echo $myrow['name_news_ua'];
                } else {
                    if(!empty($myrow['name_news_ru'])){echo $myrow['name_news_ru'];}
                    if(!empty($myrow['name_news_en'])){echo $myrow['name_news_en'];}
                }
                ?>
                <div>
                <?
                    if(!empty($myrow['name_news_ua'])){$kol_lan = $kol_lan+1;}
                    if(!empty($myrow['name_news_ru'])){$kol_lan = $kol_lan+3;}
                    if(!empty($myrow['name_news_en'])){$kol_lan = $kol_lan+5;}
                
                    if($kol_lan == 1){echo "<div class='chip'>UA</div>";}
                    elseif($kol_lan == 3){echo "<div class='chip'>RU</div>";}
                    elseif($kol_lan == 5){echo "<div class='chip'>EN</div>";}
                    elseif($kol_lan == 4){echo "<div class='chip'>UA</div><div class='chip'>RU</div>";}
                    elseif($kol_lan == 6){echo "<div class='chip'>UA</div><div class='chip'>EN</div";}
                    elseif($kol_lan == 8){echo "<div class='chip'>RU</div><div class='chip'>EN</div>";}
                    elseif($kol_lan == 9){echo "<div class='chip'>UA</div><div class='chip'>RU</div><div class='chip'>EN</div";}
                ?>
                </div>
            </div>
            <div class="card-action">
                <a href="/admin/edit_news/list.php?kod=<?=$myrow['news_code'];?>">Редактировать</a>
            </div>
        </div>
        <?
        $b = 0;
    echo '</div>';
    }
?>
</div>
<div class="list_right"></div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="/admin/js/script.js" type="text/javascript" encoding="UTF-8"></script>
</body>
</html>
<?}
else{echo 'Неавторизованный пользователь!';}
?>