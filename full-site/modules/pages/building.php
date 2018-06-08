<?php
$lg=$LANG;
$postnumbers=6;
$offset=0;


$result = $db->prepare("SELECT date, hod_name_$lg, hod_full_$lg, path,ar_imgs, sumb_cod	FROM hod_stroy WHERE isActive=0 ORDER BY date DESC");
	$result->execute();
	$result->store_result();	$num=$result->num_rows;

				$PAG=Pagination ($postnumbers, $offset, $num);	
	
	$result = $db->prepare("SELECT date, hod_name_$lg, hod_full_$lg, path,ar_imgs, sumb_cod	FROM hod_stroy WHERE isActive=0 ORDER BY date DESC LIMIT $postnumbers OFFSET $offset");
	$result->execute();
	$result->bind_result($s['date'],$s['name'],$s['text'],$s['img-url'],$s['ar_imgs'],$s['sumb_cod']);
	
	 while ($result->fetch()) {
		 
			$date = new DateTime($s['date']);
			
		$s['date']=$date->format('d.m.Y');
		$s['imgs']=explode('*/*', $s['ar_imgs']);
		
		 foreach($s as $key=>$k){			$rez[$key]=$k;	}
		
	$ReaPost[]=$rez;  
	 }
