<?php session_start(); /*All function*/ require_once('function.php');  
//Вспливайка для галереї
//require_once('gallery-lib.php');   
if ($_POST){

	$n=each($_POST);
	$id=$n['key'];
	$lg=$_SESSION['lang'];
	if(empty($lg)) {$lg='ua';}
	
	
	$result = $db->prepare("SELECT date, hod_name_$lg, hod_full_$lg, path,ar_imgs, sumb_cod, id
	FROM hod_stroy WHERE id=$id ORDER BY date DESC");
	$result->execute();
	$result->bind_result($s['date'],$s['name'],$s['text'],$s['img-url'],$s['ar_imgs'],$s['sumb_cod'],$s['id']);
	 
	 while ($result->fetch()) {
		 
			$date = new DateTime($s['date']);
			$time = new DateTime($s['time']);
			
		$s['date']=$date->format('Y-m-d');
		$s['time']=$time->format('h:i:s');
		$s['imgs']=explode('*/*', $s['ar_imgs']);
		
		 foreach($s as $key=>$k){			$rez[$key]=$k;	}
		
	$ReaPost=array('img'=>$rez['img-url'],'text'=>$rez['ar_imgs'],'date'=>$rez['date'],'time'=>$rez['time'],
			'imgs'=>$rez['imgs']		
					)	;		
	 }
	
	$img[$id]=$ReaPost;

foreach ($img[$id]['imgs'] as $key=>$t){
		
	$arr[]=array('src'=>$img[$id]['img'].'/'.$t);
		
}

echo stripslashes(json_encode($arr));

}

