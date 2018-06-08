<?php  HeadAdd();?>
<div class="all_wrapper">
	<main class="content" data-content="404" role="main">
		<!--<div class="content__inner">-->

		<div class="page404">
			<div class="page404__inner">
				<h1 class="page404__heading"><?H1page()?></h1>

				<div class="page404__text-wrap preload__target_elem">
					<p class="page404__description"><?=$mes['404-mes1']?></p>
					<p class="page404__text"><?=$mes['404-mes4']?></p>
				</div>

				<div class="page404__link-wrap">
<!--					<a class="page404__link" href="404.php">Назад</a>-->
					<a class="page404__link" href="<?=UrlAdd()?>"><?=$mes['404-mes3']?></a>

				</div>
			</div>
			<!--/END page404__inner-->
		</div>
		<!--/END page404-->


		<!--</div>-->
		<!--/END content__inner-->
	</main>
	<!--/END content-->
</div>
<!--/END all_wrapper-->

<!--<script async src="js/scripts.min.js"></script>-->
<script src="/libs/jquery/dist/jquery.min.js"></script>
<script src="/libs/slick/slick.min.js"></script>
<script src="/js/common.js"></script>

</body>
</html>