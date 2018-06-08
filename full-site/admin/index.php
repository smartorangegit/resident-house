<?
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0');
session_start();
//include ("redir.php");
//var_dump(is_dir('/home/forel/webiart.com.ua/new-york/en/news/pp/'));
?>
<!DOCTYPE html>
<html>
<head>
<title>Админ Панель</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="/admin/dart.ico" />
</head>
<body>
<?php
include ("bd.php");
//print_r(__DIR__);
$check = $DB->query("SELECT * FROM `users`");
while ($myrow = mysqli_fetch_array($check)) {
    $sec_k = $myrow['sec_code'];
}
if(!empty($_SESSION['check']) && $_SESSION['check']==$sec_k){?>
  <div class="main_d">
   <?include ("menu.php");?>
    <form id="logout">
     <input class="btn" type="submit" value="Выйти"/>
        <input name="Yday" type="hidden" value="lg_Xasd"/>
    </form>
  </div>
<?}else{?>z
    <div class="container custom_container">
        <div class="row">
            <div class="col s8 offset-s2">
                <form id="login">
                    <div class="input-field">
                        <input name="log" type="text" id="loginName"/>
                        <label for="loginName" class="active">Login</label>
                    </div>
                    <div class="input-field">
                        <input name="pass" type="password" id="loginPassword"/>
                        <label for="loginPassword"  class="active">Password</label>
                    </div>
                    <div class="center-align">
                        <button class="waves-effect waves-light btn pink lighten-2" type="submit">Войти</button>
                    </div>
                </form>            
            </div>
        </div>
    </div>
<?}?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<script src="/admin/js/script.js" type="text/javascript"></script>
</body>
</html>
