<?php  HeadAdd();?>
<div class="all_wrapper">

<?php HeaderInclude();?>

	<main class="content" role="main">
		<div class="content__inner pages">
			<!-- NAVIGATION LINK on page-->
			<? include "includes/inc_nav-link.php"?>
			<!-- /END NAVIGATION LINK on page-->

			<!-- START page content code-->
			<div class="page page-main page--current">

			 <div class="thanks">
                <div class="thanks__inner">


                    <ul class="thanks__list">
                        <li class="thanks__item">
                            <p class="thanks__heading"><?H1page()?></p>
                        </li>
                        <li class="thanks__item">
                            <p class="thanks__caption"><?=$mes['Наш менеджер зв...']?></p>
                        </li>
                        <li class="thanks__item">
                            <a href="<?UrlAdd()?>" class="thanks__link"><?=$mes['404-mes3']?></a>
                        </li>
                    </ul>
                    <!--/END thanks__list-->

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