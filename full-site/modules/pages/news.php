<?php
/** Підбір новин*/
$postnumbers=4;

$offset=0;


		/*
$news_onpage=6;
$max_line_news=4;
$news_onpage_start=0;
$news_onpage_end=$news_onpage_start+$news_onpage-1;
if($set_page){$news_onpage_start=($set_page-1)*$news_onpage; 	$news_onpage_end=$set_page*$news_onpage-1;}else{$set_page=1;}
*/
$lg=$LANG;


	$result = $db->prepare("SELECT date, news_code,name_news_$lg,description_$lg,img_name,full_text_$lg, min_text_$lg, img_path, img_name, time FROM news WHERE isActive=0 AND name_news_$lg!='' ORDER BY date DESC");
	$result->execute();
	$result->store_result();	$num=$result->num_rows;

	//if ($postnumbers>$num) {$offset=$num;} 
	
	$result = $db->prepare("SELECT date, news_code,name_news_$lg,description_$lg,img_name,full_text_$lg, min_text_$lg, img_path, img_name, time FROM news WHERE isActive=0 AND name_news_$lg!='' ORDER BY date DESC");
	$result->execute();
	$result->store_result();	
	$result->bind_result($s['date'],$s['urls'],$s['name_news'],$s['description'],$s['filename'],$s['text'],$s['mini_text'],$s['img-min'],$s['img'],$s['time']);
	$i=0; $it=0; 
	
	
	 while ($result->fetch()) { $s['img_news'] = $s['img-min'].'/'.$s['img'];
								$s['img-min'].='/min_'.$s['img'];
								//if(!file_exists($s['img-min'])){$s['img-min']=$s['img_news'];}
								//$s['mini_text']	=cropStrWord($text=$s['text']);
								$s['urls']='news/'.$s['urls'];
								
								$date = new DateTime($s['date']);
								$s['date']=$date->format('d.m.y');
								
								$time = new DateTime($s['time']);
								$s['time']=$time->format('h:i');
			


				foreach($s as $key=>$k){			$rez[$key]=$k;	}
								//if($i>=$news_onpage_start AND $i<=$news_onpage_end){	 $ReaNews[$it]=$rez; $it++;	}
								$ReaNews[$it]=$rez; $it++;
	   $i++; }
