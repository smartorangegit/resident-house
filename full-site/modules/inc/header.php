<? include('preloader_saga.php'); ?>
<div class="page-preload-wrap">
		<div class="page-preload">
			<svg width="200px"  height="200px"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-dual-ring" style="background: none;">
				<circle cx="50" cy="50" ng-attr-r="{{config.radius}}" ng-attr-stroke-width="{{config.width}}" ng-attr-stroke="{{config.c1}}" ng-attr-stroke-dasharray="{{config.dasharray}}" fill="none" stroke-linecap="round" r="35" stroke-width="1" stroke="#2b2e34" stroke-dasharray="54.97787143782138 54.97787143782138" transform="rotate(352 50 50)">
					<animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;360 50 50" keyTimes="0;1" dur="1.5s" begin="0s" repeatCount="indefinite"></animateTransform>
				</circle>
				<circle cx="50" cy="50" ng-attr-r="{{config.radius2}}" ng-attr-stroke-width="{{config.width}}" ng-attr-stroke="{{config.c2}}" ng-attr-stroke-dasharray="{{config.dasharray2}}" ng-attr-stroke-dashoffset="{{config.dashoffset2}}" fill="none" stroke-linecap="round" r="33" stroke-width="1" stroke="#f0ae76" stroke-dasharray="51.83627878423159 51.83627878423159" stroke-dashoffset="51.83627878423159" transform="rotate(-352 50 50)">
					<animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 50 50;-360 50 50" keyTimes="0;1" dur="1.5s" begin="0s" repeatCount="indefinite"></animateTransform>
				</circle>
			</svg>
		</div>
	</div>

<?
/* <div class="preload">
	<div class="preloader">
		<div class="preloader__circle-set">
			<div class="preloader__circle"></div>
			<div class="preloader__circle"></div>
			<div class="preloader__circle"></div>
			<div class="preloader__circle"></div>
			<div class="moving__circle"></div>
		</div>
		<div class="preloader__inner">
			<svg
					class="preloader-svg"
					width="320px"
					height="280px"
					viewBox="0 0 50 50"
					version="1.1"
					id="svg8">
				<defs id="defs2"/>
				<g
						id="layer1"
						fill-rule="evenodd"
						transform="translate(0,-247)"
				>
					<path
							style="stroke:none;"
							d="m -0.46772167,246.6197 51.64983267,-0.20045 -0.400904,51.11528 -51.18211129,0.0668 z M 49.971111,272.07709 A 24.780958,24.780958 0 0 1 25.190153,296.85805 24.780958,24.780958 0 0 1 0.40919495,272.07709 24.780958,24.780958 0 0 1 25.190153,247.29613 24.780958,24.780958 0 0 1 49.971111,272.07709 Z"
							id="rect12"/>
				</g>
			</svg>
			<div class="preload-parts top-part"></div>
			<div class="preload-parts left-part"></div>
			<div class="preload-parts bottom-part"></div>
			<div class="preload-parts right-part"></div>
		</div>

		<div class="moving__circle-text-wrap">
			<p class="moving__circle-text-caption">resident</p>
			<p class="moving__circle-text-descr">One and only</p>
		</div>
		<!--/END moving__circle-text-wrap-->

	</div>
</div> */ ?>

<script>
		var limit = 72 * 3600 * 1000; // 72 часа
		var localStorageInitTime = localStorage.getItem('localStorageInitTime');

		if (+new Date() - localStorageInitTime <= limit) {
			document.querySelector('.preloader').remove()
		}
	</script>
<??>
<header class="top-head" data-lang='<?UrlAdd();?>' 
<? GLOBAL $SETPAGE; if($SETPAGE=='index' || $SETPAGE=='location') {	echo 'style=" background-color: rgba(255,255,255,.5);"';	} 
					else {	echo 'style=" background-color: inherit;"';	}?>
