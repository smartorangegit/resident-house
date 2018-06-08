<?php
if (isset($_GET['URLS'])) {$id_url = $_GET['URLS'];}

$mons = array(1 => $mes['month1'], 2 => $mes['month2'], 3 => $mes['month3'], 4 => $mes['month4'], 5 => $mes['month5'], 6 => $mes['month6'], 7 => $mes['month7'], 8 => $mes['month8'], 9 => $mes['month9'], 10 => $mes['month10'], 11 => $mes['month11'], 12 => $mes['month12']);

if($_POST['lang']==''){$lg='ua';}else{$lg=substr($_POST['lang'], 0,2);}

	$result = $db->prepare("SELECT date, news_code, name_news_$lg, description_$lg,img_name,full_text_$lg
	,time,title_$lg, img_path, img_name,id
	FROM news WHERE news_code='$id_url'");
	$result->execute();
	$result->bind_result($s['date'],$s['urls'],$s['name_news'],$s['description'],$s['filename'],$s['text'],$s['time'],$s['title'],$s['img-min'],$s['img'],$s['id']);
	
	 while ($result->fetch()) { $s['img_news'] = $s['img-min'].'/'.$s['img'];
																	
						$date = new DateTime($s['date']);
						$s['date']=$date->format('d.m.Y');
							
								$s['timeNewLong']= $d['d'].' '. $mons[$d['m']].' '.$d['Y'].' '.$s['timeNew'];
								$s['timeNew']= $d['d'].' '. $mons[$d['m']].' '.$d['Y'].' '.$mes['new-mes2'];
								
				foreach($s as $key=>$k){			$rez[$key]=$k;	}
		
	$ReaNews=$rez; 
	}
	


$dir    = $_SERVER['DOCUMENT_ROOT'].$s['img-min'].'/gallery';

$files = scandir($dir, 1);

	 $cdir = scandir($dir); 
   foreach ($cdir as $key => $value) 
   { 
      if (!in_array($value,array(".",".."))) 
      { 
        
            $ReaNewsImgs[] = $s['img-min'].'/gallery/'.$value; 
        } 
   } 
      
	if (count($LANGS)>1){
	
		$result = $db->prepare("SELECT name_news_ua,name_news_ru,name_news_en FROM news WHERE news_code='$id_url'");
		$result->execute();
		$result->bind_result($rez['ua'],$rez['ru'],$rez['en']);  $rel='';
		 while ($result->fetch()) {
			 if(!empty($rez['ua']) && in_array('ua', $LANGS)){	$t1='uk';$t2='';  
				 $rel.='<link rel="alternate" hreflang="'.$t1.'" href="'. servername().'/'.$t2.'news/'.$rez['urls'].'/" />';
				}
			 if(!empty($rez['ru']) && in_array('ru', $LANGS)){ 	$t1=$t2='ru'; $t2.='/'; 
				 $rel.='<link rel="alternate" hreflang="'.$t1.'" href="'. servername().'/'.$t2.'news/'.$rez['urls'].'/" />';	
				}
			 if(!empty($rez['en'] && in_array('en', $LANGS))){ 	$t1=$t2='en'; $t2.='/';
				$rel.='<link rel="alternate" hreflang="'.$t1.'" href="'. servername().'/'.$t2.'news/'.$rez['urls'].'/" />';	
				}
			}
		}	
			

	$result = $db->prepare("SELECT date, news_code, name_news_$lg, description_$lg,img_name,full_text_$lg
	,time,title_$lg, img_path, img_name,id
	FROM news WHERE news_code!='$id_url' ORDER BY date DESC LIMIT 3");
	$result->execute();
	$result->bind_result($s['date'],$s['urls'],$s['name_news'],$s['description'],$s['filename'],$s['text'],$s['time'],$s['title'],$s['img-min'],$s['img'],$s['id']);
	
	 while ($result->fetch()) {											
				foreach($s as $key=>$k){			$rez[$key]=$k;	}
		
	$ReaNewsL[]=$rez; 
	}
			
	$facebook='
	<meta property="og:title" content="'.$ReaNews['title'].'"/>
    <meta property="og:description" content="'.$ReaNews['description'].'"/>
    <meta property="og:image" content="'.$site_url.$ReaNews['img_news'].'"/>
	';		
	
	
	
	


	
