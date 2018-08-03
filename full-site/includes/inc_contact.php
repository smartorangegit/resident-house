<div class="contact">
	<div class="contact__inner">
		<div class="contact__page-heading">
			<div class="contact__page-heading-top">
			
				<<?H1H2($mes['contact-h1'])?> class="contact__heading"><?=$mes['contact-h1']?> </<?H1H2($mes['contact-h1'])?>>
			</div>
			<div class="contact__page-heading-bot">
				<p class="contact__caption"><?=$mes['У Вас виникли запитання']?></p>
			</div>
		</div>
		<!--/END contact__page-heading-->

		<div class="contact__form-wrap">

				<?php /*** modules/inc/form/ */ FormInclude('contact__form');?>
				
		</div>
		
		<?php /*** modules/inc/form/ */ FormInclude('form_rieltor');?>
		<!--/END contact__form-wrap-->


		<div class="contact__list-wrap">
			<ul class="contact__list">
				<li class="contact__item">
					<a class="contact_tel" href='tel:<?=$mes['tel']?>'><span class="contact__item-text" data-contact-text="1"><?=$mes['tel']?></span></a>
					<a class="contact__rieltors-btn"  href="#"><?=$mes['adress-rieltors']?></a>
				</li>
				<li class="contact__item">
				</li>
				<li class="contact__item">
					<p class="contact__item-caption"><?=$mes['menu-sales']?></p>
                    <span class="contact__item-text" data-contact-text="2"><?=$mes['adres-sales']?></span>
                    <p class="contact__item-caption"><?=$mes['location-mainheading']?>:</p>
                    <span class="contact__item-text" data-contact-text="2"><?=$mes['adres-contact']?></span>
				</li>
				<li class="contact__item">
					<p class="contact__item-caption"><?=$mes['i-mesService-department']?></p>
                    <span class="contact__item-text" data-contact-text="1">(044) 494 04 00</span>
                    
				</li>
				<li class="contact__item">
					<span class="contact__item-text" data-contact-text="3"><?=$mes['email']?></span>
				</li>	
			</ul>
		</div>
		<!--/END contact__list-wrap-->

	</div>
</div>
<!--/END contact-->