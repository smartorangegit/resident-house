<?php 
	$Rest=array('room'=>array('min'=>'', 'max'=>0));
	$Rest=array('floor'=>array('min'=>'', 'max'=>0));
	$Rest=array('area'=>array('min'=>'', 'max'=>0));
	//$Rest=array('area_life'=>array('min'=>'', 'max'=>0));
	//$Rest=array('sec'=>array('min'=>'', ' max'=>0));

	$filter=$_GET['filter'];
	
	/**Якщо 1-2 кімнатни*/
	if(empty($sgl)) {$sgl='';} else {
		
		$filter='data-block="true" data-disable="true" data-from="'.$sgl_room.'" data-to="'.$sgl_room.'"';
	}

$result = $db->prepare("SELECT floor, visible,type,buld,sec,level,all_room,life_room, id ,img,price,rooms,
						(SELECT min(rooms) FROM `apartments` WHERE   visible=1 ) as minroom,
						(SELECT max(rooms) FROM `apartments` WHERE   visible=1 ) as maxroom	
						FROM `apartments`
				WHERE   visible=1 AND onSale=1 $sgl ORDER BY floor ASC , rooms ASC, all_room ASC");
   $result->execute(); $i=0;
   $result->bind_result($s['floor'],$s['visible'],$s['number'],$s['buld'],$s['sec'],$s['level'],$s['all_room'],
						$s['life_room'],$s['id'],$s['img'],$s['price'],$s['rooms'],$s['minroom'],$s['maxroom']); 
   
   while($result->fetch()){
	 

if (strripos($s['img'], '.png') === false) {$s['img'].='.png';}

  $s['img']='/img/houses/house'.$s['buld'].'_black/'.$s['img']; 

	if (!file_exists($_SERVER['DOCUMENT_ROOT'].$s['img'])) {
	$s['img']='';
	}
  
  // $s['url']='/'.$_POST['lang'].'plan'.$s['buld'].'/sections'.$s['sec'].'/floor'.$s['floor'].'/flat'.$s['number'].'_'.$s['id'].'/';
  // $flats = explode(".", $s['number']);

//	$flats=	$s['number']{0};
   $s['kim']=$s['rooms'];

   //$s['kim']=$flats[0];
   		foreach($s as $key=>$k){
			$rez[$key]=$k;
		}
		 
	
		$mas_t=array('room'=>$s['kim'],'floor'=>$s['floor'],'area'=>$s['all_room'] );
		foreach($mas_t as $key=>$t){
			
			if ($key=='room') {	$Rest[$key]['min']=$rez['minroom']; $Rest[$key]['max']=$rez['maxroom'];	continue;}
	if(empty($Rest[$key]['min']) OR $t<$Rest[$key]['min']){$Rest[$key]['min']= floor($t);	}
	if(empty($Rest[$key]['max']) OR $t>$Rest[$key]['max']){$Rest[$key]['max']=ceil($t);	}  

		}
		$REZULT[$i]=$rez;
	
   $i++;
   }
    	 $sort=['floor','room','area'];