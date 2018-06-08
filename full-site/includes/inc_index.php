<div class="main">
	<div class="main__inner">

		<div class="main__top-list-wrap">
			<ul style="display: none" class="main__top-list">
				<li class="main__top-item">
					<a href="<?= UrlAdd('location') ?>" class="main__top-link"><?=$mes['index-nav1']?></a>
				</li>
				<li class="main__top-item">
					<a href="<?= UrlAdd('architecture') ?>" class="main__top-link"><?=$mes['index-nav2']?></a>
				</li>
				<li class="main__top-item">
					<a href="<?= UrlAdd('house') ?>" class="main__top-link"><?=$mes['index-nav3']?></a>
				</li>
			</ul>
		</div>
		<!--/END main__top-list-wrap-->

		<div class="main__logo-wrap">
			<div class="main__logo preload__target_elem">
				<div class="main__logo-inner">
				<h1 class="home-h1"><?=$mes['index-h1']?></h1>
					<p class="main__heading">ONE <br> ONLY </p>
					<p class="main__text">and</p>
				</div>
			</div>
		</div>
		<!--/END main__logo-wrap-->

		<div class="main__bot-list-wrap">
			<ul class="main__bot-list">
				<li class="main__bot-item"  data-main__bot-item="0">
					<p class="main__bot-text" style='pointer-events: none;'><?= $mes['index-sale1'] ?></p></li>
				<li class="main__bot-item"  data-main__bot-item="1">
					<a href="#" class="main__bot-link" style='pointer-events: none;'><?= $mes['adres-sales'] ?></a>
				</li>
				<li class="main__bot-item"  data-main__bot-item="2">
					<a href="#" class="main__bot-link" style='pointer-events: none;'><?=$mes['Льва Толстого']?></a>
				</li>
				<li class="main__bot-item" data-main__bot-item="3">
					<a href="tel: <?=$mes['tel']?>" class="main__bot-link"><?= $mes['tel'] ?></a>
				</li>
			</ul>
		</div>
		<!--/END main__bot-list-wrap-->


	</div>
	<!--/END main__inner-->
</div>
<!--/END main-->