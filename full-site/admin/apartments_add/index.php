<?php
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
session_start();
if(empty($dt)){
    $dt = "..";
}
include ($dt."/bd.php");
$checkSecur = $DB->query("SELECT * FROM `users`");
while ($rowSecure = mysqli_fetch_array($checkSecur)) {
    $securKode = $rowSecure['sec_code'];
}
if(!empty($_SESSION['check']) && $_SESSION['check'] == $securKode) {
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/style.css">
    <title>Document</title>
</head>
<body>
    <?include ($dt."/menu.php");?>
    <div class="container">
    <form id="addApparts">
        <div id="coll1">
            <div class="row">
                <div class="input-field col s2">
                    <input id="typ" type="text" name="type">
                    <label for="typ">Тип квартиры</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="rooms" id="roomsNumber">
                    <label for="roomsNumber">Кол комнат</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="build" id="buildingNumber">
                    <label for="buildingNumber">Номер дома</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="sec" id="sectionNumber">
                    <label for="sectionNumber">Номер секции</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="floor" id="floorNumber">
                    <label for="floorNumber">Этаж квартиры</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="all_room" id="allRoom">
                    <label for="allRoom">Общая площадь</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2">
                    <input type="text" name="life_room" id="lifeRoom">
                    <label for="lifeRoom">Жилая площадь</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room1" id="room1">
                    <label for="room1">Комната №1</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room2" id="room2">
                    <label for="2">Комната №2</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room3" id="room3">
                    <label for="room3">Комната №3</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room4" id="room4">
                    <label for="room4">Комната №4</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room5" id="room5">
                    <label for="room5">Комната №5</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2">
                    <input type="text" name="room6" id="room6">
                    <label for="room6">Комната №6</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room7" id="room7">
                    <label for="room7">Комната №7</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room8" id="room8">
                    <label for="room8">Комната №8</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room9" id="room9">
                    <label for="room9">Комната №9</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room10" id="room10">
                    <label for="room10">Комната №10</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room11" id="room11">
                    <label for="room11">Комната №11</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2">
                    <input type="text" name="room12" id="room12">
                    <label for="room12">Комната №12</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room13" id="room13">
                    <label for="room13">Комната №13</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room14" id="room14">
                    <label for="room14">Комната №14</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room15" id="room15">
                    <label for="room15">Комната №15</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room16" id="room16">
                    <label for="room16">Комната №16</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room17" id="room17">
                    <label for="room17">Комната №17</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2">
                    <input type="text" name="room18" id="room18">
                    <label for="room18">Комната №18</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room19" id="room19">
                    <label for="room19">Комната №19</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room20" id="room20">
                    <label for="room20">Комната №20</label>
                </div>
                <div class="input-field col s4">
                    <input type="text" name="imgName" id="imgName"> 
                    <label for="imgName">Название изображения</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="price" id="price">  
                    <label for="price">Цена</label>  
                </div>
            </div>
            <div class="row">
                <div class="col s2">
                    <input type="radio" name="level" value="1" class="with-gap" id="multiLevel">
                    <label for="multiLevel">Многоуровневая</label>
                    <input type="radio" name="level" value="0" class="with-gap" id="oneLevel" checked >
                    <label for="oneLevel">Один уровень</label>
                </div>
                <div class="col s2">
                    <input type="radio" name="onSale" value="1" class="with-gap" id="isOnSale" checked>
                    <label for="isOnSale">В продаже</label>
                    <input type="radio" name="onSale" value="0" class="with-gap" id="isNotOnSale">
                    <label for="isNotOnSale">Не в продаже</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn">Add</button>
    </form>
    <form id="maxId" class="section">
        <button class="btn" type="submit">Получить id</button>
    </form>
    <form id="addLvlApparts">
        <div class="row">
            <div class="input-field col s2">
                <input type="text" name="id_flat" id="id_flat" readonly>
                <label for = "id_flat">Id первого уровня </label>
            </div>
        </div>
        <div id="coll1">
            <div class="row">
                <div class="input-field col s2">
                    <input type="text" name="room1" id="getRoom1">
                    <label for="getRoom1">Комната №1: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room2" id="getRoom2">
                    <label for="getRoom2">Комната №2: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room3" id="getRoom3">
                    <label for="getRoom3">Комната №3: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room4" id="getRoom4">
                    <label for="getRoom4">Комната №4: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room5" id="getRoom5">
                    <label for="getRoom5">Комната №5: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room6" id="getRoom6">
                    <label for="getRoom6">Комната №6: </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2">
                    <input type="text" name="room7" id="getRoom7">
                    <label for="getRoom7">Комната №7: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room8" id="getRoom8">
                    <label for="getRoom8">Комната №8: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room9" id="getRoom9">
                    <label for="getRoom9">Комната №9: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room10" id="getRoom10">
                    <label for="getRoom10">Комната №10: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room11" id="getRoom11">
                    <label for="getRoom11">Комната №11: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room12" id="getRoom12">
                    <label for="getRoom12">Комната №12: </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2">
                    <input type="text" name="room13" id="getRoom13">
                    <label for="getRoom13">Комната №13: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room14" id="getRoom14">
                    <label for="getRoom14">Комната №14: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room15" id="getRoom15">
                    <label for="getRoom15">Комната №15: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room16" id="getRoom16">
                    <label for="getRoom16">Комната №16: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room17" id="getRoom17">
                    <label for="getRoom17">Комната №17: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room18" id="getRoom18">
                    <label for="getRoom18">Комната №18: </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2">
                    <input type="text" name="room19" id="getRoom19">
                    <label for="getRoom19">Комната №19: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room20" id="getRoom20">
                    <label for="getRoom20">Комната №20: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room21" id="getRoom21">
                    <label for="getRoom21">Комната №21: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room22" id="getRoom22">
                    <label for="getRoom22">Комната №22: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room23" id="getRoom23">
                    <label for="getRoom23">Комната №23: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room24" id="getRoom24">
                    <label for="getRoom24">Комната №24: </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2">
                    <input type="text" name="room25" id="getRoom25">
                    <label for="getRoom25">Комната №25: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room26" id="getRoom26">
                    <label for="getRoom26">Комната №26: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room27" id="getRoom27">
                    <label for="getRoom27">Комната №27: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room28" id="getRoom28">
                    <label for="getRoom28">Комната №28: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room29" id="getRoom29">
                    <label for="getRoom29">Комната №29: </label>
                </div>
                <div class="input-field col s2">
                    <input type="text" name="room30" id="getRoom30">
                    <label for="getRoom30">Комната №30: </label>
                </div>
            </div>
        </div>
        <button class="btn" type="submit">Добавить уровень</button>
    </form>
    </div>
    <script>
        form('#addApparts');
        form2('#maxId');
        form3('#addLvlApparts');
        function form(id){
            $(id).submit(function(event) { //устанавливаем событие отправки для формы с id=form
                event.preventDefault();
                var form_data = $(this).serialize(); //собераем все данные из формы
                var conf = confirm('Добавить новую квартиру?');
                if(conf) {
                    $.ajax({
                        type: "POST", //Метод отправки
                        url: "appartAdd.php", //путь до php фаила отправителя
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
        function form2(id){
            $(id).submit(function(event) { //устанавливаем событие отправки для формы с id=form
                event.preventDefault();
                var form_data = $(this).serialize(); //собераем все данные из формы

                    $.ajax({
                        type: "POST", //Метод отправки
                        url: "checkId.php", //путь до php фаила отправителя
                        data: form_data,
                        processData: false,
                        success: function (html) {
                            //код в этом блоке выполняется при успешной отправке сообщения
                            //alert(html);
                            console.log(html);
                            document.getElementById('id_flat').setAttribute("value",html);
                            //location.reload();
                        }
                    });

            });

        }
        function form3(id){
            $(id).submit(function(event) { //устанавливаем событие отправки для формы с id=form
                event.preventDefault();
                var form_data = $(this).serialize(); //собераем все данные из формы
                var valInpId = document.getElementById('id_flat').getAttribute("value");
                var conf = confirm('Добавить уровень?');
                if(conf) {
                    if (valInpId) {
                    $.ajax({
                        type: "POST", //Метод отправки
                        url: "appartLvlAdd.php", //путь до php фаила отправителя
                        data: form_data,
                        processData: false,
                        success: function (html) {
                            //код в этом блоке выполняется при успешной отправке сообщения
                            alert(html);
                            //location.reload();
                        }
                    });
                }
                else {
                        alert("Вы не получили id для добавления!")
                    }
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
}
else{
    echo "Нет доступа! <br>";
    ?><button id='mainL' onclick="location.href='/admin/'">Перейти на главную для авторизации</button><?
}
?>
     </body>
     </html>