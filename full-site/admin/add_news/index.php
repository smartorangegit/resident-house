<?
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
session_start();
if(empty($dt)){
    $dt = "..";
}
// print_r($_SESSION);
if(!empty($_SESSION['upl'])){
$sesUpl = $_SESSION['upl'];
}else{
    $sesUpl = "[0,0]";
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
        <title>Добавление новости</title>
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
    </head>
    <body>
    <?require ($_SERVER['DOCUMENT_ROOT'].'admin/menu.php');?>
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
        </style>

        <form id="crop-image" enctype="multipart/form-data" class="section">
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

        <?
        $dir = str_replace("/admin/add_news","/admin/add_news/img/", __DIR__);
        $files = scandir($dir,1);
        //print_r($files);
        ?>
        <div class="row">
            <div class="col s6"> <!--style=" width: 1280px; height: 768px;"-->
                <img src="img/<?=$files[0];?>" id="target" alt="[Jcrop Example]" />
            </div>
            <div class="col s6">
                <div id="cropresult">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <button class="btn" id="release">Убрать выделение</button>
                <button class="btn" id="crop">Обрезать</button>
            </div>
        </div>
<!--        <button id="mini">Создать миниатюрю</button>-->
        <div class="optlist">
            <div class="row">
                <div class="col s4">
                    <input type="checkbox" id="ar_lock" />
                    <label for="ar_lock">Соблюдать пропорции (3:4)</label><?//было 3:4?>
                </div>
                <div class="col s4">
                    <input type="checkbox" id="size_lock" />
                    <label for="size_lock">min/max размер (80x80/350x350)</label>
                </div>
                <div class="col s4">
                    <input type="checkbox" id="size_full" value=""/>
                    <label for="size_full">Целиком</label>
                </div>
            </div>
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
    </div>
        <form id="upload-image" enctype="multipart/form-data">
        <div>
            <!-- <input id="tab1" type="radio" name="tabs" checked>
            <label for="tab1" title="Вкладка 1">Ua<span id="t_ua">&#10004;</span></label>

            <input id="tab2" type="radio" name="tabs">
            <label for="tab2" title="Вкладка 2">Ru<span id="t_ru">&#10004;</span></label>

            <input id="tab3" type="radio" name="tabs">
            <label for="tab3" title="Вкладка 3">En<span id="t_en">&#10004;</span></label> -->

            <div class="nav-content">
                <ul class="tabs red darken-2">
                    <li class="tab"><a href="#ua_tab"><span class="text-color">UA</span></a></li>
                    <li class="tab"><a href="#ru_tab"><span class="text-color">RU</span></a></li>
                    <li class="tab"><a href="#en_tab"><span class="text-color">EN</span></a></li>
                </ul>
            </div>
            <section id="ua_tab">
            <input name="langUA" type="hidden" value="ua" readonly/>
                <div class="row">
                    <div class="input-field col s6">
                        <input onkeyup="javascript:countme1();" name="title_ua" type="text" id="title_ua_id"/>
                        <label for="title_ua_id">Title новости</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="name"  name="name_news_ua"  type="text" id="name_news_ua_id"/>
                        <label for="name_news_ua_id">Название новости</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input onkeyup="javascript:countme1();" name="descr_ua" type="text" id="descr_ua_id"/>
                        <label for="descr_ua_id">Description новости</label>
                    </div>
                    <div class="input-field col s6">
                        <input onkeyup="javascript:countme1();" name="min_text_ua" type="text" id="min_text_ua_id"/>
                        <label for="min_text_ua_id">Кратое описание новости</label>
                    </div>
                </div>

                <textarea  rows="3" style="width:40%;" class="form-control" id="textua" type="text" name="full_text_ua"></textarea>
            
            </section>
            <section id="ru_tab">
                <input name="langRU" type="hidden" value="ru" readonly/>
                <div class="row">
                    <div class="input-field col s6">
                        <input onkeyup="javascript:countme2();" name="title_ru" type="text" id="title_ru_id"/>
                        <label for="title_ru_id">Title новости</label>
                    </div>
                    <div class="input-field col s6">
                        <input onkeyup="javascript:countme2();" name="name_news_ru" type="text" id="name_news_ru_id"/>
                        <label id="name_news_ru_id">Название новости</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input onkeyup="javascript:countme2();" name="descr_ru" type="text" id="descr_ru_id"/>
                        <label for="descr_ru_id">Description новости</label>
                    </div>
                    <div class="input-field col s6">
                        <input onkeyup="javascript:countme2();" name="min_text_ru" type="text" id="min_text_ru_id"/>
                        <label for="min_text_ru_id">Кратое описание новости</label>
                    </div>
                </div>
                <textarea rows="3" style="width:40%;" class="form-control" id="textru" type="text" name="full_text_ru"></textarea>
            </section>
            <section id="en_tab">
                <input name="langEN" type="hidden" value="en" readonly/>
                <div class="row">
                    <div class="input-field col s6">
                        <input onkeyup="javascript:countme3();" name="title_en" type="text" id="title_en_id"/>
                        <label for="title_en_id">Title новости</label>
                    </div>
                    <div class="input-field col s6">
                        <input onkeyup="javascript:countme3();" name="name_news_en"  type="text" id="name_news_en_id"/>
                        <label for="name_news_en_id">Название новости</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input onkeyup="javascript:countme3();" name="descr_en" type="text" id="descr_en_id"/>
                        <label for="descr_en_id">Description новости</label>
                    </div>
                    <div class="input-field col s6">
                        <input onkeyup="javascript:countme3();" name="min_text_en" type="text" id="min_text_en_id"/>
                        <label for="min_text_en_id">Кратое описание новости</label>
                    </div>
                </div>
                <textarea rows="3" style="width:40%;" class="form-control" id="texten" type="text" name="full_text_en"></textarea>
            </section>
<!--            <section id="content-tab4">-->
<!--                <p>-->
<!--                    Здесь размещаете любое содержание....-->
<!--                </p>-->
<!--            </section>-->
            <label>Видео</label>
            <textarea id="vid" rows="3"  name="video">
                        <?=$myrow['video'];?>
            </textarea>
            <div class="bot_div">
                <div class="b_chi_1">
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="date" type="text" value="<?=$dat1;?>" id="creation_date"/>
                            <label for="creation_date">Дата создания</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="time" type="text" value="<?=$dat2;?>" id="creation_time"/>
                            <label for="creation_time">Вермя создания</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">                    
                            <div class="input-field s12">
                                <input name="news_code" type="text" id="sKod"/>
                                <label for="sKod">Символьный код</label>
                            </div>
                        </div>
                    </div>
            
            </div>
            <div class="row">
                <div class="col s12 section">
                
                    <div class="b_chi_2">
                    <input type="submit" class="btn pink accent-3" value="Разместить">
                    <a class="btn" onclick="window.location.href='/admin'">Назад</a>
                    </div>

                </div>
            </div>
            </div>

        </div>
        </form>
</div>
    </div><!--  End container -->
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="/admin/js/script.js" type="text/javascript" encoding="UTF-8"></script>
    <!--        <script src="js/jquery.min.js"></script>-->
    <script src="js/jquery.Jcrop.min.js"></script>
    <script src="js/crop.js"></script>
    <script>
        $(document).ready(function () {
            var z = "<?=$sesUpl;?>";
            Q = JSON.parse(z);
            console.log(Q);
            $("#size_full").val(Q[0]+','+Q[1]);

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
                    url: '/admin/add_news/upl.php', // Скрипт обработчика
                    data: formData, // Данные которые мы передаем
                    cache:false, // В запросах POST отключено по умолчанию, но перестрахуемся
                    contentType: false, // Тип кодирования данных мы задали в форме, это отключим
                    processData: false, // Отключаем, так как передаем файл
                    success:function(data){
                        //alert(data);
                        var z = "<?=$sesUpl;?>";
                        Q = JSON.parse(z);
                        console.log(Q);
                        $("#size_full").val(Q[0]+','+Q[1]);
                        location.replace('/admin/add_news/');
                        printMessage('#result', data);
                    },
                    error:function(data){
                        console.log(data);
                    }
                });
            }));
        });
        function translit(){
// Символ, на который будут заменяться все спецсимволы
            var space = '-';
// Берем значение из нужного поля и переводим в нижний регистр
            var text = $('#name').val().toLowerCase();
// Массив для транслитерации
            var transl = {
                'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh',
                'з': 'z', 'и': 'i', 'й': 'j', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
                'о': 'o', 'п': 'p', 'р': 'r','с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h',
                'ц': 'c', 'ч': 'ch', 'ш': 'sh', 'щ': 'sh','ъ': space, 'ы': 'y', 'ь': space, 'э': 'e', 'ю': 'yu', 'я': 'ya',
                'є': 'e','ї': 'yi','і': 'i',
                ' ': space, '_': space, '`': space, '~': space, '!': space, '@': space,
                '#': space, '$': space, '%': space, '^': space, '&': space, '*': space,
                '(': space, ')': space,'-': space, '\=': space, '+': space, '[': space,
                ']': space, '\\': space, '|': space, '/': space,'.': space, ',': space,
                '{': space, '}': space, '\'': space, '"': space, ';': space, ':': space,
                '?': space, '<': space, '>': space, '№':space
            }

            var result = '';
            var curent_sim = '';
            for(i=0; i < text.length; i++) {
                // Если символ найден в массиве то меняем его
                if(transl[text[i]] != undefined) {
                    if(curent_sim != transl[text[i]] || curent_sim != space){
                        result += transl[text[i]];
                        curent_sim = transl[text[i]];
                    }
                }
                // Если нет, то оставляем так как есть
                else {
                    result += text[i];
                    curent_sim = text[i];
                }
            }

            result = TrimStr(result);

// Выводим результат
            $('#sKod').val(result);

        }
        function TrimStr(s) {
            s = s.replace(/^-/, '');
            return s.replace(/-$/, '');
        }
        // Выполняем транслитерацию при вводе текста в поле
        $(function(){
            $('#name').keyup(function(){
                translit();
                return false;
            });
        });
    </script>
    </body>
</html>
<?}
else{echo 'Неавторизованный пользователь!';}
?>

