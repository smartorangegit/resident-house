<?php  HeadAdd(array('title'=>$mes['apartments-parameters8'].' '.$number, 'disable-auto-title'=>true, 'robots'=>'noindex, nofollow'));?>
<div class="all_wrapper">

	<?php HeaderInclude();?>

  <main class="content" role="main">
	<div class="content__inner pages">



	  <!-- START page content code-->
	  <div class="page page--current">
		<div class="room">
		  <div class="room__inner">

			<div class="room__page-heading">
			  <div class="room__page-heading-top">
				<h1 class="room__heading"><?=$mes['apartments-parameters8']?> <?=$number?></h1>
			  </div>
			</div>
			<!--/END room__page-heading-->

			<div class="room__navigation">
			  <ul class="room__nav-list">

				<li class="room__nav-item" data-nav-item="1">
				  <div class="room__nav-item-inner" data-nav-item-inner="1">
					<a class="room__nav-link" href="<?UrlAdd('apartment')?>"><?=$mes['Обрати поверх']?></a>
				  </div>
				</li>
				<!--/END room__nav-item-->

				<li class="room__nav-item" data-nav-item="2">
				  <div class="room__nav-item-inner" data-nav-item-inner="2">
					<a class="room__nav-link" href="<?UrlAdd('parameters')?>"><?=$mes['apartments-parameters1']?></a>
				  </div>
				</li>
				<!--/END room__nav-item-->

				<li class="room__nav-item" data-nav-item="3">
					<? FloorPrevNextAdd($plan,$sec,$floor,$floor_next,$floor_prev) ?>
				</li>
				<!--/END room__nav-item-->

				<li class="room__nav-item" data-nav-item="4">
				  <div class="room__nav-item-inner" data-nav-item-inner="4">

					<span class="room__nav-num"><?=$room?></span>
					<span class="room__nav-text"><?SetCountMes($room, 2)?></span>

				  </div>
				</li>
				<!--/END room__nav-item-->

				<li class="room__nav-item" id="options-open-btn" data-nav-item="5">
				  <div class="room__nav-item-inner" data-nav-item-inner="5">
					<span class="room__nav-text"><?=$mes['apartments-parameters3']?></span>
				  </div>
				</li>
				<!--/END room__nav-item-->

				<li class="room__nav-item" data-nav-item="6">
				  <div class="room__nav-item-inner" data-nav-item-inner="6">
					<div class="windrose">
					  <div class="windrose__inner" <?php  if ($si['compas']) echo 'style="transform: rotate('.$si['compas'].'deg)"';?>>
								<span class="windrose__top"><?= $mes['apartments-windrose-north'] ?></span>
								<span class="windrose__right"><?= $mes['apartments-windrose-east'] ?></span>
								<span class="windrose__left"><?= $mes['apartments-windrose-west'] ?></span>
								<span class="windrose__bot"><?= $mes['apartments-windrose-south'] ?></span>
					  </div>
					</div>
					<!--/END windrose-->
				  </div>
				</li>
				<!--/END room__nav-item-->
			  </ul>
			  <!--/END room__nav-list-->
			</div>
			<!--/ END room__navigation-->

			<div class="room__description">
			  <div class="room__description-inner">

				<div class="room__description-left">
				  <div class="roomer">
					<ul class="roomer__list">
					  <li class="roomer__item" data-roomer-item="1">
						<a target="_blank"  href="<? echo UrlAdd('pdf', 1).'?time='.time();?>" rel="nofollow"  class="roomer__link" data-roomer-link="1"><?=$mes['Завантажити PDF']?></a>
					  </li>
					  <li class="roomer__item" data-roomer-item="2">
						<a href="" id="booking" class="roomer__link" data-roomer-link="2"><?=$mes['Забронювати']?></a>
					  </li>
					  <li class="roomer__item" data-roomer-item="3">
						<p class="roomer__text"><?=$mes['План поверху']?></p>
						 <?include(svg_plan($si['img']));?>
					  </li>
					  <li class="roomer__item" data-roomer-item="4">
						<a href="#" class="roomer__link link_seven_hundred_px" id="room_info__btn" data-roomer-link="3"><?=$mes['Дізнатися ціну']?></a>
					  </li>
					</ul>
				  </div>
				</div>

				<div class="room__description-center">
				  <div class="room__description-center-inner">

					<div class="room__img-wrap">
					  <div class="room__img">

						<!--<img class="room__img-horizontal" src="/img/room/png/1_b.png" alt="/">-->
					<?	/*<a target='_blank' href='<?=$img_flat?>'><img class="<?=$classImg?>" <?img($img_flat)?>  <?AltImgAdd($mes['apartments-parameters8'].' '.$number)?>></a>*/?>
						<img class="<?=$classImg?> open_room_modal" <?img($img_flat)?>  <?AltImgAdd($mes['apartments-parameters8'].' '.$number)?>>

					  </div>
					</div>
					<!--/END room__img-wrap-->

					<div class="room_info__btn-wrap">
					  <a class="room_info__btn" id='room_info__btn' href="#"><?=$mes['Дізнатися ціну']?></a>
					</div>

				  </div>
				  <!--/END room__description-center-inner-->
				</div>
				<!--/END room__description-center-->
