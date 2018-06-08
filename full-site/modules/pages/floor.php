<?php
ParametrFlats();
GLOBAL $floor_new,$plan,$flat,$plan,$sleh,$floor,$floor_prev,$floor_next;

$result = $db->prepare("SELECT img,compas   FROM `section` WHERE `sec`=$sec AND `build`=$plan AND `floor`=$floor[0] ");

$result->execute(); 	$result->store_result();	
if (!$result->num_rows) {ErrorPage404();}

$result->execute();     $result->bind_result($si['img'], $si['compas']);	$result->fetch(); 	$result->close();

if($floor[0]>1){$pov1="OR (`floor`=$floor[0]-1 AND `level`=2)OR (`floor`=$floor[0]-2 AND `level`=3) OR (`floor`=$floor[0]-1 AND `level`=3)";}else{$pov1='';}

$rez=[]; $REZULT=[]; $n=0;

$result = $db->prepare("SELECT floor, visible,type,buld,level,all_room,life_room, id, onSale, rooms   FROM `apartments`
WHERE visible=1 AND buld=$plan AND `sec`=$sec AND (`floor`=$floor[0] $pov1) ORDER BY sorts ASC");
   $result->execute();
    $result->bind_result($s['floor'],$s['visible'],$s['number'],$s['buld'],$s['level'],$s['all_room'],$s['life_room'],$s['id'],$s['sales'],$s['rooms']); 
	while($result->fetch()){   $i=0;
	
	//$flats = explode(".", $s['number']);		 
		$flats=	$s['rooms'];
				
   $s['kim']=$flats[0];
   
		foreach($s as $key=>$k){
			$rez[$key]=$k;
			
		}
				
		//$REZULT_NOT[$n]=$rez;		//$REZULT[$SORT[$n]-1]=$rez;
		$REZULT[$n]=$rez;		$n++;
		}
 $result->close();
//echo $si['img'];
//echo '<pre>'; print_r($SORT); echo '</pre>';
//echo '<pre>'; print_r($REZULT); echo '</pre>';

//ƒл¤ SVG
//echo $pov1;
	//echo '<!--<pre>'; print_r($REZULT); echo '</pre>-->';

 foreach($REZULT as $key=>$s){
	 if($s['level']>1 AND $s['floor']!=$floor[0]){$t=".".($floor[0]-$s['floor']);}else{$t='';}
	 if ($s['sales']) 	{

		 $URLP[$key]=UrlAdd('section'.$sec.'/floor'.($s['floor']+$floor[0]-$s['floor']).'/flat'.mb_strtolower($s['number'], 'UTF-8').'_'.$s['id'].$t, TRUE);

	 }
	$clas_js[$key]="clas".$sec."_".$s['floor']."_".$s['id'].'_';
	$clas_css[$key]="clas".$sec."_".$s['floor']."_".$s['id'];
	if($s['level']==2 or $s['level']==3){$clas_js[$key]="clas".$sec."_".$s['floor']."_".$s['id']."_".($floor[0]-$s['floor']+1)."_";
										$clas_css[$key]="clas".$sec."_".$s['floor']."_".$s['id']."_".($floor[0]-$s['floor']+1);	}
		$clas[$key]=" ".$clas_js[$key];

//п≥дказка 		//$URLP[$key].='--'.$s['sort']."-".($key+1);
	}
	
