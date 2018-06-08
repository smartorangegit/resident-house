<div class="location" data-text='<?=json_encode(array('marker1'=>array('RESIDENT Concept House',$mes['adres']), 'marker2'=>array($mes['menu-sales'],$mes['adres-sales'])))?>'>
	<div class="location__inner">
		<div class="location__left">
			<div class="location__left-inner">

				<div class="location__page-heading">
					<div class="location__page-heading-top">
						<<?H1H2($mes['location-h1'])?> class="location__heading"><?=$mes['location-h1']?></<?H1H2($mes['location-h1'])?>>
					</div>
					<div class="location__page-heading-bot">
						<p class="location__caption"><?=$mes['location-subheading']?></p>
					</div>
				</div>
				<!--/END location__page-heading-->

				<div class="location__description-wrap">
					<div class="location__description">
						<p class="location__description-text"><?=$mes['location-maintext']?></p>
					</div>
				</div>
				<!--/END location__description-wrap-->

				<div class="location__list-wrap">
					<ul class="location__list">
						<li class="location__item" data-location__item="1">
							<span class="location__item-text"><?= $mes['location-address1'] ?></span>
						</li>
						<li class="location__item" data-location__item="2">
				  		<span class="location__item-text"><?= $mes['location-address2'] ?></span>
						<li class="location__item" data-location__item="3">
							<span class="location__item-text"><?= $mes['location-address3'] ?></span>
						</li>
						<li class="location__item" data-location__item="4">
							<span class="location__item-text"><?= $mes['location-address4'] ?></span>
						</li>
						<li class="location__item" data-location__item="5">
							<span class="location__item-text"><?= $mes['location-address5'] ?></span>
						</li>
						<li class="location__item" data-location__item="6">
							<span class="location__item-text"><?= $mes['location-address6'] ?></span>
						</li>
					</ul>
					<div class="location__pan-wrap">
						<a class="location__pan-btn" target="_blank" href="http://magelangis.com/Pano/resident/index.html">Панорама</a>
					</div>
				</div>
				<!--/END location__list-wrap-->

				

			</div>
		</div>
		<div class="location__right">
			<div id="map" class="location__map"></div>
		</div>
	</div>
	<!--/END location__inner-->
</div>
<!--/END location-->
