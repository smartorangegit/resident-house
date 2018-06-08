<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
session_start();
if(empty($dt)){
    $dt = "..";
}
include ($dt."/bd.php");
$check0 = $DB->query("SELECT * FROM `users`");
while ($myrow0 = mysqli_fetch_array($check0)) {

    $sec_k = $myrow0['sec_code'];
}
if(!empty($_SESSION['check']) && $_SESSION['check']==$sec_k){
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Список | Ход строительства</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="/admin/css/style.css">
    </head>
    <body>
    <?require ($_SERVER['DOCUMENT_ROOT'].'admin/menu.php');?>
    <?$perstSelect = $DB->query("SELECT * FROM `pers`");
    while ($rowPers= mysqli_fetch_array($perstSelect)) {
        //print_r($rowPers);
        ?>
        <div class="container">
            
        <h3 class="white-text">Проценты для хода строительства</h3>
        <form id="persents">
            <div class="persLin">
                <div class="row">
                    <div class="input-field col s4" >
                        <input type="text" id="generalConstruction" name="pers1" value="<?=$rowPers['persent_1'];?>">
                        <label for="generalConstruction">Общестроительные</label>
                    </div>
                    <div class="input-field col s8" >
                        <textarea name="opP1" class="materialize-textarea" id="generalConstructionSpecified" rows="5"><?=$rowPers['perOpis_1'];?></textarea>
                        <label for="generalConstructionSpecified">Работы до отм./Каркас/Кирпичная кладка/Внутренняя отделка</label>
                    </div>
                </div>
            </div>
            <div class="persLin">
                <div class="row">
                    <div class="input-field col s4">
                        <input type="text" id="facade" name="pers2" value="<?=$rowPers['persent_2'];?>">
                        <label for="facade">Фасад</label>
                    </div>
                    <div class="input-field col s8">
                        <textarea name="opP2"  class="materialize-textarea" id="generalFacade" rows="5"><?=$rowPers['perOpis_2'];?></textarea>
                        <label for="generalFacade">Окна/Фасад</label>
                    </div>
                </div>
            </div>
            <div class="persLin">
                <div class="row">
                    <div class="input-field col s4">
                        <input type="text" id="networks" name="pers3" value="<?=$rowPers['persent_3'];?>">
                        <label for="networks">Сети</label>
                    </div>
                    <div class="input-field col s8">
                        <textarea name="opP3" class="materialize-textarea" id="generalNetworks" rows="5"><?=$rowPers['perOpis_3'];?></textarea>
                        <label for="generalNetworks">Внутриние/Внешние</label>
                    </div>
                </div>
            </div>
            <div class="persLin">
                <div class="row">
                    <div class="input-field col s4">
                        <input type="text" id="beautification" name="pers4" value="<?=$rowPers['persent_4'];?>">
                        <label for="beautification">Благоустрой</label>
                    </div>
                    <div class="input-field col s8">
                        <textarea name="opP4" class="materialize-textarea" id="generalBeautification" rows="5"><?=$rowPers['perOpis_4'];?></textarea>
                        <label for="generalBeautification"></label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn">Обновить проценты</button>
        </form>
        <?
    }
    ?>
    <script>
        form('#persents');
        function form(id){
            $(id).submit(function(event) { //устанавливаем событие отправки для формы с id=form
                event.preventDefault();
                var form_data = $(this).serialize(); //собераем все данные из формы
                var conf = confirm('Обновить данные?');
                if(conf) {
                    $.ajax({
                        type: "POST", //Метод отправки
                        url: "persUpdate.php", //путь до php фаила отправителя
                        data: form_data,
                        processData: false,
                        success: function (html) {
                            //код в этом блоке выполняется при успешной отправке сообщения
                            alert(html);
                            console.log(html);
                            //location.reload();
                        }
                    });
                }
            });

        }
        </script>
    <h3 class="white-text">Список галерей</h3>
    <ul class="collapsible popout" data-collapsible="accordion">
            <?php mb_internal_encoding("UTF-8"); ?>
            <?
            $sel = $DB->query("SELECT * FROM `hod_stroy` ORDER BY `date` DESC ");
            while ($myrow = mysqli_fetch_array($sel))
            {
            $pieces = explode("*/*", $myrow['ar_imgs']);
            $pieces[1];
            $kol_lan = 0;
            ?>
                    <li>
                        <div class="collapsible-header">
                            <span><?=$myrow['date'];?></span>&nbsp;
                            <a class="a_text" href="/admin/hod_s_edit/list.php?kod=<?=$myrow['sumb_cod'];?>">
                                <?
                                if(!empty($myrow['hod_name_ua'])){
                                    echo $myrow['hod_name_ua'];
                                } else {
                                    if(!empty($myrow['hod_name_ru'])){echo $myrow['hod_name_ru'];}
                                    if(!empty($myrow['hod_name_en'])){echo $myrow['hod_name_en'];}
                                }
                                if(!empty($myrow['hod_name_ua'])){$kol_lan = $kol_lan+1;}
                                if(!empty($myrow['hod_name_ru'])){$kol_lan = $kol_lan+3;}
                                if(!empty($myrow['hod_name_en'])){$kol_lan = $kol_lan+5;}
                                ?>
                            </a>&nbsp;
                            <?
                            
                            if($kol_lan == 1){echo "<div class='chip'>UA</div>";}
                            elseif($kol_lan == 3){echo "<div class='chip'>RU</li></div>";}
                            elseif($kol_lan == 5){echo "<div class='chip'>EN</div>";}
                            elseif($kol_lan == 4){echo "<div class='chip'>UA</div><div class='chip'>RU</div>";}
                            elseif($kol_lan == 6){echo "<div class='chip'>UA</div><div class='chip'>EN</div>";}
                            elseif($kol_lan == 8){echo "<div class='chip'>RU</div><div class='chip'>EN</div>";}
                            elseif($kol_lan == 9){echo "<div class='chip'>UA</div><div class='chip'>RU</div><div class='chip'>EN/div>";}

                            ?>
                        </div>
                        <div class="collapsible-body">
                            <a href="/admin/hod_s_edit/list.php?kod=<?=$myrow['sumb_cod'];?>"><?if(!empty($myrow['ar_imgs'])){?>
                                <img src="<?=$myrow['path'].'/'.$pieces[1];?>" style="width:150px; height: 150px;"/>
                            <?}?>
                            </a>
                            <?$cc = count($pieces);
                            for($n=0; $n<$cc; $n++){
                                if($n!=0){?><img src="<?=$myrow['path'].'/'.$pieces[$n];?>" style="width:150px; height: 150px;">|<?}
                            }?>
                        </div>
                    </li>
                <? } ?>
        </ul>
        </div> <!--End container-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="/admin/js/script.js" type="text/javascript" encoding="UTF-8"></script>
    </body>
    </html>
<?}
else{echo 'Неавторизованный пользователь!';}
?>