<?php  HeadAdd();?>
<div class="all_wrapper">

<?php HeaderInclude();?>

	<main class="content" role="main">
		<div class="content__inner pages">
			<!-- NAVIGATION LINK on page-->
			<? /* include "includes/inc_nav-link.php" */?>
			<!-- /END NAVIGATION LINK on page-->

			<!-- START page content code-->
			<div class="page page-main page--current">
				<style media="screen">
					.thanks__list{	margin-bottom: 20px;}
					.manager__list-wrap{margin-top: 12px;	opacity: 1;	}
					.thanks{display: block;}
					.manager__list{	max-width: 860px;}
					.slick-track{	display: flex; align-items: center; display: -webkit-flex; -webkit-align-items: center; }
					.slick-slide{	padding: 20px;}
					.manager__item.manager__item_einstein	img{width: 60%;	margin: 0 auto;}
					.manager__item.manager__item_rybalsky img{width: 74%;	margin: 0 auto;}

				</style>

			 <div class="thanks">
                <div class="thanks__inner">


                    <ul class="thanks__list">
                            <p class="thanks__heading"><?H1page()?></p>
                            <div class="thanks__caption"><?=$mes['Наш менеджер зв...']?></div>
                        <!-- <li class="thanks__item">
                            <a href="<?UrlAdd()?>" class="thanks__link"><?=$mes['404-mes3']?></a>
                        </li> -->
                    </ul>
                    <!--/END thanks__list-->

                </div>
								<div class="manager__list-wrap">
									<ul class="manager__list">
										<li class="manager__item manager__item_ny">
											<a href="http://new-york.com.ua/" class="manager__link" target="_blank">
												<img src="/img/manager/new_york_logo.svg" alt="ny_icon">
											</a>
										</li>
										<li class="manager__item manager__item_chicago">
											<a href="https://chicago.kiev.ua/" class="manager__link" target="_blank">
												<img src="/img/manager/chicago_logo.svg" alt="chicago_icon">
											</a>
										</li>
										<li class="manager__item manager__item_san">
											<a href="http://sanfrancisco.com.ua/" class="manager__link" target="_blank">
												<img src="/img/manager/san_francisco_color.svg" alt="san_icon">
											</a>
										</li>
										<li class="manager__item manager__item_rybalsky">
											<a href="https://rybalsky.com.ua/" class="manager__link" target="_blank">
												<img src="/img/manager/rybalsky_logo_blue.svg" alt="rybalsky_icon">
											</a>
										</li>
										<li class="manager__item manager__item_bristol">
											<a href="https://bristol.house/" class="manager__link" target="_blank">
												<img src="/img/manager/bristol_logo.svg" alt="bristol_icon">
											</a>
										</li>
										<li class="manager__item manager__item_einstein">
											<a href="https://einstein.house/" class="manager__link" target="_blank">
												<img src="/img/manager/einstein-logo-blue.svg" alt="einstein_icon">
											</a>
										</li>
										<li class="manager__item manager__item_kandinskiy">
											<a href="http://kandinsky-residence.com.ua/" class="manager__link" target="_blank">
												<img src="/img/manager/kandinsky_logo.svg" alt="kandinsky_icon">
											</a>
										</li>

									</ul>
									<div>
										<div class="manager__carousel manager__carousel_prev"></div>
										<div class="manager__carousel manager__carousel_next"></div>
									</div>
								</div>
                <!--/END thanks__inner-->
            </div>
            <!--/END thanks-->



			</div>
			<div class="page page-bottom">

				<? include "includes/inc_advantage.php"?>

			</div>
			<div class="page page-left">

				<? include "includes/inc_location.php"?>

			</div>
			<div class="page page-right">

			<? include "includes/inc_rooms-page.php"?>

			</div>
			<!--/END page content code-->

		</div>
		<!--/END content__inner-->
	</main>
	<!--/END content-->

<?php	 FooterAdd();		?>
