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
if(!empty($_SESSION['check']) && $_SESSION['check']== $securKode) {
    ?>
    <!DOCTYPE html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <?include ($dt."/menu.php");?>
    <div class="container">
        <form id="addSec">
            <div class="row">
                <div class="input-field col s4">
                    <input id="addSec" type="text" name="sec">
                    <label for="addSec">Номер секции:</label>
                </div>
                <div class="input-field col s4">
                    <input id="addFloor" type="text" name="floor">
                    <label for="addFloor">Этаж:</label>
                </div>
                <div class="input-field col s4">
                    <input id="addBuild" type="text" name="build">
                    <label for="addBuild">Дом:</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" name="img">
                    <label>Имя изображения:</label>
                </div>
                <div class="input-field col s6">
                    <input id="addCompass" type="text" name="compas">
                    <label for="addCompass">Компас:</label>
                </div>
            </div>
            <div class="center-align">
                <button class="btn" type="submit">Добавить секцию</button>
            </div>
        </form>
    </div> <!--Container-->
    <script>
        form('#addSec');
        function form(id){
            $(id).submit(function(event) { //устанавливаем событие отправки для формы с id=form
                event.preventDefault();
                var form_data = $(this).serialize(); //собераем все данные из формы
                var conf = confirm('Добавить секцию?');
                if(conf) {
                    $.ajax({
                        type: "POST", //Метод отправки
                        url: "addSec.php", //путь до php фаила отправителя
                        data: form_data,
                        processData: false,
                        success: function (html) {
                            //код в этом блоке выполняется при успешной отправке сообщения
                            alert(html);
                            console.log(html);
                            location.replace('/admin/section_list/');
                        }
                    });
                }
            });

        }
    </script>
    </body>
    </html>
    <?
}else{
    echo "Нет доступа! <br>";
    ?><button id='mainL' onclick="location.href='/admin/'">Перейти на главную для авторизации</button><?
}
?>