>

	<div class="menu">
		<div class="menu__inner">

			<div class="menu-nav">
					<div class="menu-nav__inner">
						<div class="menu-nav__top-wrap">

							<div class="menu-logo">
								<div class="menu-logo__inner">
									<a href="<?UrlAdd()?>" class="menu-logo__link">
										<img src="/img/RESIDENT_logo.svg" alt="logo-icon">
									</a>
								</div>
							</div>
							<!--/END menu-logo-->

							<div class="menu-text-wrap">
								<p class="menu-text"><?=$mes['Меню']?></p>
							</div>
							<!--/END menu-text-wrap-->

							<div class="callback">
								<div class="callback__inner form-call">
									<a href="" class="callback__link"><?= $mes['menu-callback'] ?></a>
								</div>
							</div>
							<!--/END callback-wrap-->

							<div class="btn-close-wrap">
								<button class="btn-close"></button>
							</div>
							<!--/END close-btn-wrap-->

						</div>
						<!--/END menu-nav__top-wrap-->
						<div class="menu-nav__center-wrap">

							<div class="menu-nav__center-item">
								

								<!-- tut2<div class="document-info document-info-container"> -->
									<div class="about">
										<ul class="about__list">
											<li class="menu-nav__heading">
												<a class="menu-nav__main-page-link" href="<?=UrlAdd()?>"><?= $mes['menu-item1']?></a>
											</li>
											<li class="about__item">
												<a class="menu-nav__link" href="<?=UrlAdd('news')?>"><?= $mes['menu-item16'] ?></a>
											<li class="about__item">
												<a class="menu-nav__link" href="<?=UrlAdd('documents')?>"><?= $mes['menu-item15'] ?></a>
											</li>
											<?/*<li class="about__item">
												<a class="menu-nav__link" href="<?=UrlAdd('installments')?>"><?= $mes['Розстрочка'] ?></a>
											</li>*/?>
										</ul>
									</div>

									<div class="about">
									<ul class="about__list">
										<li class="menu-nav__heading">
											<?= $mes['menu-heading1']?>
										</li>
										<li class="about__item">
											<a class="menu-nav__link" href="<?=UrlAdd('architecture')?>"><?= $mes['menu-item4'] ?></a>
										</li>
										<li class="about__item">
											<a class="menu-nav__link" href="<?=UrlAdd('advantage')?>"><?= $mes['menu-item5'] ?></a>
										</li>
										<li class="about__item">
											<a class="menu-nav__link" href="<?=UrlAdd('values')?>"><?= $mes['menu-item7'] ?></a>
										</li>
										<li class="about__item">
											<a class="menu-nav__link" href="<?=UrlAdd('atmosfera')?>">SFERA Living System</a>
										</li>
									</ul>
								</div>

								<!-- tut2</div> -->

								<!--/END about-->
							</div>
							<!--/END menu-nav__center-item-->

							<div class="menu-nav__center-item">
								<div class="apartment">
									<ul class="apartment__list">
										<li class="menu-nav__heading"><?= $mes['menu-heading3'] ?></li>
										<li class="apartment__item">
											<a class="menu-nav__link" href="<?=UrlAdd('apartment')?>"><?= $mes['menu-item3'] ?></a>
										</li>
										<li class="apartment__item">
											<a class="menu-nav__link" href="<?=UrlAdd('parameters')?>"><?= $mes['За параметрами'] ?></a>
										</li>
										<li class="apartment__item">
											<a class="menu-nav__link" href="<?=UrlAdd('parameters/odnokomnatnaya')?>"><?= $mes['menu-item9'] ?></a>
										</li>
										<li class="apartment__item">
											<a class="menu-nav__link" href="<?=UrlAdd('parameters/dvuhkomnatnaya')?>"><?= $mes['menu-item10'] ?></a>
										</li>
										<li class="apartment__item">
											<a class="menu-nav__link" href="<?=UrlAdd('parameters/trehkomnatnaya')?>"><?= $mes['menu-item11'] ?></a>
										</li>
										<li class="apartment__item">
											<a class="menu-nav__link" href="<?=UrlAdd('parameters/chetirehkomnatnaya')?>"><?= $mes['menu-item12'] ?></a>
										</li>
									</ul>
								</div>
								<!--/END apartment-->
							</div>
							<!--/END menu-nav__center-item-->

							<div class="menu-nav__center-item">

							<div class="project">
								<ul class="project__list">
									<!-- <li class="menu-nav__heading">ХІД ПРОЕКТУ:</li> -->
									<li class="menu-nav__heading"><?= $mes['menu-heading2']?></li>
									
									<li class="project__item">
										<a class="menu-nav__link" href="<?=UrlAdd('web-camera')?>"><?= $mes['menu-webcam'] ?></a>
									</li>
									<li class="project__item">
										<a class="menu-nav__link" href="<?=UrlAdd('manager')?>"><?= $mes['menu-developers'] ?></a>
									</li>
									<li class="project__item">
										<a class="menu-nav__link" href="<?=UrlAdd('construction')?>"><?= $mes['menu-item17'] ?></a>
									</li>
		
				
								</ul>
							</div>

							<ul class="document-info__list">
								<li class="menu-nav__heading"><?=$mes['menu-heading3-1']?></li>
								<li class="document-info">
									<a class="menu-nav__link" href="<?=UrlAdd('contact')?>"><?= $mes['menu-item8'] ?></a>
								</li>
								<li class="document-info">
									<a class="menu-nav__link" href="<?=UrlAdd('location')?>"><?= $mes['menu-item6'] ?></a>
								</li>
							</ul>
								

								<!--/END about-->
							</div>
							<!--/END menu-nav__center-item-->

							<!--tut  <div class="menu-nav__center-item">
								<div class="for-sale">
									<ul class="for-sale__list">
										<li class="menu-nav__heading"><?= $mes['menu-sales'] ?></li>
										<li class="for-sale__item" data-main__bot-item="1">
											<a href="<?=UrlAdd('location')?>" class="for-sale__link"><?=$mes['adres-sales']?></a>
										</li>
										<li class="for-sale__item" data-main__bot-item="3">
											<a href="tel:<?=$mes['tel']?>" class="for-sale__link"><?=$mes['tel']?></a>
										</li>
									</ul>
									<ul class="fo-sale__list">
										<li class="menu-nav__heading"><?=$mes['menu_sales_time_heading']?></li>
										<li class="for-sale__item">
											<span class="for-sale__link"><?=$mes['menu_sales_time_mon-fri']?></span>
										</li>
										<li class="for-sale__item">
											<span class="for-sale__link"><?=$mes['menu_sales_time_sat-sun']?></span>
										</li>
									</ul>
								</div> tut -->
								<!--/END for-sale-->

								<!--tut <div class="for-sale">
									<ul class="for-sale__list">
										<li class="menu-nav__heading"><?=$mes['розташування жк']?>:</li>
										<li class="for-sale__item" data-main__bot-item="1">
											<a href="#" class="for-sale__link"><?=$mes['adres']?></a>
										</li>
										<li class="for-sale__item" data-main__bot-item="2">
											<a href="#" class="for-sale__link"><?=$mes['Льва Толстого']?></a>
										</li>
									</ul>
								</div> tut -->
								<!--/END for-sale-->
							<!-- </div> tut -->
							<!--/END menu-->
						</div>
						<!--/END menu-nav__center-wrap-->
					</div>
					<!--/END menu-nav__inner-->
				</div>
				<!--/END menu__nav-->

