<?php session_start();
if($_POST['lang']==''){$lg=$len_default;}else{$lg=substr($_POST['lang'], 0,2);}


$result = $db->prepare("SELECT date, hod_name_$lg, hod_full_$lg, path,ar_imgs, sumb_cod, id
	FROM hod_stroy WHERE isActive=0 ORDER BY date DESC");
	$result->execute();
	$result->bind_result($s['date'],$s['name'],$s['text'],$s['img-url'],$s['ar_imgs'],$s['sumb_cod'],$s['id']);
	
	 while ($result->fetch()) {
		 
			$date = new DateTime($s['date']);
			$time = new DateTime($s['time']);
			
		$s['date']=$date->format('d.m.Y');
		$s['time']=$time->format('h:i');
		$s['imgs']=explode('*/*', $s['ar_imgs']);
		
		 foreach($s as $key=>$k){			$rez[$key]=$k;	}
		
	$ReaPost[]=$rez;  
	 }
	 
	 	$result = $db->query("SELECT * FROM pers");
	 while ($row = $result->fetch_assoc()) {
		 
		$PERC=$row;
		
	 }
	 for ($i=1; $i<=4; $i++){
		 
	 $PERC['perOpis_'.$i]=explode('/',   $PERC['perOpis_'.$i]);
		 
	 }
	 $i=1;
	 