<?php  /*All function*/ require_once('function.php');         
///*** Видаляем 1 символ
$_POST['lang'] = mb_substr( $_POST['lang'], 1); 
	///*** SVG
 AddMySvg($_POST['floor']);

