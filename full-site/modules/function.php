<?php	include('config.php');
function LangAdd(){

			$filename='modules/language/'.(substr($_POST['lang'], 0,2)).".ini"; global 	 $mes, $len_default;

			if (file_exists($filename)) {// echo 111; echo $_POST['lang'];
			 $mes = parse_ini_file($filename);			 }
			 else{ 	 $mes = parse_ini_file('language/'.$len_default.'.ini'); 	}

	}

	
function scripts($file)	{ 
	///***Якщо э / - Видаляем перший символ **
		if ($file[0]=='/') { 
		
		mb_internal_encoding("UTF-8");
		 $file = mb_substr( $file, 1);
		}
		
	$file ='/'.$file.'?v='.filemtime($file);
	
	echo $file; 
}
	
function HeadAdd($html=['html'=>'', 'head'=>true]) { GLOBAL $mes,$SETPAGE, $SLIDE;

 //$CacheContClass->scripts2('css/main.min.css');
 
$SLIDE=array('left'=>'location','right'=>'apartments', 'bottom'=>'advantage');
if (in_array($SETPAGE, $SLIDE)) {
		$key = array_search($SETPAGE, $SLIDE); 
		$SLIDE[$key]='index';
}
	if (empty($html['head'])) {	$html['head']=true;	}
	if ($html['head']!=false) { echo '<!DOCTYPE html><html lang="'.$mes['fut-mes3'].'">';}
	if(!$html['title'])
	{
		$html['title']=$mes[$SETPAGE.'-title'];
		
		if (empty($mes[$SETPAGE.'-title']))
		{
			$html['title']=$mes['text-title'].' '.$mes[$SETPAGE.'-h1'];
		}	
	}
	if($html['title'] && $html['disable-auto-title'])
	{
		$html['title']=$mes['text-title'].' '.$html['title'];
	}
	if (!$html['robots']) {$html['robots']='index, follow';}

	if (!$html['alternate']) {$html['alternate']=alternateAdd($_SERVER["REQUEST_URI"]);}
	if (strripos($_SERVER['REQUEST_URI'], '/?')!==false) {	$html['robots'] = 'noindex, nofollow'; }
	
	?>
	
	<head>
		<meta charset="UTF-8">
		<meta name="robots" content="<?=$html['robots']?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
		
				<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-KLK72H9');</script>
		<!-- Global site tag (gtag.js) - Google Analytics -->
<?/*<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109502543-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-109502543-1');
</script>*/?>

		
		<!-- End Google Tag Manager -->

		<?if(strpos($_SERVER['REQUEST_URI'], 'plan2') || strpos($_SERVER['REQUEST_URI'], 'sections')|| strpos($_SERVER['REQUEST_URI'], 'param')):?>
		<link rel="canonical" href="<?='http://'.$_SERVER['SERVER_NAME'].'/plan/';?>"/>
		<?else:?>
		<link rel="canonical" href="<?='http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>"/>
		<?endif;?>

		<?if($html['description']!='N'):
		
			if(!$html['description'])
			{
				$html['description']=$mes[$SETPAGE.'-description'];
			
				if (empty($mes[$SETPAGE.'-description']))
				{
					$html['description']=$mes[$SETPAGE.'-h1'].' '.$mes['text-description'];
				}	
			}
		?>
		<meta name="description" content="<?=$html['description']?>">
		<?endif;?>
		<title><?=$html['title']?></title>
		<?
		if($html['alternate']): echo $html['alternate'];	endif;
		if($html['html']): 	echo $html['html'];	endif;
		?>
		<?if ($html['mata_img']) {?>
		<meta property="og:title" content="<?=$html['title'].' '.$mes['text-title']?>" />
		<meta property="og:description" content="<?=$html['description'].' '.$mes['text-description']?>" />
		<meta property="og:image" content="<?=$_SERVER['SERVER_NAME'].$html['mata_img']?>"/>
		<?}?>
		<?/*Виводиться на всіх сторінках*/?>
		 
<!--	<link rel="stylesheet" href="/libs/css-button/component.css">-->

<!--	<link rel="stylesheet" href="/libs/slick/slick.css">-->
<!--	<link rel="stylesheet" href="/libs/slick/slick-advantage-theme.css">-->

	<link rel="stylesheet" href="<?scripts('css/main.min.css')?>">	
	
<link rel="apple-touch-icon" sizes="57x57" href="/img/icon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/img/icon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/img/icon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/img/icon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/img/icon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/img/icon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/img/icon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/img/icon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/img/icon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/img/icon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/img/icon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/img/icon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/img/icon/favicon-16x16.png">
<link rel="manifest" href="/img/icon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/img/icon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">			
		<?/***End*/?>

	</head>
	
	
	
	
<?if($html['head']){ echo '<body> 	
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KLK72H9"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	';
	//echo '<body>';
	} 
}
	
	

