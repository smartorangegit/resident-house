<?php require_once('modules/pages/floor.php');?>
<div class="apartments">

	<div class="apartments__inner">

		<div class="apartments__page-heading">
			<div class="apartments__page-heading-top">
				<h1  class="apartments__heading"><?=$mes['apartments-h1']?></h1>
			</div>
		</div>
		<!--/END apartments__page-heading-->

		<div class="apartments__navigation">
			<ul class="apartments__nav-list">
				
				<li class="apartments__nav-item" data-nav-item="1">
				
					<div class="apartments__nav-item-inner" data-nav-item-inner="1">
						<a class="apartments__nav-link" href="<?UrlAdd('apartment')?>"><?=$mes['Обрати поверх']?></a>
					</div>
					
				</li>
			
				<!--/END apartments__nav-item-->

				<li class="apartments__nav-item" data-nav-item="2">
					<div class="apartments__nav-item-inner" data-nav-item-inner="2">
						<a class="apartments__nav-link" href="<?UrlAdd('parameters')?>"><?= $mes['apartments-parameters1'] ?></a>
					</div>
				</li>
				<!--/END apartments__nav-item-->

				<li class="apartments__nav-item" data-nav-item="3">
					<? FloorPrevNextAdd($plan,$sec,$floor,$floor_next,$floor_prev) ?>
				</li>
				<!--/END apartments__nav-item-->

				<li class="apartments__nav-item" data-nav-item="4">
					<div class="apartments__nav-item-inner" data-nav-item-inner="4">
						<span class="apartments__nav-num"><?=count($REZULT)?></span>
						<span class="apartments__nav-text"><?SetCountMes(count($REZULT), $par=1)?></span>
					</div>
				</li>
				<!--/END apartments__nav-item-->

				<li class="apartments__nav-item" data-nav-item="5">
					<div class="apartments__nav-item-inner" data-nav-item-inner="5">
						<span class="apartments__nav-text"><?= $mes['apartments-parameters3'] ?></span>
					</div>
				</li>
				<!--/END apartments__nav-item-->

				<li class="apartments__nav-item" data-nav-item="6">
					<div class="apartments__nav-item-inner" data-nav-item-inner="6">
						<div class="windrose">
							<div class="windrose__inner"  <?php  if ($si['compas']) echo 'style="transform: rotate('.$si['compas'].'deg)"';?>>
								<span class="windrose__top"><?= $mes['apartments-windrose-north'] ?></span>
								<span class="windrose__right"><?= $mes['apartments-windrose-east'] ?></span>
								<span class="windrose__left"><?= $mes['apartments-windrose-west'] ?></span>
								<span class="windrose__bot"><?= $mes['apartments-windrose-south'] ?></span>
							</div>
						</div>
						<!--/END windrose-->
					</div>
				</li>
				<!--/END apartments__nav-item-->
			</ul>
		</div>
		<!--/ END apartments__navigation-->

		<div class="apartments__description">
			<div class="apartments__description-inner">

				<div class="apartments__description-left">
					<div class="room-set">
						<ul class="room-set__list">
							<li class="room-set__item"><?= $mes['apartments-parameters4'] ?></li>
							<li class="room-set__item" data-cl="one"><?= $mes['apartments-parameters5'] ?></li>
							<li class="room-set__item" data-cl="two"><?= $mes['apartments-parameters6'] ?></li>
							<li class="room-set__item" data-cl="three"><?= $mes['apartments-parameters7'] ?></li>
							<li class="room-set__item" data-cl="four"><?= $mes['apartments-parameters7-1'] ?></li>
						</ul>
					</div>
				</div>

				<div class="apartments__description-center">
					<div class="apartments__description-center-inner">

						<div class="apartments__img-wrap">
							<div class="apartments__img">

								  <?include(svg_plan($svg=$si['img']));?>
							
							</div>
						</div>

					</div>
					<!--/END apartments__description-center-inner-->
				</div>
				<!--/END apartments__description-center-->

				<div class="apartments__description-right">
					<div class="apartments-options">

						<ul class="apartments-options__list">

							<li class="apartments-options__item">
								<div class="apartments-options__item-inner">
									<span class="apartments-options__num-small" id="number_s">X</span>
									<span class="apartments-options__text-small"><?= $mes['apartments-parameters8'] ?></span>
								</div>
							</li>
							<!--/END apartments-options__item-->

							<li class="apartments-options__item">
								<div class="apartments-options__item-inner">
									<span class="apartments-options__num-small" id="room_s">X</span>
									<span class="apartments-options__text-small"><?= $mes['apartments-parameters9'] ?></span>
								</div>
							</li>
							<!--/END apartments-options__item-->
							<li class="apartments-options__item">
								<div class="apartments-options__item-inner">
									<p class="apartments-options__num" id="all_room_s">X <sub><?=$mes['м']?><sup>2</sup></sub></p>
									<p class="apartments-options__text"><?= $mes['apartments-parameters10'] ?></p>
								</div>
							</li>
							<!--/END apartments-options__item-->
							<li class="apartments-options__item">
								<div class="apartments-options__item-inner">
									<p class="apartments-options__num" id="life_room_s">X <sub><?=$mes['м']?><sup>2</sup></sub></p>
									<p class="apartments-options__text"><?= $mes['apartments-parameters11'] ?></p>
								</div>
							</li>
							<!--/END apartments-options__item-->

						</ul>

					</div>
				</div>
			</div>
		</div>
		<!--/END apartments__description-->


	</div>
	<!--/END apartments__inner-->
