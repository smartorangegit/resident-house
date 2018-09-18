<?php  HeadAdd(array('html'=>'', 'head'=>true));?>

<div class="all_wrapper">

	<?php HeaderInclude();?>

  <main class="content" role="main">
	<div class="content__inner pages">

	 <!-- NAVIGATION LINK on page-->
			<?/* include "includes/inc_nav-link.php"*/?>
	<!-- /END NAVIGATION LINK on page-->

	  <!-- START page content code-->
	  <div class="page page-main page--current">
		<div class="options">
		  <div class="options__inner">

			<div class="options__page-heading">
			  <div class="options__page-heading-top">
				<h1 class="options__heading"><?H1page()?></h1>
			  </div>
			</div>
			<!--/END news__page-heading-->

			<div class="options__params-wrap">
			  <div class="options__params-inner">
				<div class="options__params-left">
				  <a href="<?=UrlAdd('apartment')?>" class="options__params-link-back">
					<?=$mes['news-backbtn']?>
				  </a>
				</div>
				<!--/END options__params-left-->
				<div class="options__params-right">
				  <div class="options-range-slider">
					<button class="options__params-btn"><?=$mes['Згорнути']?></button>
					<ul class="options-range-slider__list">
					  <li class="options-range-slider__item">
						<label class="options-range-slider__input-wrap"> <?=$mes['Поверх']?>
							<input type="text" id="floor" data-min='<?= $Rest['floor']['min']?>'   data-max='<?=$Rest['floor']['max']?>' name="example_name" value=""/>
						</label>
					  </li>
					  <!--/END options-range-slider__item-->
					  <li class="options-range-slider__item">
						<label class="options-range-slider__input-wrap"> <?=$mes['apartments-parameters9']?>
						  <input type="text" id="room" data-min='<?= $Rest['room']['min']?>' <?=$filter?>  data-max='<?=$Rest['room']['max']?>' name="example_name" value=""/>
						</label>
					  </li>
					  <!--/END options-range-slider__item-->
					  <li class="options-range-slider__item">
						<label class="options-range-slider__input-wrap"> <?=$mes['Площа м2']?>
						  <input type="text" id="size" data-min='<?= $Rest['area']['min']?>'  data-max='<?=$Rest['area']['max']?>' name="example_name" value=""/>
						</label>
					  </li>
					  <!--/END options-range-slider__item-->
					</ul>
					<!--/END options-range-slider__list-->
				  </div>
				  <!--/END options-range-slider-->
				</div>
				<!--/END options__params-right-->
			  </div>
			  <!--/END options__params-inner-->
			</div>
			<!--options__params-wrap-->

			<div class="options__filter">
			  <div class="options__filter-inner">
				<ul class="options__list-caption">
				  <li class="options__item-caption"><?=$mes['Поверх']?></li>
				  <li class="options__item-caption">№</li>
				  <li class="options__item-caption"><?=$mes['Кімнат']?></li>
				  <li class="options__item-caption"><?=$mes['Площа'].' '.$mes['м2']?></li>
				</ul>
				<div class="options__list-wrap">
				  <ul class="options__list">
				<?php if($REZULT): 
					
						foreach($REZULT as $key=>$s){ 
						$number=mb_strtolower($s['number'], 'UTF-8');
						
						$url="section{$s['sec']}/floor{$s['floor']}/flat{$number}_{$s['id']}";
						
						$size = getimagesize($_SERVER['DOCUMENT_ROOT'].$s['img']);
						
						if ($size[0]>$size[1]) {	$classImg='options__img-horizontal';	} 
							
							else {	$classImg='options__img-vertical';	}
						
						
						//echo '<pre>'; print_r($size); echo '</pre>';
						 
						
					?>
					<li class="options__item filter" <?// if (!empty($filter) && $filter!=$s['kim'] ) { echo 'style="display:none"'; }
					
					echo "data-floor='".$s['floor']."' 
						 data-room='".$s['kim']."'
						 data-size='".$s['all_room']."'";
					?> >
					  <a class="options__item-link" href="<?UrlAdd($url)?>">
						<div class="options__item-left">
						  <p class="options__text-wrap">
							<span class="options__text"><?=$mes['Поверх']?>:</span>
							<span class="options__num"><?=$s['floor']?></span>
						  </p>
						  <p class="options__text-wrap">
							<span class="options__text">№:</span>
							<span class="options__num"><?=$s['number']?></span>
						  </p>
						  <p class="options__text-wrap">
							<span class="options__text"><?=$mes['Кімнат']?>:</span>
							<span class="options__num"><?=$s['kim']?></span>
						  </p>
						  <p class="options__text-wrap">
							<span class="options__text"><?=$mes['Площа'].' '.$mes['м2']?>:</span>
							<span class="options__num"><?=$s['all_room']?> </span>
						  </p>
						</div>
						<!--/END options__item-left-->
					<?if ($s['img']){?>
						<div class="options__item-right" data-img='<?=$s['img']?>' data-alt='<?='Квартира'.$s['number']?>' data-class='<?=$classImg?>'>
						  <div class="options__item-img-wrap" >
							<img class="<?=$classImg?>" <?img($s['img'])?> alt='<?='Квартира'.$s['number']?>' >
						  </div>
						</div>
					<?}?>	
						<!--/END options__item-right-->
					  </a>
					  <!--/END options__item-link-->
					</li>
						<?}?>
					<!--/END options__item-->

					<?endif?>


				  </ul>
				   <div class="not_found" ><?=$mes['За вашим запитом нічого не знайдено']?></div>
				  <!--/END options__item-->
				</div>
				<!--/END options__list-wrap-->
			  </div>
			  <!--/END options__filter-inner-->
			</div>
			<!--/END options__filter-->

		  </div>
		</div>
		<!--/END apartments-->
	  </div>
	  
	  <?/*
		<div class="page page-bottom">

				<? include "includes/inc_advantage.php"?>

		</div>
			<div class="page page-left">

				<? include "includes/inc_location.php"?>

		</div>
		<div class="page page-right">

				<? include "includes/inc_rooms-page.php"?>

		</div>*/?>
			<!--/END page content code-->
	  
	  
	  

  </main>
  <!--/END content-->

<?php	 FooterAdd();		?>