function HeaderInclude(){	 global $mes, $len, $len_default;
	
		require (__DIR__.'/inc/header.php'); 
	
	}
	
function H1page($return=false){ GLOBAL $mes,$SETPAGE;

	if ($return) 		return $mes[$SETPAGE.'-h1'];	
	else 		echo $mes[$SETPAGE.'-h1'];	
}	
	
function H1H2 ($h1) { GLOBAL $mes;
	if (H1page(1)==$h1) echo 'h1';
	else echo 'h2';
}	
	
function FooterAdd($html=['html'=>'', 'head'=>true]){ GLOBAL $mes, $Js;	?>
	<? /*Виводиться на всіх сторінках*/?>
	
<!-- Footer -->
	<? include_once(__DIR__.'/inc/footer.php'); ?>
<!-- Footer end-->

	

<?	
if($html['html']): echo $html['html'];		endif;
echo $Js;
if($html['head']!=false){ echo  '</body></html>';}

	}

function AltImgAdd($text=''){
	$t='alt="'.$text.'"';
	echo $t;
}

function UrlAdd($text='', $return='', $a=''){
	$slesh='/';
if ($a) {$slesh='';}

	$t='/'.$_POST['lang'].$text.$slesh;
	if($text==''){$t='/'.$_POST['lang'];}
	if($return) {
		return $t;
		} else {
			echo $t;
		}
}

function MenuAdd($text=''){ global $mes;
	include_once('menu.php');
}

function Getpar($text){
$text = strip_tags($text);
$text = htmlspecialchars($text);
return $text;
}

