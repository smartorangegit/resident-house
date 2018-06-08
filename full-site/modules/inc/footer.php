<footer class="footer">
	<div class="footer__inner">
		<div class="footer__left">
			<p class="footer__text"><?= $mes['fut-mes1'] ?></p>
		</div>
		<div class="footer__right">
			<div class="smart">
				<div class="smart__logo-wrap">
					<div class="smart__text"><?= $mes['fut-mes2'] ?></div>
					<a href="http://smartorange.com.ua" class="smart__link">smart-link</a>
				</div>
			</div>
			<!--/END smart-->
		</div>
	</div>
	<div class="itemscope-itemtype" itemscope itemtype="http://schema.org/LocalBusiness">    
		<span itemprop="name" content="Resident Concept House"></span>    
		<span itemprop="url" content="http://resident.house"></span>    
		<span itemprop="logo" content="http://resident.house/img/logo2.svg"></span>    
		<span itemprop="telephone" content="(044) 299-47-32"></span>    
		<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">    
		<span itemprop="streetAddress" content="вул. Володимирська 86А"></span>        
		<span itemprop="addressLocality" content="Kiev"></span>       
		<span itemprop="addressCountry" content="Ukraine"></span>    </span>    
		<span itemprop="priceRange" content="$$$"></span>    
		<meta itemprop="image" content="http://resident.house/img/logo2.svg"/>
		<time itemprop="openingHours" datetime="Mo-Fr 09:00-19:00">Пн.-Пт.: 9:00-19:00</time>
		<time itemprop="openingHours" datetime="Sa-Su 10:00-18:00">Сб.-Вс.: 10:00-18:00</time>
	</div>


</footer>
<!--/END footer-->

<script id="main-form-tamplate" type="text/template">
		<?php /*** modules/inc/form/ */ FormInclude('main__form');?>
</script>

</div>
<!--/END all_wrapper-->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb1nF3LPA_ZOACIAdwgtrh0nrQd4NYybA&sensor=false"></script>
<script  src="<?scripts('js/scripts.min.js')?>"></script>
<style>
.succses__form_text-error{
	margin-top: -20px;
    font-size: 14px;
    font-family: RobotoRegular,sans-serif;
    font-style: italic;
    text-align: center;
    padding: 2px 0 10px;
	display: none;
	color:red;
	width: 100%;
}
/*.for-sale__link {
        pointer-events: none;
}*/
.navigation__tel {
    pointer-events: auto;
}
.main__bot-link{
	 pointer-events: auto;
}
.contact_tel{
	    text-decoration: none;
}
.advantage__list-wrap .slick-prev::before {
    content: '<?=$mes['назад']?>';
}
.advantage__list-wrap .slick-next::before {
	content: '<?=$mes['вперед']?>';
}



/**02-08-2018
*/
.itemscope-itemtype{
	font-size:1px;
	color: #f4ede7;
}
.home-h1{
	text-align: center;
    margin-top: -35px;
    /* font-family: EngraversGothicBold,sans-serif; */
    color: #1a212a;
	font-size: 1.1em;
    line-height: 1;
    letter-spacing: .05em;
    text-transform: uppercase;
}
.house__heading-h1{
	font-size: 4.125em;
}

/**Сторінка apartment
*/
.apartment-h1{
    font-size: 2.9em;
    line-height: 1.80;
	padding-left: 45%;
}


@media only screen and (max-width: 768px){
	.main__logo {
		top: 10%;
	}
}
@media only screen and (max-width: 600px){
	.main__logo {
		top: 0%;
	}
	.home-h1 {
    margin-top: -65px;
    font-size: 1em;
    line-height: 1;

	}
}


/**Сторінка новин
*/

.news__picture{
max-width: 450px;
    float: left;
    margin-right: 38px;
    margin-bottom: 18px;
}
.news-page__content {
      height: auto;
}
.news-page__content .news__text{
	 width: 100%;
}
.news-page__data-time-wrap{
	    width: auto;
}
.news__picture img{
	max-width:450px;
}
 @media only screen and (max-width: 1000px){
	.news__picture {
		float: none;
		margin: 0 auto;
	}
	.news__picture img{
	max-width:100%;
	}
	.news-page__bot-slider {
    height: auto;
}
.apartment-h1{

	padding-left: 0%;
}
 }

</style>