<?/*
			<div class="menu__nav">
				<div class="top-menu">
					<div class="top-menu__inner">
						<div class="top-menu__list-wrap">
							<div class="top-menu__list">

								<div class="menu-logo">
									<div class="menu-logo__inner">
										
									</div>
								</div>

								<div class="about">
									
								</div>
								<!--/END about-->

								<div class="project">
									
								</div>
								<!--/END project-->

								<div class="close-btn-wrap">
									<div class="close-btn">
										<h1></h1>
										<button class="btn-close"></button>
									</div>
								</div>
								
								
<?/*
								<div class="apartment">
									<h2 class="apartment__heading"><?= $mes['menu-heading3'] ?></h2>
									<ul class="apartment__list">
										<li class="apartment__item"><a class="apartment__link" href="<?=UrlAdd('404')?>"><?= $mes['menu-item9'] ?></a>
										</li>
										<li class="apartment__item"><a class="apartment__link" href="<?=UrlAdd('404')?>"><?= $mes['menu-item10'] ?></a>
										</li>
										<li class="apartment__item"><a class="apartment__link" href="<?=UrlAdd('404')?>"><?= $mes['menu-item11'] ?></a>
										</li>
										<li class="apartment__item"><a class="apartment__link" href="<?=UrlAdd('404')?>"><?= $mes['menu-item12'] ?></a>
										</li>
									</ul>
									<ul class="apartment__list">
										<li class="apartment__item"><a class="apartment__link" href="<?=UrlAdd('404')?>"><?= $mes['menu-item13'] ?></a>
										</li>
										<li class="apartment__item"><a class="apartment__link" href="<?=UrlAdd('404')?>"><?= $mes['menu-item14'] ?></a>
										</li>
										<li class="apartment__item"><a class="apartment__link" href="<?=UrlAdd('404')?>"><?= $mes['menu-item15'] ?></a>
										</li>
									</ul>
								</div>
								<!--/END apartment-->
*/?>
								
								<!--/END for-sale-->
