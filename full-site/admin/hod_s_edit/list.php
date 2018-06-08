<?
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
    $kod = $_GET['kod'];
    $check = $DB->query("SELECT * FROM `hod_stroy` WHERE `sumb_cod`='$kod'");
while ($myrow = mysqli_fetch_array($check)) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Ход строительства</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php mb_internal_encoding("UTF-8"); ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="/admin/css/style.css">
    </head>
    <body>
    <?include ("../menu.php");?>
    <?php
    $dat1 = date("Y-m-d");
    $dat2 = date("H:i:s");
    ?>
    <div class="container">
        <form id="up_i_h_up" enctype="multipart/form-data">
            <div>
                <!-- <input id="tab1" type="radio" name="tabs" checked>
                <label for="tab1" title="Вкладка 1">Ua<span id="t_ua">&#10004;</span></label>

                <input id="tab2" type="radio" name="tabs">
                <label for="tab2" title="Вкладка 2">Ru<span id="t_ru">&#10004;</span></label>

                <input id="tab3" type="radio" name="tabs">
                <label for="tab3" title="Вкладка 3">En<span id="t_en">&#10004;</span></label> -->

            <div class="nav-content">
                <ul class="tabs">
                    <li class="tab"><a href="#tab_ua">UA</a></li>
                    <li class="tab"><a href="#tab_ru">RU</a></li>
                    <li class="tab"><a href="#tab_en">EN</a></li>
                </ul>
            </div>

                <section id="tab_ua">
                    <input name="langUA" type="hidden" value="ua" readonly/>
                    <div class="row">
                        <div class="input-field col s6">
                            <input  name="name_hod_ua" id="name_hod_ua"  value="<?=$myrow['hod_name_ua'];?>" type="text"/>
                            <label for="name_hod_ua">Название</label>
                        </div>
                        <div class="input-field col s6">
                            <input  name="min_text_ua" id="min_text_ua" value="<?=$myrow['hod_full_ua'];?>" type="text"/>
                            <label for="min_text_ua">Кратое описание</label>
                        </div>
                    </div>
                </section>
                <section id="tab_ru">
                    <input name="langRU" type="hidden" value="ru" readonly/>
                    <div class="row">
                        <div class="input-field col s6">
                            <input  name="name_hod_ru" id="name_hod_ru" value="<?=$myrow['hod_name_ru'];?>"  type="text"/>
                            <label for="name_hod_ru">Название</label>
                        </div>
                        <div class="input-field col s6">
                            <input  name="min_text_ru" id="min_text_ru" value="<?=$myrow['hod_full_ru'];?>"  type="text"/>
                            <label for="min_text_ru">Кратое описание </label>
                        </div>
                    </div>
                </section>
                <section id="tab_en">
                    <input name="langEN" type="hidden" value="en" readonly/>
                    <div class="row">
                        <div class="input-field col s6">
                            <input  name="name_hod_en" id="name_hod_en" value="<?=$myrow['hod_name_en'];?>"  type="text"/>
                            <label for="name_hod_en">Название</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="min_text_en" id="min_text_en"  value="<?=$myrow['hod_full_en'];?>"  type="text"/>
                            <label for="min_text_en">Кратое описание </label>
                        </div>
                    </div>
                </section>
                <div class="bot_div">
                    <div class="b_chi_1">
                        <div class="row">
                            <div class="input-field col s6">
                                <input name="date" type="text" id="create_date"  value="<?=$myrow['date'];?>" />
                                <label for="create_date">Дата создания</label>
                            </div>
                            <div class="input-field col s6">
                                <input name="time" type="text" id="create_time"  value="<?=$myrow['time'];?>" />
                                <label for="create_time">Вермя создания</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="hod_code" id="hod_code"  value="<?=$myrow['sumb_cod'];?>"  type="text"/>
                                <label for="hod_code">Символьный код</label>
                            </div>
                        </div>
                        <p>
                            <input type="radio" name="isActive" id="isActive" class="with-gap" value="0" <?if($myrow['isActive']==0){echo 'checked';}?>>
                            <label for="isActive">Active</label>
                        </p>
                        <p>
                            <input type="radio" name="isActive" id="notActive" class="with-gap" value="1" <?if($myrow['isActive']==1){echo 'checked';}?>>
                            <label for="notActive">No Active</label>
                        </p>
                    </div>
                    <div class="b_chi_2">
                        <div class="file-field input-field">
                            <div class="btn"> 
                                <span>File</span>
                                <input id="images" name="images[]" type="file" multiple>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path" type="text" placeholder="После того как вы удалили галерею, тут можно загрузить новые фото">
                            </div>
                        </div>
                        <p></p>
                        <input type="hidden" name="path" value="<?=$myrow['path'];?>">
                        <input type="hidden" name="id" value="<?=$myrow['id'];?>">
                        <input type="submit" class="btn" value="Обновить">
                        <a class="btn" onclick="window.location.href='/admin'">Назад</a>
                    </div>
                </div>


        </form>
        <div class="row">
            <div class="col offset-s5 s6">
                <form id="dell_img_hod" enctype="multipart/form-data">
                    <?
                    $pieces = explode("*/*", $myrow['ar_imgs']);
                    $cc = count($pieces);
                    ?>
                    <select size="3" multiple name="cur_img[]">
                        <?
                        for($n=1; $n<$cc; $n++){
                            ?>
                            <option selected value="<?=$pieces[$n];?>"><?=$pieces[$n];?></option>
                        <?}?>
                    </select>
                    <input name="sumb_cod" type="hidden" value="<?=$myrow['sumb_cod'];?>">
                    <input  name="path_imgs" type="hidden" value="<?=$myrow['path'];?>">
                    <input class="btn red darken-4"  type="submit"  value="Удалить галерею">
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="/admin/js/script.js" type="text/javascript" encoding="UTF-8"></script>
    </body>
    </html>
<?}
}
else{echo 'Неавторизованный пользователь!';}
?>

