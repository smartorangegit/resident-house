<div class="news-page">
	<div class="news-page__inner">

		<div class="news-page__page-heading">
			<div class="news-page__page-heading-top">
				<h1 class="news-page__heading"><?=$ReaNews['name_news']?></h1>
				<div class="news-page__back-btn-wrap">
					<a class="news-page__back-btn" href="<?=UrlAdd('news')?>"><?= $mes['news-backbtn'] ?></a>
				</div>
			</div>
			<!--/END news-page__page-heading-top-->
		</div>
		<!--/END news__page-heading-->

		<div class="news-page__content">
			<div class="news-page__left">
				<div class="news-page__left-inner">

					<ul class="news-page__top-slider">
						<li>
							<div class="news-page__top-slide">
								<img src="<?=$ReaNews['img_news']?>" alt="1">
							</div>
						</li>
						
					<?if(count($ReaNewsImgs)>1){?>
			<? foreach($ReaNewsImgs as $key=>$s): ?>
			<li>
				<div class="news-page__top-slide">
					<img src="<?=$s?>" <? AltImgAdd($ReaNews['name_news'])?> >
				</div>
			</li>
			<?endforeach?>
					<?}?>
						
						
				
					</ul>
					<!--/END news-page__top-slider-->

					<ul class="news-page__bot-slider">
						
					<?if(count($ReaNewsImgs)>1){?>
					<li>
							<div class="news-page__bot-slide">
								<img src="<?=$ReaNews['img_news']?><?//=$ReaNews['img-min'].'/min_'.$ReaNews['img']?>" alt="1">
							</div>
						</li>
			<? foreach($ReaNewsImgs as $key=>$s): ?>
			<li>
				<div class="news-page__top-slide">
					<img src="<?=$s?>" <? AltImgAdd($ReaNews['name_news'])?> >
				</div>
			</li>
			<?endforeach?>
					<?}?>
					</ul>
					<!--/END news-page__bot-slider-->

				</div>
				<!--/END news-page__left-inner-->
			</div>
			<!--/END news-page__left-->
			<div class="news-page__right">
				<div class="news-page__right-inner">
					<div class="news-page__data-time-wrap">
						<div class="news-page__data">
							<span class="news-page__data-text"><?=$ReaNews['date']?></span>
						</div>
						<div class="news-page__time">
							<span class="news-page__time-text"><?=$ReaNews['time']?></span>
						</div>
					</div>
					<!--/END news-page__data-time-wrap-->
					<div class="news-page__description-wrap">
						<?=$ReaNews['text']?>
					</div>
					<!--/END news-page__description-wrap-->
				</div>
				<!--/END news-page__right-inner-->
			</div>
			<!--/END news-page__right-->
		</div>
		<!--/END news-page__content-->
	</div>
</div>
<!--/END news-->