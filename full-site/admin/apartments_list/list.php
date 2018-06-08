<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
session_start();
if(empty($dt)){
    $dt = "..";
}
include ($dt."/bd.php");
?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/style.css">
<?
$checkSecur = $DB->query("SELECT * FROM `users`");
while ($rowSecure = mysqli_fetch_array($checkSecur)) {
    $securKode = $rowSecure['sec_code'];
}
if(!empty($_SESSION['check']) && $_SESSION['check']== $securKode){
    include ($dt."/menu.php");
    $id = $_GET['id'];
    $listSelect = $DB->query("SELECT * FROM `apartments`  WHERE `id`='$id'");
    while ($rowList = mysqli_fetch_array($listSelect)) {
        //print_r($rowList);
        ?>
        <div class="container">
        <form id="updateApparts">
        <div class="row">
            <div class="input-field col s2">
                <input id="typ" type="text" name="type" value="<?=$rowList['type'];?>">
                <label for="type" class="active">Тип квартиры: </label>
            </div>
            <div class="input-field col s1">
                <input id="rooms" type="text" name="rooms" value="<?=$rowList['rooms'];?>">
                <label for="rooms" class="active">Кол комнат: </label>
            </div>
            <div class="input-field col s1">
                <input id="buildNumber" type="text" name="build" value="<?=$rowList['buld'];?>">
                <label for="buildNumber" class="active">Номер дома: </label>
            </div>
            <div class="input-field col s2">
                <input id="sectionNumber" type="text" name="sec" value="<?=$rowList['sec'];?>">
                <label for="sectionNumber" class="active">Номер секции:</label>
            </div>
            <div class="input-field col s2">
                <label for="appartmentFloor" class="active">Этаж квартиры:</label>
                <input id="appartmentFloor" type="text" name="floor" value="<?=$rowList['floor'];?>">
            </div>
            <div class="input-field col s2">
                <input id="totalArea" type="text" name="all_room" value="<?=$rowList['all_room'];?>">
                <label for="totalArea" class="active">Общая площадь:</label>
            </div>
            <div class="input-field col s2">
                <input id="livingArea" type="text" name="life_room" value="<?=$rowList['life_room'];?>">
                <label for="livingArea" class="active">Жилая площадь:</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s2">
                <input id="room1" type="text" name="room1" value="<?=$rowList['room1'];?>">
                <label for="room1" class="active">Комната №1: </label>
            </div>
            <div class="input-field col s2">
                <input id="room2" type="text" name="room2" value="<?=$rowList['room2'];?>">
                <label for="room2" class="active">Комната №2: </label>
            </div>
            <div class="input-field col s2">
                <input id="room3" type="text" name="room3" value="<?=$rowList['room3'];?>">
                <label for="room3" class="active">Комната №3: </label>
            </div>
            <div class="input-field col s2">
                <input id="room4" type="text" name="room4" value="<?=$rowList['room4'];?>">
                <label for="room4" class="active">Комната №4: </label>
            </div>
            <div class="input-field col s2">
                <input id="room5" type="text" name="room5" value="<?=$rowList['room5'];?>">
                <label for="room5" class="active">Комната №5: </label>
            </div>
            <div class="input-field col s2">
                <input id="room6" type="text" name="room6" value="<?=$rowList['room6'];?>">
                <label for="room6" class="active">Комната №6: </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s2">
                <input id="room7" type="text" name="room7" value="<?=$rowList['room7'];?>">
                <label for="room7" class="active">Комната №7: </label>
            </div>
            <div class="input-field col s2">
                <input id="room8" type="text" name="room8" value="<?=$rowList['room8'];?>">
                <label for="room8" class="active">Комната №8: </label>
            </div>
            <div class="input-field col s2">
                <input id="room9" type="text" name="room9" value="<?=$rowList['room9'];?>">
                <label for="room9" class="active">Комната №9: </label>
            </div>
            <div class="input-field col s2">
                <input id="room10" type="text" name="room10" value="<?=$rowList['room10'];?>">
                <label for="room10" class="active">Комната №10: </label>
            </div>
            <div class="input-field col s2">
                <input id="room11" type="text" name="room11" value="<?=$rowList['room11'];?>">
                <label for="room11" class="active">Комната №11: </label>
            </div>
            <div class="input-field col s2">
                <input id="room12" type="text" name="room12" value="<?=$rowList['room12'];?>">
                <label for="room12" class="active">Комната №12: </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s2">
                <input id="room13" type="text" name="room13" value="<?=$rowList['room13'];?>">
                <label for="room13" class="active">Комната №13: </label>
            </div>
            <div class="input-field col s2">
                <input id="room14" type="text" name="room14" value="<?=$rowList['room14'];?>">
                <label for="room14" class="active">Комната №14: </label>
            </div>
            <div class="input-field col s2">
                <input id="room15" type="text" name="room15" value="<?=$rowList['room15'];?>">
                <label for="room15" class="active">Комната №15: </label>
            </div>
            <div class="input-field col s2">
                <input id="room16" type="text" name="room16" value="<?=$rowList['room16'];?>">
                <label for="room16" class="active">Комната №16: </label>
            </div>
            <div class="input-field col s2">
                <input id="room17" type="text" name="room17" value="<?=$rowList['room17'];?>">
                <label for="room17" class="active">Комната №17: </label>
            </div>
            <div class="input-field col s2">
                <input id="room18" type="text" name="room18" value="<?=$rowList['room18'];?>">
                <label for="room18" class="active">Комната №18: </label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s2">
                <input id="room19" type="text" name="room19" value="<?=$rowList['room19'];?>">
                <label for="room19" class="active">Комната №19: </label>
            </div>
            <div class="input-field col s2">
                <input id="room20" type="text" name="room20" value="<?=$rowList['room20'];?>">
                <label for="room20" class="active">Комната №20: </label>
            </div>
            <div class="input-field col s2">
                <input id="imgName" type="text" name="imgName" value="<?=$rowList['img'];?>">
                <label for="imgName" class="active">Название изображения: </label>
            </div>
            <div class="input-field col s2">
                <input id="price" type="text" name="price" value="<?=$rowList['price'];?>">
                <label for="price">Цена:</label>
            </div>
            <div class="col s2">
                <input id="multiLevel" type="radio" name="level" <?if($rowList['level']==1){echo 'checked';}?> value="1">
                <label for="multiLevel">Многоуровневая</label>
                <input id="singleLevel" type="radio" name="level" <?if($rowList['level']==0){echo 'checked';}?> value="0">
                <label for="singleLevel">Один уровень</label>
            </div>
            <div class="col s2">
                <input id="onSale" type="radio" name="onSale" <?if($rowList['onSale']==1){echo 'checked';}?> value="1">
                <label for="onSale">В продаже</label>
                <input id="sold" type="radio" name="onSale" <?if($rowList['onSale']==0){echo 'checked';}?> value="0">
                <label for="sold">Не в продаже</label>
            </div>
        </div>

        <input type="hidden" name="id" value="<?=$rowList['id'];?>">
            <button class="btn" type="submit">Update</button>

    </div>
</form>
            <?}
            $listSelectLVL = $DB->query("SELECT * FROM `apartments_level`  WHERE `id_flat`='$id'");
            while ($rowListLVL = mysqli_fetch_array($listSelectLVL)) {?>
        <form id="updLvlApparts">
            <?//возможно нужна будет проверка, есть ли запись к такому id первого уровня?>
            <label>Id первого уровня</label>
            <input type="text" name="id_flat" id="id_flat" value="<?=$id;?>" readonly>
                <label>Комната №1: </label>
                <input type="text" name="room1" value="<?=$rowListLVL['room1'];?>">
                <label>Комната №2: </label>
                <input type="text" name="room2" value="<?=$rowListLVL['room2'];?>">
                <label>Комната №3: </label>
                <input type="text" name="room3" value="<?=$rowListLVL['room3'];?>">
                <label>Комната №4: </label>
                <input type="text" name="room4" value="<?=$rowListLVL['room4'];?>">
                <label>Комната №5: </label>
                <input type="text" name="room5" value="<?=$rowListLVL['room5'];?>">
                <label>Комната №6: </label>
                <input type="text" name="room6" value="<?=$rowListLVL['room6'];?>">
                <label>Комната №7: </label>
                <input type="text" name="room7" value="<?=$rowListLVL['room7'];?>">
                <label>Комната №8: </label>
                <input type="text" name="room8" value="<?=$rowListLVL['room8'];?>">
                <label>Комната №9: </label>
                <input type="text" name="room9" value="<?=$rowListLVL['room9'];?>">
                <label>Комната №10: </label>
                <input type="text" name="room10" value="<?=$rowListLVL['room10'];?>">
                <label>Комната №11: </label>
                <input type="text" name="room11" value="<?=$rowListLVL['room11'];?>">
                <label>Комната №12: </label>
                <input type="text" name="room12" value="<?=$rowListLVL['room12'];?>">
                <label>Комната №13: </label>
                <input type="text" name="room13" value="<?=$rowListLVL['room13'];?>">
                <label>Комната №14: </label>
                <input type="text" name="room14" value="<?=$rowListLVL['room14'];?>">
                <label>Комната №15: </label>
                <input type="text" name="room15" value="<?=$rowListLVL['room15'];?>">
                <label>Комната №16: </label>
                <input type="text" name="room16" value="<?=$rowListLVL['room16'];?>">
                <label>Комната №17: </label>
                <input type="text" name="room17" value="<?=$rowListLVL['room17'];?>">
                <label>Комната №18: </label>
                <input type="text" name="room18" value="<?=$rowListLVL['room18'];?>">
                <label>Комната №19: </label>
                <input type="text" name="room19" value="<?=$rowListLVL['room19'];?>">
                <label>Комната №20: </label>
                <input type="text" name="room20" value="<?=$rowListLVL['room20'];?>">
                <label>Комната №21: </label>
                <input type="text" name="room21" value="<?=$rowListLVL['room21'];?>">
                <label>Комната №22: </label>
                <input type="text" name="room22" value="<?=$rowListLVL['room22'];?>">
                <label>Комната №23: </label>
                <input type="text" name="room23" value="<?=$rowListLVL['room23'];?>">
                <label>Комната №24: </label>
                <input type="text" name="room24" value="<?=$rowListLVL['room24'];?>">
                <label>Комната №25: </label>
                <input type="text" name="room25" value="<?=$rowListLVL['room25'];?>">
                <label>Комната №26: </label>
                <input type="text" name="room26" value="<?=$rowListLVL['room26'];?>">
                <label>Комната №27: </label>
                <input type="text" name="room27" value="<?=$rowListLVL['room27'];?>">
                <label>Комната №28: </label>
                <input type="text" name="room28" value="<?=$rowListLVL['room28'];?>">
                <label>Комната №29: </label>
                <input type="text" name="room29" value="<?=$rowListLVL['room29'];?>">
                <label>Комната №30: </label>
                <input type="text" name="room30" value="<?=$rowListLVL['room30'];?>">
            <button type="submit">Обновить уровень</button>
        </form>
             <?}?>
            <div class="container">
                <form id="dellAppart">
                    <input type="hidden" value="<?=$id;?>" name="dellId">
                    <button class="btn red accent-3" type="submit">Dell</button>
                </form>
            </div>
        </div>
        <script>
            form('#updateApparts');
            form2('#dellAppart');
            form3('#updLvlApparts');
            function form(id){
                $(id).submit(function(event) { //устанавливаем событие отправки для формы с id=form
                    event.preventDefault();
                    var form_data = $(this).serialize(); //собераем все данные из формы
                    var conf = confirm('Обновить данные?');
                    if(conf) {
                        $.ajax({
                            type: "POST", //Метод отправки
                            url: "appartListUpdate.php", //путь до php фаила отправителя
                            data: form_data,
                            processData: false,
                            success: function (html) {
                                //код в этом блоке выполняется при успешной отправке сообщения
                                alert(html);
                                //console.log(html);
                            }
                        });
                    }
                });
            }
            function form2(id){
                $(id).submit(function(event) { //устанавливаем событие отправки для формы с id=form
                    event.preventDefault();
                    var form_data = $(this).serialize(); //собераем все данные из формы
                    var conf = confirm('Удалить квартиру?');
                    if(conf) {
                        $.ajax({
                            type: "POST", //Метод отправки
                            url: "appartsDell.php", //путь до php фаила отправителя
                            data: form_data,
                            processData: false,
                            success: function (html) {
                                //код в этом блоке выполняется при успешной отправке сообщения
                                alert(html);
                                location.replace('/admin/apartments_list/');
                            }
                        });
                    }
                });

            }
            function form3(id){
                $(id).submit(function(event) { //устанавливаем событие отправки для формы с id=form
                    event.preventDefault();
                    var form_data = $(this).serialize(); //собераем все данные из формы
                    var conf = confirm('Обновить уровень?');
                    if(conf) {
                            $.ajax({
                                type: "POST", //Метод отправки
                                url: "appartLvlUpd.php", //путь до php фаила отправителя
                                data: form_data,
                                processData: false,
                                success: function (html) {
                                    //код в этом блоке выполняется при успешной отправке сообщения
                                    alert(html);
                                    //location.reload();
                                }
                            });
                    }
                });

            }
            function translit(){
// Символ, на который будут заменяться все спецсимволы
                var space = '_';
// Берем значение из нужного поля и переводим в нижний регистр
                var text = $('#typ').val().toLowerCase();
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
                $('#typ').val(result);

            }
            function TrimStr(s) {
                s = s.replace(/^-/, '');
                return s.replace(/-$/, '');
            }
            // Выполняем транслитерацию при вводе текста в поле
            $(function(){
                $('#typ').keyup(function(){
                    translit();
                    return false;
                });
            });
        </script>
        <?

echo "Вы перешли в квартиру с id ".$id;
}else{
    echo "Нет доступа! <br>";
    ?><button id='mainL' onclick="location.href='/admin/'">Перейти на главную для авторизации</button><?
}
?>