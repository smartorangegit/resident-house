<?php session_start();
date_default_timezone_set('Europe/Kiev');
$today_f = date("d.m.Y");
include("pdf/mpdf/mpdf.php");

 GLOBAL $html;

 $mpdf = new mPDF('utf-8', 'A4-L', '8', '', 0, 0, 0, 0); /*задаем формат, отступы и.т.д.*/
 $mpdf->charset_in = 'utf-8'; /*не забываем про русский*/

 $stylesheet = file_get_contents($_SERVER['DOCUMENT_ROOT']."/css/style_pdf.css"); /*подключаем css*/
 $mpdf->WriteHTML($stylesheet, 1);
 $mpdf->list_indent_first_level = 0; 
 $html = $_SESSION['svg_min_plan'];
 $html = mb_convert_encoding($html, 'UTF-8', 'UTF-8'); 
 
 $mpdf->WriteHTML($html, 2);
	
 $mpdf->Output("resident.house.pdf", 'I');
 
 ?>
