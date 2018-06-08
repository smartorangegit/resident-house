<?php  HeadAdd(['robots'=>'noindex, nofollow']);?>
<div class="all_wrapper">

	<?php HeaderInclude();?>

	<main class="content" role="main">
		<div class="content__inner pages">
			<!-- NAVIGATION LINK on page-->
			<?/* include "includes/inc_nav-link.php"*/?>
			<!-- /END NAVIGATION LINK on page-->

			<!-- START page content code-->
			<div class="page page-main page--current">

								<div class="house">
					<div class="house__inner">

						<div class="house__left">
							<div class="house__left-inner">

								<div class="house__page-heading">
									<div class="house__page-heading-top">
										<h1 class="house__heading"><?=$mes[$SETPAGE.'-h1']?></h1>
									</div>
									<div class="house__page-heading-bot">
										<p class="house__caption"><?= $mes['installments-subheading']?></p>
									</div>
								</div>
								<!--/END values__page-heading-->

								<div class="house__description-wrap">
									<div class="house__description">
										<?= $mes['installments-maintext'] ?>
									</div>
								</div>
								<!--/END house__description-wrap-->

							</div>
							<!--/END house__left-inner-->
						</div>
						<!--/END house__left-->

						<div class="house__right">
							<div class="house__right-inner"></div>
						</div>
						<!--/END house__right-->
					</div>
					<!--/END values__inner-->
				</div>
				<!--/END values-->

			</div>
			<!--<div class="page page-bottom">-->

		</div>
		<!--/END content__inner-->
	</main>
	<!--/END content-->


<?php	 FooterAdd();		?>
