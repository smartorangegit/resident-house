<?php $_POST['section']=1;
ParametrFlats();
GLOBAL $floor_new,$plan,$flat,$plan,$sleh,$floor,$floor_prev,$floor_next;

//***Який поверх показувати **
$IdSetFloor=4;

$result = $db->prepare("SELECT img,compas   FROM `section` WHERE `sec`=$sec AND `build`=$plan AND `floor`=$floor[0] ");

$result->execute(); 	$result->store_result();	
if (!$result->num_rows) {ErrorPage404();}

$result->execute();     $result->bind_result($si['img'], $si['compas']);	$result->fetch(); 	$result->close();

if($floor[0]>1){$pov1="OR (`floor`=$floor[0]-1 AND `level`=2)OR (`floor`=$floor[0]-2 AND `level`=3) OR (`floor`=$floor[0]-1 AND `level`=3)";}else{$pov1='';}

$rez=[]; $REZULT=[]; $n=0;

$result = $db->prepare("SELECT a.floor,a.buld, count(a.id), s.img 
FROM apartments as a   LEFT OUTER JOIN section as s    ON a.floor = s.floor
WHERE a.visible=1 AND a.buld=$plan AND a.sec=$sec group by a.floor ORDER BY a.sorts ASC");
   $result->execute();
   $result->bind_result($s['floor'],$s['buld'],$s['count'],$s['img']); while($result->fetch()){   $i=0;
	
	//$flats = explode(".", $s['number']);	
 $s['sec']=$sec;
  $s['url']='section'.$sec.'/floor'.$s['floor'];
		foreach($s as $key=>$k){
			$rez[$key]=$k;
			
		}
				
		$REZULT[$n]=$rez;		$n++;
		}
 $result->close();

 foreach($REZULT as $key=>$s){
	 if($s['level']>1 AND $s['floor']!=$floor[0]){$t=".".($floor[0]-$s['floor']);}else{$t='';}
	 if ($s['sales']) 	{
		 
		 $URLP[$key]=UrlAdd('section'.$sec.'/floor'.($s['floor']+$floor[0]-$s['floor']).'/flat'.$s['number'].'_'.$s['id'].$t, TRUE);
		 /*.'" data-title="'.$s['kim'].'-к≥мнатна квартира '.$s['all_room'].' м2" onmouseout="hideApartmentDiv()" onmouseover="showApartmentDiv()" 
		 onmousemove="showApartmentInfo(`'.$s['kim'].'|'.$s['all_room'].'|'.$s['life_room'].'|'.$s['floor'].'`)';*/
	 }
	$clas_js[$key]="clas".$sec."_".$s['floor']."_".$s['id'].'_';
	$clas_css[$key]="clas".$sec."_".$s['floor']."_".$s['id'];
	if($s['level']==2 or $s['level']==3){$clas_js[$key]="clas".$sec."_".$s['floor']."_".$s['id']."_".($floor[0]-$s['floor']+1)."_";
										$clas_css[$key]="clas".$sec."_".$s['floor']."_".$s['id']."_".($floor[0]-$s['floor']+1);	}
		$clas[$key]=" ".$clas_js[$key];

//п≥дказка 		//$URLP[$key].='--'.$s['sort']."-".($key+1);
	}
	
//echo '<pre>'; print_r($REZULT); echo '</pre>';
