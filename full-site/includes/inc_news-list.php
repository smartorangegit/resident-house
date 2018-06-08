<div class="news">
	<div class="news__inner">

		<div class="news__page-heading">
			<div class="news__page-heading-top">
				<h1 class="news__heading"><?H1page()?></h1>
			</div>
			<!-- <div class="news__page-heading-bot">
				<p class="news__caption"><?=$mes['Останні подробиці комплексу']?></p>
			</div> -->
		</div>
		<!--/END news__page-heading-->
<?if (count($ReaNews)) {?>
		<div class="news__list-wrap">
			<ul class="news__list">
			
			<?foreach($ReaNews as $key=>$s):?>
				<li class="news__item">
					<div class="news__item-inner">
						<div class="news__data-time-wrap">
							<span class="news__data"><?=$s['date']?></span>
							<span class="news__time"><?=$s['time']?></span>
						</div>
						<div class="news__img-wrap">
							<img src="<?=$s['img_news']?>" alt="<?=$s['name_news']?>">
						</div>
						<div class="news__text-wrap">
							<p class="news__text-heading"><?=$s['name_news']?></p>
							<p class="news__description"><?=$s['mini_text']?></p>
							<div class="news__link-wrap">
								<a href="<?=UrlAdd($s['urls'])?>" class="news__link"><?=$mes['Дивитися']?></a>
							</div>
						</div>
					</div>
					<!--/END news__item-inner-->
				</li>
				
			<?endforeach;?>	
				
			</ul>
		</div>
<?}?>	
		<!--/END news__list-wrap-->

	</div>
</div>
<!--/END news-->