function ErrorPage404()
    { LangAdd(); global $mes, $SETPAGE;

        header($_SERVER['SERVER_PROTOCOL'].'HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        //echo "<script>document.location.replace('/404');</script>";
		$SETPAGE='404';
		 include("templates/404.php");
		// include($_SERVER['DOCUMENT_ROOT']."index.php");
        exit();
    }

function alternateAdd($url_origin=''){ global $site_url, $len_default, $len;
	   $url_str = explode("/", $url_origin);
	if (in_array($url_str[1], $len))
	{
		$st='<link rel="alternate" hreflang="'.$len_default.'" href="'.$site_url.substr($url_origin, 3).'" />';
		foreach ($len as $t)
		{
			$st.='
			<link rel="alternate" hreflang="'.$t.'" href="'.$site_url.'/'.$t.substr($url_origin, 3).'" />';
		}
	}
	else 
	{
		$st='<link rel="alternate" hreflang="'.$len_default.'" href="'.$site_url.$url_origin.'" />';
		foreach ($len as $t)
		{
			$st.='
			<link rel="alternate" hreflang="'.$t.'" href="'.$site_url.'/'.$t.$url_origin.'" />';		
		}
	 } 
 return $st;
}

function getdefolt($t){
	if(Getpar($t)){ $t=Getpar($t);}else{$t=1;}
	return $t;
}

//For plan		/*План SVG*/
function svg_plan($svg, $option=false){ GLOBAL $floor_new,$plan;

	$files = scandir($_SERVER['DOCUMENT_ROOT']."/img/houses/doma/dom$plan/");
foreach($files  as $file){
$pos = strpos($file, "$floor_new");
if($pos===false){}else{ $img=$file; }
}

$rr='img/houses/doma/dom'.$plan.'/'.$img.'/'.$svg.'.php';

	if (!$option) {		
	
		$rr=$_SERVER['DOCUMENT_ROOT'].$rr;
		} 


	return $rr;
}
	//For plan
function FloorPrevNextAdd($plan,$sec,$floor,$floor_next,$floor_prev, $compas=0){ global $mes ?>
			 
			<div class="room__nav-item-inner" data-nav-item-inner="3">

					<div class="room__nav-num-checker">
					<a  class="room__nav-num-btn room__nav-num-top" href="<?UrlAdd('section'.$sec.'/floor'.$floor_next)?>">+</a>
					  <span class="room__nav-num"><?=$floor[0]?></span>
					  <a  class="room__nav-num-btn room__nav-num-bot" href="<?UrlAdd('section'.$sec.'/floor'.$floor_prev)?>">-</a>
					</div>

					<span class="room__nav-text"><?=$mes['Поверх']?></span>
		</div>
			 
			 
			
			<? }
	//For plan
function ParametrFlats(){ 
	
GLOBAL $OPTIONS,$floor_new,$plan,$flat,$plan,$sec,$sleh,$floor,$floor_prev,$floor_next, $db;
$plan=$sec=$id=$floor;
$sleh='/';
$plan=1;
$sec=intval(getdefolt($_POST['section']));
$flat=getdefolt($_POST['flat']);

if (empty($_POST['floor'])) {$floor_new=$OPTIONS['MINFLOOR'];	} 
	else {
		$floor_new=intval(getdefolt($_POST['floor']));
	}



$floor[0]=$floor_new;
$floor[1]=1;


$result = $db->prepare("SELECT MIN(floor),MAX(floor)  FROM `apartments` WHERE `sec`=$sec AND `buld`=$plan AND visible=1 AND (`floor` BETWEEN 1 AND 12)");
$result->execute();     $result->bind_result($si['floor_min'],$si['floor_max']);	$result->fetch(); 	$result->close();

if($floor[0]>=$OPTIONS['MINFLOOR']) {$floor[1]=$floor[0]-1;} else {$floor[0]=$OPTIONS['MINFLOOR'];}
if($floor[0]<$OPTIONS['MAXFLOOR']){$floor[2]=$floor[0]+1;}else{$floor[2]=$OPTIONS['MAXFLOOR'];}
if($floor[2]>=$OPTIONS['MAXFLOOR'] && $floor[0]==$OPTIONS['MAXFLOOR']){$floor_next=$si['floor_min'];}else{$floor_next=$floor[2];}
if($floor[1]<=$OPTIONS['MINFLOOR']-1 && $floor[0]==$OPTIONS['MINFLOOR']){$floor_prev=$si['floor_max'];}else{$floor_prev=$floor[1];}

if ($si['floor_max']<$floor_next) {$floor_next=$si['floor_min'];}
if ($si['floor_min']>$floor_prev) {$floor_prev=$si['floor_max'];}

}

function copyringAdd(){?>
		<div class="footer clearfix">
          <span class="footer_left"><?=$mes['fut-mes1']?></span>
          <a href="http://smartorange.com.ua/" rel="nofollow" target="_blank">
            <img <?LazyLoad ("/img/logo-smart.png")?> alt="smartorange">
          </a>
          <span class="footer_right"><?=$mes['fut-mes2']?></span>
        </div>
		<?}

function servername(){
	$t=$_SERVER['REQUEST_SCHEME'].'://'.str_replace("www.", "", $_SERVER['SERVER_NAME']);
	return $t;
}

function searchPagination($url){

	$page=substr($url, 0,4);
	$val=substr($url, 4);

	if ($page=='page' && $val>1) {
		$_GET['page']=$val;
		return $page;
	}
}

function enterAdminka($correct_link){
	foreach ($_SERVER as $key=>$t) {
	if ($key=='SCRIPT_URL') {$SCRIPT_URL=$t; break;}
}
 $correct_link=substr($SCRIPT_URL, 1);

if (strripos($correct_link, '.php')===false) {
	$correct_link.='index.php';
} 
$dt='admin';
	require($correct_link);

 exit;
}

function LazyLoad ($src='', $option=''){

$t='';
	if (!empty($option['option'])) {$t='data-option="'.$option['option'].'"'; } else {$option['option']='';}
	if (empty($option['class']))  {$option['class']='';}

		echo 'class="'.$option['class'].' b-lazy" '.$t.' src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-src="'.$src.'"';
}

function img($img='', $lazy=true) {
	
	if ($img) {
		echo 'src="'.$img.'"';
	}
}

function FormInclude($id, $par=''){ GLOBAL $mes;
	$kv=$par;
	$webAd=$_SERVER['SCRIPT_URI'];
		
	 include("inc/form/".$id.".php");
		
}

function cropStrWord($text, $max_words=15, $append = '')
{
       $max_words = $max_words+1;
       $words = explode(' ', $text, $max_words);
       array_pop($words);
       $text = implode(' ', $words) . $append;
	   $text = str_replace("<p>", "",  $text);
	   $text = str_replace("</p>", "", $text);
	   
       return $text;
}

function cropStrStyle($text)
{
       $words = explode(' ', $text);
      // array_pop($words);
     //  $text = implode(' ', $words) . $append;
	$count=count($words);
	   foreach ($words as $key=>$t){
		   
		   if ($key==$count%2) { $words[$key]='<span class="orange-text">'.$t.'</span>';	}
		   if ($key==$count-2) { $words[$key]='<span class="italic-text">'.$t;	}
		   if ($key==$count-1) { $words[$key]=$t.'</span>';	}
		 
	   }
	     $text = implode(' ', $words);

       return $text;
}

	
	/** Структура галереї*/
	function Gallery_list($postnumbers=0, $offset=0, $img=array()){
		$i=$n=1;
		
//echo $postnumbers;
//echo $offset;
		
		foreach ($img as $key=>$t) { 
		
		if($offset>=$i ) { $i++; continue;  } 
		if($postnumbers<$n ) { $i++; continue;  }
		
		?>
					<div class="construction_item">
						<div class="construction_item_iner">
							<a class="construction_item_link" data-img='<?=$key?>' href=""></a>
							<div class="construction__info">
								<span class="construction__info_item"><i class="calendar-ico"></i><?=$t['date']?></span>
								<span class="construction__info_item"><i class="clock-ico"></i><?=$t['time']?></span>
							</div>
							<div class="construction__pict">
								<img <?img("/img/main/".$t['img'])?>  alt="">
							</div>
							<p class="construction__text">
								<?=cropStrStyle($t['text'])?>
								</p>
						</div>
					</div>
					
		<?  $n++; $i++; }
		
	}
	
	
	function AddMySvg($floor, $sec=1, $plan){ GLOBAL $db; 
	
	//*** Заносим дані для СВГ**

	$_POST['floor']=$floor; $_POST['section']=$sec;
	
	include_once('pages/floor.php');

								
												//echo '<pre>'; print_r($URLP); echo '</pre>';
												//*** Підключаєм  СВГ**
												include(svg_plan($svg=$si['img']));
		//*** Стилі для СВГ**		
		
		echo '<style>';
					
		foreach($clas_css as $key=>$s){  
			if ($REZULT[$key]['kim']==1) $color='#c1dc70;'; 
			else if($REZULT[$key]['kim']==2) $color='#70bfdc'; 
			else if($REZULT[$key]['kim']==3) $color='#9e8aac'; 
			else $color='#776843';
			
			if (!$REZULT[$key]['sales']) $color='#fff'; 
		 echo '.'.$s.'_{ opacity: 0.4; fill:'.$color.';}';
		}

		echo '</style>';		
		
}
	
	function SetCountMes($count, $par=1){ GLOBAL $mes;
		
			switch ( $par) {
		case 1:
				switch ($count) {
			case 1:
				$text=$mes['apartments-parameters2-1'];
				break;
			case 2:
				$text=$mes['apartments-parameters2-2'];
				break;
			case 3:
				$text=$mes['apartments-parameters2-2'];
				break;	
			case 4:
				$text=$mes['apartments-parameters2-2'];
				break;
			case 5:
				$text=$mes['apartments-parameters2'];
				break;
			case 6:
				$text=$mes['apartments-parameters2'];
				break;
			case 7:
				$text=$mes['apartments-parameters2'];
				break;	
				}
			break;
		case 2:
			
			switch ($count) {
			case 1:
				$text=$mes['Кімната'];
				break;
			case 2:
				$text=$mes['Кімнати'];
				break;
			case 3:
				$text=$mes['Кімнати'];
				break;	
			case 4:
				$text=$mes['Кімнати'];
				break;
			case 5:
				$text=$mes['Кімнат'];
				break;
			case 6:
				$text=$mes['Кімнат'];
				break;
			}
			break;
		}
		echo $text;
	}
		
global 	 $mes;	