<?

			//echo '<pre>'; print_r($mas1); echo '</pre>';
			?>
				<div class="room__description-right">
				  <button id="options-close-btn"></button>
				  <p class="room-options__caption"><?=$mes['apartments-parameters3']?></p>
				  <div class="room-options">



					<ul class="room-options__list" id="room-options__list">

					 <?foreach($mas2 as $k=>$s){  if($s){ ?>
				  <li class="room-options__item">

						<div class="room-options__item-inner">
						  <p class="room-options__num"><?=str_replace('.',',',$s);?><sub><?=$mes['м2']?></sub></p>
						  <p class="room-options__text"><?=$mas1[$k]?></p>
						</div>
				  </li>
				 <?}}?>
					  <!--/END room-options__list-->

					</ul>
					<!--/END room-options__list-->
				  </div>
				  <!--/END room-options-->
				</div>
				<!--/END room__description-right-->

			  </div>
			  <!--/END room__description-inner-->
			</div>
			<!--/END room__description-->

		  </div>
		  <!--/END room__inner-->
		</div>
		<!--/END room-->
	  </div>

	</div>


	<div class="room_modal_window">
		<div class="room_modal_close">×</div>
		<div class="room_modal__inner">
			<img  <?img($img_flat)?>  <?AltImgAdd($mes['apartments-parameters8'].' '.$number)?>>

		</div>

	</div>



<style media="screen">
	.room_modal_window{
		width: 96%;
		height: 96%;
		background: #f4ede7;
		position: absolute;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
		-webkit-transform: translate(-50%, -50%);
		padding: 30px;
		z-index: 999;
		display: none;
	}
	.room_modal__inner{
		width: 100%;
		height: 100%;
	}
	.room_modal__inner img{
		max-width: 100%;
    display: block;
    max-height: 100%;
    margin: 0 auto;
	}
	.room_modal_close{
		position: absolute;
		font-family: 'ZamenhofInverse';
    font-size: 70px;
    text-transform: uppercase;
		right: -7px;
    top: 7px;
    line-height: 36px;
		cursor: pointer;
	}
	.open_room_modal{
		cursor: pointer;
	}

</style>

	<!--/END content__inner-->
  </main>
  <!--/END content-->


<?php /*** modules/inc/form/ */ FormInclude('form_apartments');?>

<?php	 FooterAdd();?>
<script type="text/javascript">
$('.open_room_modal').click(function(){
	$('.room_modal_window').fadeIn(800)
});
$('.room_modal_close').click(function(){
	$('.room_modal_window').fadeOut(800)
});

</script>
