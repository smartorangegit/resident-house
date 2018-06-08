<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
session_start();
if(empty($dt)){
    $dt = "..";
}
include ($dt."/bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
$check = $DB->query("SELECT * FROM `users`");
while ($myrow = mysqli_fetch_array($check)) {

    $sec_k = $myrow['sec_code'];
}
if(!empty($_SESSION['check']) && $_SESSION['check']==$sec_k){
$kod = $_GET['kod'];

$sel = $DB->query("SELECT * FROM `news` WHERE `news_code`='$kod'");
while ($myrow = mysqli_fetch_array($sel))
{?>
<!DOCTYPE html>
<html>
    <head>
        <title>Обновление новости</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php mb_internal_encoding("UTF-8"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<link rel="stylesheet" type="text/css" href="/admin/css/style.css">
<script type="text/javascript">
    tinymce.init({
        selector: '#textua',
        theme: 'modern',
        width: 'auto',
        height: 300,
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table contextmenu directionality emoticons template paste textcolor'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
    });
</script>
<script type="text/javascript">
    tinymce.init({
        selector: '#textru',
        theme: 'modern',
        width: 'auto',
        height: 300,
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table contextmenu directionality emoticons template paste textcolor'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
    });
</script>
<script type="text/javascript">
    tinymce.init({
        selector: '#texten',
        theme: 'modern',
        width: 'auto',
        height: 300,
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table contextmenu directionality emoticons template paste textcolor'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
    });
</script>
        <script type="text/javascript">
            tinymce.init({
                selector: '#vid',
                theme: 'modern',
                width: 'auto',
                height: 300,
                plugins: [
                    'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                    'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                    'save table contextmenu directionality emoticons template paste textcolor'
                ],
                toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
            });
        </script>
<script>tinymce.init({ selector:'textarea' });</script>
        <?include ("../menu.php");?>
</head>
<body>
    <div class="container">
        <?php
        $dat1 = date("Y-m-d");
        $dat2 = date("H:i:s");
        ?>
        <div>
            <link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
            <style type="text/css">
                #crop{
                    display:none;
                }
                #cropresult{
                    border:2px solid #ddd;
                }
                .mini{
                    margin:5px;
                }
                .bigBadaImg{
                    display: none;
                }
            </style>
            <!-- <form id="crop-image" enctype="multipart/form-data" style="margin: 5px;">
                <div class="form-group">
                    <label for="image">Загрузить и обрезать изображение для новости:</label>
                    <input type="file" name="image" id="image" required>
                </div>
                <p></p>
                <input class="butt"  type="submit" value="Загрузить">
            </form> -->

            <form id="crop-image" enctype="multipart/form-data">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Выберите файл</span>
                        <input type="file" name="image" id="image" required>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
                <button class="butt waves-effect waves-light btn" type="submit">Загрузить</button>
            </form>

            <button type="submit" class="butt btn" id="fiButt">Работа с изображением</button>
            <br>
            <?
            $dir = str_replace("/admin/edit_news","/admin/edit_news/img/", __DIR__);
            $files = scandir($dir,1);
            //print_r($files);
            ?>
            <div class="bigBadaImg"> <!--style=" width: 1280px; height: 768px;"-->
                <img src="img/<?=$files[0];?>" id="target" alt="[Jcrop Example]" />
                <button id="release">Убрать выделение</button>
                <button id="crop">Обрезать</button>
                <!--        <button id="mini">Создать миниатюрю</button>-->
                <div class="optlist offset">
                    <label><input type="checkbox" id="ar_lock" />Соблюдать пропорции (3:4)</label><?//было 3:4?>
                    <label><input type="checkbox" id="size_lock" />min/max размер (80x80/350x350)</label>
                </div>
                <div class="inline-labels">
                    <div class="row">
                        <div class="input-field col s2">
                            <input readonly type="text" size="4" id="x1" name="x1" />
                            <label for="x1">X1</label>
                        </div>
                        <div class="input-field col s2">
                            <input readonly type="text" size="4" id="y1" name="y1" />
                            <label for="y1">Y1</label>
                        </div>
                        <div class="input-field col s2">
                            <input readonly type="text" size="4" id="x2" name="x2" />
                            <label for="x2">X2</label>
                        </div>
                        <div class="input-field col s2">
                            <input readonly type="text" size="4" id="y2" name="y2" />
                            <label for="y2">Y2</label>
                        </div>
                        <div class="input-field col s2">
                            <input readonly type="text" size="4" id="w" name="w" />
                            <label for="w">W </label>
                        </div>
                        <div class="input-field col s2">
                            <input  readonly type="text" size="4" id="h" name="h" />
                            <label for="h">H </label>
                        </div>
                    </div>
                </div>
                <p>Результаты:</p>
                <span>Для загрузки будет использоватся последнее вырезанное изображение</span>
                <div id="cropresult">
                </div>
            </div>

        </div>
        <div>
            <form id="upload-image2" enctype="multipart/form-data">
                <label class="bigBadaImg" style="font-size: 23px;">Отметьте если нужно обновить фото &#8658;</label>
                <input class="bigBadaImg" type="radio" name="updateImg" value="yes">

                <div>
                    <!-- <input id="tab1" type="radio" name="tabs" checked>
                    <label for="tab1" title="Вкладка 1">Ua<span id="t_ua">&#10004;</span></label>

                    <input id="tab2" type="radio" name="tabs">
                    <label for="tab2" title="Вкладка 2">Ru<span id="t_ru">&#10004;</span></label>

                    <input id="tab3" type="radio" name="tabs">
                    <label for="tab3" title="Вкладка 3">En<span id="t_en">&#10004;</span></label> -->

                    <div class="nav-content">
                        <ul class="tabs">
                            <li class="tab"><a href="#ua_tab">UA</a></li>
                            <li class="tab"><a href="#ru_tab">RU</a></li>
                            <li class="tab"><a href="#en_tab">EN</a></li>
                        </ul>
                    </div>

                    <section id="ua_tab">
                        <input name="langUA" type="hidden" value="ua" readonly/>
                        <div class="row">
                            <div class="input-field col s6">
                                <input onkeyup="javascript:countme1();" name="title_ua" value="<?=$myrow['title_ua'];?>" type="text" id="title_ua_id"/>
                                <label for="title_ua_id">Title новости</label>
                            </div>
                            <div class="input-field col s6">
                                <input onkeyup="javascript:countme1();" name="name_news_ua" value="<?=$myrow['name_news_ua'];?>"  type="text" id="name_news_ua_id"/>
                                <label for="">Название новости</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input onkeyup="javascript:countme1();" name="descr_ua" value="<?=$myrow['description_ua'];?>" type="text" id="descr_ua_id"/>
                                <label for="descr_ua_id">Description новости</label>
                            </div>
                            <div class="input-field col s6">
                                <input onkeyup="javascript:countme1();" name="min_text_ua" value="<?=$myrow['min_text_ua'];?>" type="text" id="min_text_ua_id"/>
                                <label for="min_text_ua_id">Кратое описание новости</label>
                            </div>
                        </div>
                        <textarea  rows="3" style="width:40%;" class="form-control" id="textua" type="text" name="full_text_ua" value="" ><?=$myrow['full_text_ua'];?></textarea>
                    </section>

                    <section id="ru_tab">
                        <input name="langRU" type="hidden" value="ru" readonly/>
                        <div class="row">
                            <div class="input-field col s6">
                                <input onkeyup="javascript:countme2();" name="title_ru" value="<?=$myrow['title_ru'];?>" type="text" id="title_ru_id"/>
                                <label for="">Title новости</label>
                            </div>
                            <div class="input-field col s6">
                                <input onkeyup="javascript:countme2();" name="name_news_ru" value="<?=$myrow['name_news_ru'];?>"  type="text" id="name_news_ru_id"/>
                                <label for="name_news_ru_id">Название новости</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input onkeyup="javascript:countme2();" name="descr_ru" value="<?=$myrow['description_ru'];?>" type="text" id="descr_ru_id"/>
                                <label for="descr_ru_id">Description новости</label>
                            </div>
                            <div class="input-field col s6">
                                <input onkeyup="javascript:countme2();" name="min_text_ru" value="<?=$myrow['min_text_ru'];?>" type="text" id="min_text_ru_id"/>
                                <label for="min_text_ru_id">Кратое описание новости</label>
                            </div>
                        </div>
                        <textarea rows="3" style="width:40%;" class="form-control" id="textru" type="text" name="full_text_ru" ><?=$myrow['full_text_ru'];?></textarea>
                    </section>

                    <section id="en_tab">
                        <input name="langEN" type="hidden" value="en" readonly/>
                        <div class="row">
                            <div class="input-field col s6">
                                <input onkeyup="javascript:countme3();" name="title_en" value="<?=$myrow['title_en'];?>" type="text" id="title_en_id"/>
                                <label class="title_en_id">Title новости</label>
                            </div>
                            <div class="input-field col s6">
                                <input onkeyup="javascript:countme3();" name="name_news_en" value="<?=$myrow['name_news_en'];?>"  type="text" id="name_news_en_id"/>
                                <label for="name_news_en_id">Название новости</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input onkeyup="javascript:countme3();" name="descr_en" value="<?=$myrow['description_en'];?>" type="text" id="descr_en_id"/>
                                <label for="descr_en_id">Description новости</label>
                            </div>
                            <div class="input-field col s6">
                                <input onkeyup="javascript:countme3();" name="min_text_en" value="<?=$myrow['min_text_en'];?>" type="text" id="min_text_en_id"/>
                                <label for="min_text_en_id">Кратое описание новости</label>
                            </div>
                        </div>
                        <textarea rows="3" style="width:40%;" class="form-control" id="texten" type="text" name="full_text_en"><?=$myrow['full_text_en'];?></textarea>
                    </section>

                    <label>Видео</label>
                    <textarea id="vid" rows="3"  name="video">
                                <?=$myrow['video'];?>
                            </textarea>
                    <div class="bot_div">
                        <div class="b_chi_1">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input name="date" type="text" value="<?=$myrow['date'];?>" id="creation_date"/>    
                                    <label for="creation_date">Дата создания</label>
                                </div>
                                <div class="input-field col s6">
                                    <input name="time" type="text" value="<?=$myrow['time'];?>" id="creation_time"/>
                                    <label for="creation_time">Время создания</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="news_code" value="<?=$myrow['news_code'];?>" type="text" id="symbol_code_id"/>
                                    <label for="symbol_code_id">Символьный код</label>
                                </div>
                            </div>
                            <p>
                                <input id="radio_active" class="with-gap" type="radio" name="isActive" value="0" <?if($myrow['isActive']==0){echo 'checked';}?>>
                                <label for="radio_active">Active</label>
                            </p>
                            <p>
                                <input id="radio_not_active" class="with-gap" type="radio" name="isActive" value="1" <?if($myrow['isActive']==1){echo 'checked';}?>>
                                <label for="radio_not_active">No Active</label>
                            </p>
                            <input type="hidden" name="id" value="<?=$myrow['id'];?>">
                        </div>
                        <div class="b_chi_2">
        <!--                    <div class="form-group">-->
        <!--                        <label for="image">Изображение для новости:</label>-->
        <!--                        <input type="file" name="image" id="image">-->
        <!--                        <img  src="--><?//=$myrow['img_path'].'/'.$myrow['img_name'];?><!--"  style="width:150px; height: 150px;"/>-->
        <!--                        <input type="hidden" name="del_img" value="--><?//=$myrow['img_path'].'/'.$myrow['img_name'];?><!--"/>-->
        <!--                        <input type="hidden" name="kod_d" value="--><?//=$kod;?><!--"/>-->
        <!--                    </div>-->
                            <input class="butt btn btn-default"  type="submit">
                            <a class="butt btn" onclick="window.location.href='/admin/edit_news/'">Назад</a>
                        </div>
            </form>
            <form class="col s12" id="del_news">
                <input name="delete" type="submit" value="Удалить новсть" class="butt waves-effect waves-light red darken-4 btn"/>
                <input name="targ_dell" type="hidden" value="<?=$kod;?>"/>
                <input name="img_t_dell" type="hidden" value="<?=$myrow['img_path'].'/'.$myrow['img_name'];?>"/>
                <input name="dir_dell" type="hidden" value="<?=$myrow['img_path'].'/';?>">
                <input name="i_name" type="hidden" value="<?=$myrow['img_name'];?>">
                <input name="dt" type="hidden" value="<?=$myrow['date'].'_'.$myrow['time'];?>">
            </form>
                </div>
        </div>
        </div>
    </div> <!--End container-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="/admin/js/script.js" type="text/javascript" encoding="UTF-8"></script>
<script src="js/jquery.Jcrop.min.js"></script>
<script src="js/crop.js"></script>
<script>
    $(document).ready(function () {

        function readImage ( input ) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function printMessage(destination, msg) {

            $(destination).removeClass();

            if (msg == 'success') {
                $(destination).addClass('alert alert-success').text('Файл успешно загружен.');
            }

            if (msg == 'error') {
                $(destination).addClass('alert alert-danger').text('Произошла ошибка при загрузке файла.');
            }

        }

        $('#image').change(function(){
            readImage(this);
        });

        $('#crop-image').on('submit',(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type:'POST', // Тип запроса
                url: '/admin/edit_news/upl.php', // Скрипт обработчика
                data: formData, // Данные которые мы передаем
                cache:false, // В запросах POST отключено по умолчанию, но перестрахуемся
                contentType: false, // Тип кодирования данных мы задали в форме, это отключим
                processData: false, // Отключаем, так как передаем файл
                success:function(data){
                    //alert(data);
                    console.log(data);
                    location.reload();
                    printMessage('#result', data);
                },
                error:function(data){
                    console.log(data);
                }
            });
        }));
    });

    $(document).ready(function(){
        $("button#fiButt").click(function(){
            $(".bigBadaImg").fadeIn("slow");
        });
    });
</script>
</body>
</html>
<?}?>
<?}
else{echo 'Неавторизованный пользователь!';}
?>
