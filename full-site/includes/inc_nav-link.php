<?php GLOBAL $SLIDE;

//echo '<pre>'; print_r($SLIDE); echo '</pre>';

	foreach ($SLIDE as $key=>$t) {
		
		$key_=$key;
		
		if ($key=='bottom'){$key_='center';}
		$keya_a_='content__link--'.$key_;	
		if ($key=='left'){$keya_a_='';}
		//if ($SETPAGE=='index'){$data_next='page-main';} else {$data_next='page-main';}
		$data_next='page-main';
		if ($t=='index'){$t='page-main';}
		
		echo '
		<div class="content__link-wrap '.$key_.'-btm-link nav-btn pagenav__button--'.$key.'" data-url="'.$t.'" data-page="page-'.$key.'" data-position="'.$key.'" data-next="'.$data_next.'">
	<a class="content__link content__link_curent '.$keya_a_.'" href="#">
		<i class="content__icon content__icon--arrow-'.$key_.'"></i>
		'.$mes[$t.'-h1'].'
	</a>
	<a class="content__link content__link_next '.$keya_a_.'" href="2">
		<i class="content__icon content__icon--arrow-'.$key_.'"></i>
		'.$mes[$SETPAGE.'-h1'].'
	</a>
		</div>';
		
	}
	?>
	


