<?php
if(empty($dt)){
    $dt = "..";
}
include ($dt."/bd.php");
session_start();
try {
    $pdo = new PDO(
        'mysql:host=forel.mysql.ukraine.com.ua;dbname=forel_adnminny',
        'forel_adnminny',
        'xe5caexy',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $where = [];
    $conditions = [];
    if($_GET['filter']=='all')
    {
        $where[] = "1";
    }
    if($_GET['filter'] == "Floor"){
        $florDump = explode('*',$_GET['id']);
        //$_SESSION['secFloor'] = $florDump[0];

    }
    else {
        $florDump = explode('*', $_GET['filter']);
    }
    if(isset($_GET['filter'])) {
        switch ($florDump[1]) {
            case 'sec':
                $_SESSION['z'] = $florDump;
                $where[] = "sec = ".$florDump[0];
                if($_SESSION['secFloor']) {
                    $where[] = "floor = " . $_SESSION['secFloor'];
                }
                $conditions[] = ['is_active' => $_GET['filter']];
                break;
            case 'build':
                $_SESSION['z'] = $florDump;
                $where[] = "build = ".$florDump[0];
                if($_SESSION['secFloor']) {
                    $where[] = "floor = " . $_SESSION['secFloor'];
                }
                $conditions[] = ['is_even' => $_GET['filter']];
                break;
            case 'Floor':
                $florDump = explode('*',$_GET['id']);
                $where[] = "floor = ".$florDump[0];
                if($_SESSION['z']){
                    $where[] = $_SESSION['z'][1]."= ".$_SESSION['z'][0];
                }
                $conditions[] = ['is_even' => $_GET['filter']];
                break;
        }
    }

    $query = "SELECT * 
            FROM `section`
            WHERE ".implode(" AND ", $where);
    $usr = $pdo->prepare($query);
    $usr->execute($conditions);
    while($row = $usr->fetch()) {
        ?>
        <div class="row">
            <div class="input-field col s2">
                <input type="text" name="sec*<?=$row['id'];?>" value="<?=$row['sec'];?>">
                <label for="sec*<?=$row['id'];?>" class="active">Номер секции:</label>
            </div>
            <div class="input-field col s2">
                <input type="text" name="floor*<?=$row['id'];?>" value="<?=$row['floor'];?>">
                <label for="floor*<?=$row['id'];?>" class="active">Этаж:</label>
            </div>
            <div class="input-field col s2">
                <input type="text" name="build*<?=$row['id'];?>" value="<?=$row['build'];?>">
                <label for="build*<?=$row['id'];?>" class="active">Дом:</label>
            </div>
            <div class="input-field col s2">
                <input type="text" name="img*<?=$row['id'];?>" value="<?=$row['img'];?>">
                <label for="img*<?=$row['id'];?>" class="active">Имя изображения:</label>
            </div>
            <div class="input-field col s2">
                <input type="text" name="compas*<?=$row['id'];?>" value="<?=$row['compas'];?>">
                <label for="compas*<?=$row['id'];?>" class="active">Компас:</label>
            </div>
            <input type="hidden" name="id*<?=$row['id'];?>" value="<?=$row['id'];?>">
            <div class="col s2">
                <input id="DelSec" type="button" value="Удалить" onclick="dellFun(<?=$row['id'];?>);" class="btn red accent-3">
            </div>
        </div>
        <?
        //print_r($query);
        echo "<br>";
        //print_r($_SESSION);
        //echo "<br>";
        //print_r($_GET);
    }
    ?><button id="UpdSec" type="submit" class="btn green accent-3">Обновить</button>

   <?
}
catch (PDOException $e) {
    echo "Невозможно установить соединение с базой данных \n";
    //print_r($query);
    echo "<br>";
    print_r($_SESSION);
    echo "<br>";
    print_r($_GET);
}