<?session_start(); /*All function*/ 
require_once('modules/function.php');  
require_once("modules/redirect.php");									 
$file_link='';
$correct_link=$_SERVER['REQUEST_URI']; global $site,$SETPAGE, $mes;
$pos      = strripos($correct_link, "?");
$php='.php';
/*Utm 01.02.2018*/
 if ($_GET)
 {
	 $utm=array(
		'utm_source' ,
		'utm_medium',
		'utm_campaign' ,
		'utm_term', 
		'utm_content' 
		);
	 foreach($_GET as $key=>$t)
	 {	 
		$metka= array_search($key,$utm);
		 if ($metka!==FALSE)
		 {
			 $_SESSION[$utm[$metka]]=$t;
		 }
	 }
 }
/*Utm End*/


if (strripos($correct_link, '/?/')!==false) {
	$string_link = explode("/?/", $correct_link);	
	header("Location:".$string_link[0]."/");
}

$correct_mas=explode("/", $correct_link);

if(strpos($correct_link, 'admin/')!== false){ enterAdminka($correct_link); }

if(end($correct_mas) AND $pos===false){	header("Location:".$correct_link."/");}


if($redirectUrl) 
{
	foreach ($redirectUrl as $key=>$t) {	
		if ($correct_link==$key) {
				
			header( 'Location: '.$site_url.'/'.$t, true, 301 );
			exit;
		}
	}
}
if(in_array($correct_mas[1], $len, true)) {	$_POST['lang']=$correct_mas[1].'/';}else{$_POST['lang']='';}
if($_POST['lang']==''){$LANG=$len_default;}else{$LANG=substr($_POST['lang'], 0,2);}

$i=0;
foreach($correct_mas as $k=>$t){ 
if(!empty($t) AND $_POST['lang']=='' OR (!empty($t) AND $k>1)){$file_link.=$t.'/'; 
if( strripos($t, "?")!==false) {$get=$t;} else {$urls[$i]=$t;}

 $i++;}
//if( strripos($urls[$i], "?")) {unset($urls[$i]);}
}

LangAdd();
if(stristr($correct_link, '.php') !== FALSE){	 ErrorPage404();}

//$urls_id=['plan','sections','floor','flat'];
$urls_id=['section','floor','flat'];

foreach($urls as $k=>$t){
$sim=iconv_strlen($urls_id[$k],'UTF-8');
$par=substr($t, 0,$sim);

if($urls_id[$k]==$par){$_POST[$urls_id[$k]]=str_replace($par, "", $t);}	

}
	if($urls[0]=='news')
	{
		unset($urls[0]);	
		$news=implode("", $urls);	
	}
	
$file_link=substr($file_link, 0, -1);

$file_link_mas=explode("/?", $file_link);
$file_link=$file_link_mas[0];
$file_link_get='?'.$file_link_mas[1];


if(empty($correct_mas[0]) AND (empty($correct_mas[1]) OR  strripos($correct_mas[1], "?") !== false)){$file_link='index';}
if(empty($correct_mas[0]) AND empty($correct_mas[2]) AND in_array($correct_mas[1], $len, true)){$file_link='index';}
if(empty($correct_mas[0]) AND  in_array($correct_mas[1], $len, true) AND strripos($correct_mas[2], '?')!==FALSE){$file_link='index';}	
		
		
	
if (file_exists('templates/'.$file_link.$php)) {$file='templates/'.$file_link.$php; $SETPAGE=$file_link; }
	elseif ($_POST['flat']) {	$file='templates/flats-list.php';  $SETPAGE='flats';	}
			elseif ($_POST['floor']) {	$file='templates/floor-list.php';	$SETPAGE='floor';	}
				  elseif ($_POST['section']) {	$file='templates/floor-page.php';  $SETPAGE='floor-page';	}
				elseif ($news) {

if($_POST['lang']){$langs=str_replace("/", "", $_POST['lang']);}else{$langs=$len_default;}

	$result = $db->prepare("SELECT news_code FROM news WHERE news_code='".$news."' AND name_news_$LANG!='' AND isActive=0 ");
    $result->execute();
	$result->store_result();	$myrow=$result->num_rows;

	if($myrow>0){ 	$file = "templates/news-open-list.php"; $_GET['URLS']=$news; $SETPAGE='news-open';

    $result->execute();
	$result->bind_result($s['urls']);
	
       while ($result->fetch()) {       $_GET['URLS_LG'][$LANG]=$s['urls'];    }
		} else {
			
			if(searchPagination($news)){
				$file='templates/news.php';
				} else {
			
			ErrorPage404();
				}
				
		}
	}
			
	else { 
		
	ErrorPage404();
	}

	
	///*** Cesh Start **

CacheControls($file); 
	///***Cesh End **

 
if (file_exists(__DIR__.'/modules/pages/'.$SETPAGE.$php)) {
	include_once('modules/pages/'.$SETPAGE.$php);
}
include($file);
 

 ?>