<?/*
								<div class="callback-wrap form-call">
									<div class="callback">
										<div class="callback__inner">
											<i class="icon top-menu-icon"></i>
											<span class="callback__text"></span>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

				</div>
			</div>
*/?>


			<div class="shape-wrap">
				<!-- <svg class="shape" width="100%" height="100vh" preserveAspectRatio="none" viewBox="0 0 1440 800"
					 xmlns:pathdata="http://www.codrops.com/">
					<path
							d="M -65.11,-1.008 C -38.79,8.492 -48.8,43.89 -24.09,59.91 -17.38,64.25 -7.411,68.1 2.397,67.74 19.94,67.09 30.89,61.16 46.62,50.39 64.99,37.82 92.16,36.57 112.8,41.49 141.9,48.44 153.5,80.16 178.5,78.34 194.6,77.17 205.3,67.96 216.8,48.87 224.6,35.89 230.6,20.21 251.4,19.41 278.8,18.35 288.2,28.98 298.5,67.48 303.6,86.48 308.2,97.24 316.3,102.6 329.4,111.3 340.7,106 350.5,100.2 377.5,84.13 369.6,23.41 401.2,20.7 415.9,19.43 431.7,33.86 449.9,57.07 462.7,73.41 475.5,91.96 494.9,96.72 503.8,98.9 513,97.38 521.6,90.13 532.1,81.21 532.2,62.36 551.7,62.17 565.7,62.03 569.6,72.01 575.9,89 580.5,101.3 598.1,139.1 628.6,117.5 649.1,103 641.6,81.95 658,80.67 674.4,79.39 692.2,136.3 720.8,141.4 738.9,144.6 763.5,132 771.2,119.3 782.1,101.2 783.6,81.7 799.1,81.97 829.3,82.49 818.2,122.8 838.2,143.8 858.1,164.8 875.7,158.9 886.4,155.8 910.4,149 913.1,122.8 939.2,119.6 953.9,117.9 964.8,130.2 979.7,131.6 997.3,133.3 1016,132.6 1027,121 1038,109.3 1038,80.15 1054,79.92 1071,79.67 1073,89.94 1079,106.8 1084,119.5 1089,133.9 1101,141.1 1111,147.3 1124,146.3 1136,145 1150,143.4 1160,132.7 1177,130.8 1194,128.8 1219,128.2 1236,138.8 1257,151.6 1271,147.7 1280,137.3 1291,124.1 1294,92.34 1316,90.47 1344,88.04 1348,163.9 1380,183.1 1401,195.1 1428,196.6 1451,190.6 1478,183.7 1503,161.8 1518,143 1544,109.1 1550,43.89 1551,32.49 1568,-303.4 -510,-224.1 -65.11,-1.008 Z"
							pathdata:id="M -35.73,45.41 C -9.412,61.01 -30.93,379.4 -17.31,545.8 -12.26,607.5 -54.94,740.4 6.142,730.1 63.67,720.4 26.97,284.9 27.01,202.3 27.06,104.3 51.66,29.07 106,54.36 160.3,79.65 103.7,491.7 187.7,465.7 231.9,452 156.6,99.89 249.4,94.08 285.7,91.81 299.9,127.5 305,190.9 316,327.7 328.6,462.6 321.1,598.3 315.8,695.4 294.5,776.7 353.9,773.6 415.6,770.4 379.8,650.7 368.7,588.8 337.4,415 369.6,190.1 391.1,111 412.5,31.92 457,96.83 463.3,127.2 480.9,212.1 493.9,307.8 489,396.1 487.4,425.7 482.1,460.1 517.1,455.2 548.5,450.7 476.2,166 550.9,168.9 594.8,170.6 591.6,626.8 586.3,663.5 578.4,717.8 609.1,742.4 633.9,700.6 651.9,670.2 578.3,209.7 650.8,194.1 723.2,178.5 700.8,277.9 687.6,401.1 680.2,470 766.1,486.3 756,414.3 750.3,373.5 703.1,145.6 793.4,146.1 939.9,146.8 846.2,556.8 844,601.8 841.9,646.8 878.6,682.8 903.3,630.6 928,578.4 863.2,264.8 891.7,178.8 920.2,92.81 997.3,215.6 972,292.8 946.6,370 1030,353.1 999,295.7 985.9,271.6 977.1,119.1 1048,117.8 1119,116.5 1127,634.6 1123,682.6 1119,730.6 1110,749.8 1118,771.3 1134,815.5 1173,803.5 1164,734 1155,664.5 1139,665.8 1143,418.4 1148,170.9 1225,122 1240,215 1249,273 1202,413 1282,391.7 1324,380.7 1280,165.5 1316,159.6 1362,152 1296,358.2 1379,361.2 1462,364.2 1312,753 1444,751.2 1592,749.2 1484,458.5 1505,312.2 1518,221.3 1544,58.44 1545,39.57 1562,-514.4 -480.6,-322.6 -35.73,45.41 Z"></path>
				</svg> -->
			</div>
		</div>
	</div>

	<div class="top-head__inner">

		<div class="top-head__left">
			<a href="<?=UrlAdd()?>" class="top-head__logo">
				<img src="/img/logo2.svg" alt="logo-icon">
			</a>
		</div>

		<div class="top-head__right" style="position: relative;">
			<a href="http://saga-development.com.ua/" class="saga-logo <?if(count(explode("/", $_SERVER['REQUEST_URI']))>2){echo 'saga_logo_off';}?>" target="_blank">
			  <img src="/img/manager/saga-logo.svg">
			</a>
			<nav class="navigation">
				<ul class="navigation__list">

					<li class="navigation__item" data-nav-item="tel">
						<a  href="tel:<?=$mes['tel']?>" class="navigation__tel"><?= $mes['tel'] ?></a>
					</li>
					<!--/END navigation__item-->


	<?php 
				/** Прибираєм плашку мови, якщо в config.php $len='' */
							?>
					<li class="navigation__item">
						<? if ($len){  ?>
						<div class="lang">

							<ul class="lang__list">
								<li class="lang__item" data-nav-item="1">
									<a class="lang__link" ><?=$mes['fut-mes4']?></a>
								</li>
							<?  
							
							GLOBAL $LANG, $SETPAGE;
							$LANGS=$len;	$LANGS[]=$len_default; 
							
							$correct_mas=explode("/", $_SERVER['REQUEST_URI']);
							
							if ($LANG==$len_default) {	$t_LANG='/';	}
							else {	$t_LANG='/'.$LANG;	}
							
																foreach ($LANGS as $t){
										if ($t==$mes['fut-mes3']) {	continue;	}
										
										$mes_t = parse_ini_file('modules/language/'.$t.'.ini'); ;
										$tHref='/'.$t.'/';	
										if ($t==$len_default) {$t=$len_default; $tHref='/';}
															
								
								if(in_array($correct_mas[1], $LANGS, true)) {		

									$Href=str_replace('/'.$correct_mas[1].'/', $tHref, $_SERVER['REQUEST_URI']);
							
								} else {
									
									$Href='/'.$t.$_SERVER['REQUEST_URI'];
								}
									if ($SETPAGE=='news-open') {	$Href=$tHref.'news/';	}
										
										
									echo '
									<li class="lang__item">
										<a class="lang__link" data-nav-item="2" href="'.$Href.'">'.$mes_t['fut-mes4'].'</a>
									</li>';
									
									}
																
								?>

							</ul>

						</div>
						<!--/END lang-->
								<?} /***/ ?>
					</li>
			

					<li class="navigation__item" id="form-call" data-tel-link="pc">
						<a href="#" class="navigation__link">
							<i class="phone-icon"></i>
							<!--заказать звонок-->
						</a>
					</li>
					<li class="navigation__item" data-tel-link="mob">
						<a href="tel:<?=$mes['tel']?>1" class="navigation__link">
							<i class="phone-icon"></i>
							<!--заказать звонок-->
						</a>
					</li>

					<li class="navigation__item">
						<a href="<?=UrlAdd('location')?>" class="navigation__link">
							<i class="map-icon"></i>
							<!--карта-->
						</a>
					</li>
					<li class="navigation__item">
						<a href="<?=UrlAdd('contact')?>" class="navigation__link">
							<i class="mail-icon"></i>
							<!--почта-->
						</a>
					</li>
					<li class="navigation__item" id="menu-btn">
						<a href="#" class="navigation__link">
							<i class="menu-icon"></i>
							<p class="navigation__link-text"><?=$mes['Меню']?></p>
						</a>
					</li>
				</ul>
			</nav>
		</div>

	</div>
	<!--/END top-head__inner-->
</header>
<style>
.saga-logo {
    position: absolute;
    top: -12px;
    left: 20%;
    display: block;
    width: 60px;
    z-index: 40;
    text-align: center;
    overflow: hidden;
}
@media screen and (max-width: 1220px){
	.saga-logo {
		left: -32px;
	}
}
@media screen and (max-width: 565px){
	.saga-logo {
		top: 37px;
		left: 63%;
	}
	.saga_logo_off {display:none;}
}

</style>
<!--/END top-head-->