</div>
<!--/END apartments-->



<style>
<?
foreach($clas_css as $key=>$s){  
	if ($REZULT[$key]['kim']==1) $color='#c1dc70;'; 
	else if($REZULT[$key]['kim']==2) $color='#70bfdc'; 
	else if($REZULT[$key]['kim']==3) $color='#9e8aac'; 
	else $color='#776843';
	
	if (!$REZULT[$key]['sales']) $color='#fff'; 
 echo '.'.$s.'_{ opacity: 0.4; fill:'.$color.';}';
}
?>
</style>

<? ob_start(); ?>

<script>
<? $i=0; foreach($REZULT as $key=>$s){  $i++; $cl=$clas_css[$key];?>
$('.<?=$clas_js[$key]?>').mouseover(function(e) {
  document.getElementById("number_s").innerHTML = "<?=$s['number']?>";
  document.getElementById("room_s").innerHTML = "<?=$s['kim']?>";
  document.getElementById("life_room_s").innerHTML = "<?=str_replace('.',',',$s['life_room']);?> <sub><?=$mes['м']?><sup>2</sup></sub>";
  document.getElementById("all_room_s").innerHTML = "<?=str_replace('.',',',$s['all_room'])?> <sub><?=$mes['м']?><sup>2</sup></sub>";
 <?// document.getElementById("flats").style = "display:block";>?>
  $('.flats').css("display", "block");
  
      var x = e.pageX;
    var y = e.pageY;
    var leftPos = x - $('.lin_<?=$i?>').width() - 250;
    var topPos = y - $('.lin_<?=$i?>').height() - 20;

    $(".lin_<?=$i?>").css({top:topPos, left:leftPos});
}).mouseout(function()
{
<?//document.getElementById("flats").style = "display:none";
 // $('.flats').css("display", "none");?>
 
  document.getElementById("number_s").innerHTML = "X";
  document.getElementById("room_s").innerHTML = "X";
  document.getElementById("life_room_s").innerHTML = "X  <sub><?=$mes['м']?><sup>2</sup></sub>";
  document.getElementById("all_room_s").innerHTML = "X <sub><?=$mes['м']?><sup>2</sup></sub>";
});
 <?}?>
 	<?$i=0; foreach($REZULT as $key=>$s){  $i++; $cl=$clas_css[$key];?>
$('.<?=$clas_js[$key]?>').mouseover(function() {
  $('.lin_<?=$i?>').css('display', 'block');
}).mouseout(function()
{
$('.lin_<?=$i?>').css('display', 'none');
});
 <? } ?>
 
</script>

<?GLOBAL $Js;  $Js= ob_get_clean(); ?>