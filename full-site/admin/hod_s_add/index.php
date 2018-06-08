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
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Ход строительства</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php mb_internal_encoding("UTF-8"); ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="/admin/css/style.css">
    </head>
    <body>
    <?require ($_SERVER['DOCUMENT_ROOT'].'admin/menu.php');?>
    <?php
    $dat1 = date("Y-m-d");
    $dat2 = date("H:i:s");
    ?>
    <div class="container">
        <form id="up_i_h" enctype="multipart/form-data">
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
                            <input name="name_hod_ua"  id="name" type="text"/>
                            <label for="name">Название</label>
                        </div>
                        <div class="input-field col s6">
                            <input  name="min_text_ua" type="text" id="min_text_ua"/>
                            <label for="min_text_ua">Кратое описание</label>
                        </div>
                    </div>
                </section>
                <section id="tab_ru">
                    <input name="langRU" type="hidden" value="ru" readonly/>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="name_hod_ru" id="name_hod_ru" type="text"/>
                            <label for="name_hod_ru">Название</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="min_text_ru" id="min_text_ru" type="text"/>
                            <label for="min_text_ru">Кратое описание</label>
                        </div>
                    </div>
                </section>
                <section id="tab_en">
                    <input name="langEN" type="hidden" value="en" readonly/>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="name_hod_en" id="name_hod_en" type="text"/>
                            <label for="name_hod_en">Название</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="min_text_en" type="text" id="min_text_en"/>
                            <label for="min_text_en">Кратое описание </label>
                        </div>
                    </div>
                </section>


                <div class="bot_div">
                    <div class="b_chi_1">
                        <div class="row">
                            <div class="input-field col s6">
                                <input name="date" id="create_date" type="text" value="<?=$dat1;?>" />
                                <label for="create_date">Дата создания</label>
                            </div>
                            <div class="input-field col s6">
                                <input name="time" id="create_time" type="text" value="<?=$dat2;?>" />
                                <label for="create_time">Вермя создания</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="sKod" name="hod_code" type="text"/>
                                <label for="sKod">Символьный код</label>
                            </div>
                        </div>
                    </div>
                    <div class="b_chi_2">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>FILES</span>
                                <input id="image" name="image[]" type="file" multiple>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <input class="butt btn"  type="submit">
                        <a class="btn" onclick="window.location.href='/admin'">Назад</a>

                    </div>
                </div>

            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/admin/js/script.js" type="text/javascript" encoding="UTF-8"></script>
    <script> function translit(){
// Символ, на который будут заменяться все спецсимволы
            var space = '_';
// Берем значение из нужного поля и переводим в нижний регистр
            var text = $('#name').val().toLowerCase();
// Массив для транслитерации
            var transl = {
                'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh',
                'з': 'z', 'и': 'i', 'й': 'j', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
                'о': 'o', 'п': 'p', 'р': 'r','с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h',
                'ц': 'c', 'ч': 'ch', 'ш': 'sh', 'щ': 'sh','ъ': space, 'ы': 'y', 'ь': space, 'э': 'e', 'ю': 'yu', 'я': 'ya',
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

