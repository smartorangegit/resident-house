<?include_once('modules/pages/construction.php')?>
<div class="construction">
	<div class="construction__inner">

		<div class="construction__description">

			<div class="construction__center">
				<div class="construction__page-top">
					<<?H1H2($mes['construction-h1'])?> class="construction__heading"><?=$mes['construction-h1']?></<?H1H2($mes['construction-h1'])?>>
				</div>
				<!--/END construction__page-top-->

				<div class="construction__left-text-wrap">
					<h2 class="page-top__caption"><?= $mes['construction-subheading1'] ?></h2>
					<p class="page-top__text"><?= $mes['construction-currenttext'] ?></p>
				</div>
				<div class="construction__left-text-wrap">
					<h2 class="page-top__caption"><?= $mes['construction-subheading2'] ?></h2>
					<p class="page-top__text"><?= $mes['construction-date'] ?></p>
				</div>
			<?php/*	<div class="construction__left-text-wrap">
					<h2 class="page-top__caption"><?= $mes['construction-subheading3'] ?></h2>
					<p class="page-top__text"><?= $mes['construction-photos'] ?></p>
				</div> */?>
			</div>

			<div class="construction__left">
			<?php/*	<div class="status-bar">
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
				</div>*/?>
				<!--/END status-bar-->

				<div class="construction__web_btn-wrap">
					<a class="construction__web_btn" href="<?=UrlAdd('web-camera')?>"><?= $mes['construction-webcam'] ?></a>
				</div>
			</div>

			<div class="construction__right">
				<div class="construction__slider">
	<? foreach ($ReaPost as $t) { ?>
					<div class="construction__slide">
						<div class="construction__info">
							<div class="construction__info-left" data-img='<?=$t['id']?>'>
								<img src="<?=$t['img-url'].'/'.$t['imgs'][0]?>" alt="ololo" style="cursor: pointer;">
							</div>
							<div class="construction__info-right">
								<div class="construction__data-time">
									<span class="construction__data"><?=$t['date']?></span>
								<?php/*	<span class="construction__time"><?=$t['time']?></span> */?>
								</div>
								<h2 class="construction__info-caption"><?=$t['name']?></h2>
								<p class="construction__info-text"><?=$t['text']?></p>
							</div>
						</div>
						<!--/END construction__slide-inner-->
					</div>
					<!--/END construction__slide-->
	<?}?>
						<div class="construction__slide">
						<div class="construction__info"  style="background:transparent;">
							
						</div>
						<!--/END construction__slide-inner-->
					</div>
					
				</div>
				<!--/END construction__right-inner-->
			</div>

		</div>

	</div>
	<!--/END construction__inner-->
</div>
<!--/END construction-->