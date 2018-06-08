<?php 
	$Rest=array('room'=>array('min'=>'', 'max'=>0));
	$Rest=array('floor'=>array('min'=>'', 'max'=>0));
	$Rest=array('area'=>array('min'=>'', 'max'=>0));
	//$Rest=array('area_life'=>array('min'=>'', 'max'=>0));
	//$Rest=array('sec'=>array('min'=>'', ' max'=>0));
	$Rooms[0]='';
	$kv='%';
	if($Rooms[0]>0){ $kv=$Rooms[0];}
	
	/**Якщо 1-2 кымнатны*/
	if(empty($sgl)) {$sgl='';}
	
$result = $db->prepare("SELECT floor, visible,type,buld,sec,level,all_room,life_room, id ,img,price,rooms
						FROM `apartments`
				WHERE   visible=1 AND onSale=1 $sgl ORDER BY buld ASC");
   $result->execute(); $i=0;
   $result->bind_result($s['floor'],$s['visible'],$s['number'],$s['buld'],$s['sec'],$s['level'],$s['all_room'],$s['life_room'],$s['id'],$s['img'],$s['price'],$s['rooms']); 
   
   while($result->fetch()){
	 

if (strripos($s['img'], '.png') === false) {$s['img'].='.png';}


   $s['img']='/img/houses/house'.$s['buld'].'_black/floor'.$s['floor'].'/'.$s['img'];
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
	if(empty($Rest[$key]['min']) OR $t<$Rest[$key]['min']){$Rest[$key]['min']=round($t, 0, PHP_ROUND_HALF_UP);	}
	if(empty($Rest[$key]['max']) OR $t>$Rest[$key]['max']){$Rest[$key]['max']=round($t, 0, PHP_ROUND_HALF_UP);	}

		}
		$REZULT[$i]=$rez;
   $i++;
   }
    	 $sort=['floor','room','area'];
		 
		 function TableFlats($REZULT, $par=''){ ?>
			 
			  <table>
                <thead>
                  <tr>
                    <th>Корпус</th>
                    <th>Поверх</th>
                    <th>№</th>
                <?if (!$par)  {echo'<th>Кімнат</th>'; } ?>
				
                    <th>Площа, м<sup>2</sup></th>
                  </tr>
                </thead>
			
               <tbody>
			 <?	foreach($REZULT as $key=>$s){ 
		
		if (!empty($par) && $s['kim']!=$par) {continue;}
					$url="section{$s['sec']}/floor{$s['floor']}/flat{$s['number']}_{$s['id']}";
					$img='src="/img/app/1.png"';
			 ?>	
					 <tr <?if (!$par)  {  echo "data-floor='".$s['floor']."' 
						 data-size='".$s['all_room']."' 
						 data-room='".$s['kim']."' class='filter' ";
					 }  ?> 
						 data-href="<?UrlAdd($url)?>"
						> 
							<td><?=$s['sec']?></td>  <td><?=$s['floor']?></td>  <td><?=$s['number']?></td>  
							
							<?if (!$par)  { echo '<td>'.$s['kim'].'</td>';}?>
							
							<td><?=$s['all_room']?><div class='box-img'><img <?img($s['img'])?> alt='<?='Квартира'.$s['number']?>'></div></td>
					</tr>								
			<?}?>
               </tbody>
			
		  </table>
			 <?
		 }
		 

	