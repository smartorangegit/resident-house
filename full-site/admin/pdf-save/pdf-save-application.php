<?php session_start();
$Option=array('title'=>'resident', 'modulel'=>'modules');

// Отвечаем только на Ajax
if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {return;}

// Можно передавать в скрипт разный action и в соответствии с ним выполнять разные действия.
$action = $_POST['action'];
if (empty($action)) {return;}

$count = $_POST['count'];
$step = $_POST['step'];
$DIR=$_SERVER['DOCUMENT_ROOT'];

// Получаем от клиента номер итерации
$url = $_POST['url']; if (empty($url)) return;
$offset = $_POST['offset'];
//sleep(1);
// Проверяем, все ли строки обработаны
$offset = $offset + $step;

if ($offset==$step) {	$offsetDb=0;	} else {	$offsetDb=$_POST['offset'];	}

//*** Генерування Pdf

		GLOBAL $html, $mes;

		require($DIR."pdf/mpdf/mpdf.php");
		require_once($DIR.$Option['modulel'].'/function.php'); 	
	
		$result = $db->prepare("SELECT floor, 	sec, 	type, id, buld FROM `apartments` WHERE visible=1 ORDER BY id LIMIT $step OFFSET $offsetDb");
	
		$result->execute();
		$result->store_result();	$num=$result->num_rows;


		$result->bind_result($b['floor'],$b['sec'],$b['type'],$b['id'],$b['buld']);
		
		while($result->fetch()){
		$b['flat']=$b['type'].'_'.$b['id'];
		
			foreach($b as $key=>$k){
				$rez[$key]=$k;
			}	
			$FLATS[]=$rez;	
		}
			
			$CouNt=count($FLATS);
			LangAdd(); //*** Тексти
			
				foreach ($FLATS as $keyF=>$pars) {
				$_POST=array('section'=>$pars['sec'],'floor'=>$pars['floor'], 'flat'=>$pars['flat'], 'plan'=>$pars['buld']);
			
			$mpdf = new mPDF('utf-8', 'A4-L', '8', '', 0, 0, 0, 0); //***Задаєм формат, відступи ...*/
			$mpdf->charset_in = 'utf-8'; //***Кирилиця

			$stylesheet = file_get_contents($DIR."css/style_pdf.css"); //*** Підключаєм css
			$mpdf->WriteHTML($stylesheet, 1);
			$mpdf->list_indent_first_level = 0; 
		  
			require($DIR.$Option['modulel']."/pages/flats.php");
			
			$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8'); 
			$mpdf->WriteHTML($html, 2);
			
			//$mpdf->Output($DIR."pdf/temp/".$Option['title']."_sec-".$pars['sec']."_floor-".$pars['floor']."_flat-".$pars['flat'].".pdf", 'F');
		 $mpdf->Output($DIR."/admin/pdf-save/temp/".$Option['title']."_sec-".$pars['sec']."_floor-".$pars['floor']."_flat-".$pars['flat'].".pdf", 'F');
		 		 
			}

//*** Генерування Pdf End**


if ($offset >= $count) {
  $sucsess = 1;
  
		$dir=$DIR."/admin/pdf-save/temp/";
		$filename = $DIR."/admin/pdf-save/upload/".$Option['title']."PDF.zip";
		
		// *** Видаляем старий файл
		unlink($filename);

		$zip = new ZipArchive();

		if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
			exit("Невозможно открыть <$filename>\n");
		}

			$result = array(); 

		   $cdir = scandir($dir); 
		   foreach ($cdir as $key => $value) 
		   { 
			  if (!in_array($value,array(".",".."))) 
			  { 
					// *** Додаєм нові файли pdf
					$zip->addFile($dir.$value, $value);	
					
			  } 
		   }

		$zip->close();  
			  foreach ($cdir as $key => $value)  { 	unlink($dir.$value); }
		   
	
  
} else {
	 $sucsess = round($offset / $count, 2);
}

// И возвращаем клиенту данные (номер итерации и сообщение об окончании работы скрипта)

$output = Array('offset' => $offset, 'sucsess' => $sucsess, 'title'=>'/admin/pdf-save/upload/'.$Option['title'].'PDF.zip', 'post'=>$offset.' из '.$count);
echo json_encode($output);