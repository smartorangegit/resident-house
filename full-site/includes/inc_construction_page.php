<?include_once('modules/pages/construction.php')?>
<div class="construction">
	<div class="construction__inner">

		<div class="construction__description">

			<div class="construction__center">
				<div class="construction__page-top">
					<<?H1H2($mes['construction-h1'])?> class="construction__heading"><?=$mes['construction-h1']?></<?H1H2($mes['construction-h1'])?>>
				</div>
				<!--/END construction__page-top-->

				<div class="construction__text">
				<div class="construction__left-text-wrap">
						<div class="construction__top-text-wrap">
							<p class="page-top__caption"><?= $mes['construction-subheading1'] ?></p>
							<p class="page-top__text"><?= $mes['construction-currenttext'] ?></p>
						</div>

						<div class="construction__web_btn-wrap">
							<a class="construction__web_btn webcam_bg" href="<?=UrlAdd('web-camera')?>"><?= $mes['construction-webcam'] ?></a>
						</div>
					</div>
					<div class="construction__left-text-wrap">
						<div class="construction__top-text-wrap">
							<p class="page-top__caption"><?= $mes['construction-subheading2'] ?></p>
							<p class="page-top__text"><?= $mes['construction-date'] ?></p>
						</div>
						
						<div class="construction__web_btn-wrap">
							<a class="construction__web_btn pan_bg" target="_blank" href="http://magelangis.com/Pano/resident/index.html"><?= $mes['construction-pan'] ?></a>
						</div>
					</div>
				</div>
				<div class="page-top__caption construction__slider-title">
					<span class="construction__slider-title-text"><!--<?=$mes['construction-text1'];?>--></span>
					<?php/*<span class="construction__slider-date">09.02.2018</span>*/?>
				</div>
			<?php/*	<div class="construction__left-text-wrap">
					<p class="page-top__caption"><?= $mes['construction-subheading3'] ?></p>
					<p class="page-top__text"><?= $mes['construction-photos'] ?></p>
				</div> */?>
			</div>

			<?php/*<div class="construction__left">
				<div class="status-bar">
					<div class="status-bar__inner">
						<div class="status-bar__box-wrap">
							<p class="status-bar__text"><?= $mes['construction-construction1'] ?></p>
							<div class="status-bar__status-wrap">
								<p class="status-bar__status"><?=$PERC['persent_1']?>%</p>
							</div>
						</div>

						<div class="status-bar__box-wrap">
							<p class="status-bar__text"><?= $mes['construction-construction2'] ?></p>
							<div class="status-bar__status-wrap">
								<p class="status-bar__status"><?=$PERC['persent_2']?>%</p>
							</div>
						</div>

						<div class="status-bar__box-wrap">
							<p class="status-bar__text"><?= $mes['construction-construction3'] ?></p>
							<div class="status-bar__status-wrap">
								<p class="status-bar__status"><?=$PERC['persent_3']?>%</p>
							</div>
						</div>

						<div class="status-bar__box-wrap">
							<p class="status-bar__text"><?= $mes['construction-construction4'] ?></p>
							<div class="status-bar__status-wrap">
								<p class="status-bar__status"><?=$PERC['persent_4']?>%</p>
							</div>
						</div>

					</div> 
					<!--/END status-bar__inner-->
				</div>
				<!--/END status-bar-->
			</div>*/?>

			<div class="construction__right">
				<div class="construction__slider">
					<? foreach ($ReaPost as $t) { ?>
					<div class="construction__slide">
						<div class="construction__info">
							<div class="construction__info-left" data-img='<?=$t['id']?>'>
								<img src="<?=$t['img-url'].'/'.$t['imgs'][0]?>" alt="Construction" style="cursor: pointer;">
							</div>
							<div class="construction__info-right">
								<div class="construction__data-time">
									<span class="construction__data"><?=$t['date']?></span>
								<!--<span class="construction__time"> <?=$t['time']?></span>-->
								</div>
								<!--<p class="construction__info-caption"><?=$t['name']?></p>
								<p class="construction__info-text"><?=$t['text']?></p>-->
							</div>
						</div>
						<!--/END construction__slide-inner-->
					</div>
					<!--/END construction__slide-->
					<?}?>
				</div> 

				<!--/END construction__right-inner-->
			</div>

		</div>

	</div>
	<!--/END construction__inner-->
</div>
<!--/END construction-->