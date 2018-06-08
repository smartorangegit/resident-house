<script id="price-form-tamplate" type="text/template">
<div class="main-form">
		<form id="price_form">
			<p class="main-form__title"><?=$mes['Дізнатися ціну']?></p>
			<label class="form-required"><input onkeyup="javascript:countme('price_form');"  name="name" class="form__field"  type="text" placeholder="<?=$mes['Імя:']?>" class="vissible"></label>
			<label class="form-required"><input class="form__field inputtelmask" name="tel" type="tel" placeholder="<?=$mes['Телефон:']?>"></label>
			<label class="form-required"><input class="form__field" name="email" type="email" placeholder="<?=$mes['E-mail:']?>"></label>
						<p class='succses__form_text-error'><?=$mes['Заповніть E-mail']?></p>
				<label ><textarea class="contact__message" name="text"  placeholder="<?=$mes['Повідомлення:']?>"></textarea></label>
			
			<input name="kv" value='<?=$kv?>' type="hidden"  type="text" >
				<input  name="typ" class="webad" type="hidden" value="21" >
				<input  name="webad" class="webad" type="hidden" value="<?=$webAd;?>"/>
				<input  name="metka" class="metka" type="hidden" value="Дізнатися ціну - resident.house"/>
				<input  name="inn" class="userInn" type="hidden" value="Resident"/>
		 
	<div class="succses__form_info">
		<p class="succses__form_text"></p>
	</div>
			<input class="submit vissible" data-id='price_form' type="submit" value="<?=$mes['Надіслати']?>">
		</form>
	</div>
</script>
	
<script id="booking-form-tamplate" type="text/template">	
<div class="main-form">
		<form id="booking_form">
			<p class="main-form__title"><?=$mes['Забронювати']?></p>
			<label class="form-required"><input onkeyup="javascript:countme('booking_form');"  name="name" class="form__field"  type="text" placeholder="<?=$mes['Імя:']?>" class="vissible"></label>
			<label class="form-required"><input class="form__field inputtelmask" name="tel" type="tel" placeholder="<?=$mes['Телефон:']?>"></label>
			<label class="form-required"><input class="form__field" name="email" type="email" placeholder="<?=$mes['E-mail:']?>"></label>
						<p class='succses__form_text-error'><?=$mes['Заповніть E-mail']?></p>
			<label ><textarea class="contact__message" name="text"  placeholder="<?=$mes['Повідомлення:']?>"></textarea></label>
			
			<input name="kv" value='<?=$kv?>' type="hidden"  type="text" >
				<input  name="typ" class="webad" type="hidden" value="2" >
				<input  name="webad" class="webad" type="hidden" value="<?=$webAd;?>"/>
				<input  name="metka" class="metka" type="hidden" value="Забронювати квартиру - resident.house"/>
				<input  name="inn" class="userInn" type="hidden" value="Resident"/>
		
	<div class="succses__form_info">
		<p class="succses__form_text"></p>
	</div>
			<input class="submit vissible" data-id='booking_form' type="submit" value="<?=$mes['Забронювати']?>">
		</form>
	</div>	
	
</script>


<?/*
<div class="zag__form_wrapper form_price" >
					<form  class="zag__form" id="form_price">
						<h1 class="form__title"><span class="italic-text"><?=$mes['Узнать цену']?></h1>
						<input name="name" onkeyup="javascript:countme('form_price');" required type="text" placeholder="<?=$mes['Имя:']?>*" >
						<input class="inputemeilmask" name="email" required type="email" placeholder="<?=$mes['E-mail:']?>*" >
						<input class="inputtelmask" name="tel" required type="tel" placeholder="<?=$mes['Телефон:']?>*">
						<input name="kv" value='<?=$kv?>' type="hidden"  type="text" >
						<?if(empty($kv)){ 	echo '<input  name="text" type="text" placeholder="'.$mes['Текстовое сообщение:'].'">';}?>
							
		<input  name="typ" class="webad" type="hidden" value="21" >
		<input  name="webad" class="webad" type="hidden" value="<?=$webAd;?>"/>
        <input  name="metka" class="metka" type="hidden" value="Узнать цену - kandinskiy"/>
        <input  name="inn" class="userInn" type="hidden" value="Kandinskiy"/>
		
				
						<input  class='submit' data-id='form_price' type="submit" value="<?=$mes['Отправить']?>">
							<div class="succses__form_info">
		<p class="succses__form_text"></p>
	</div>
					</form>
</div>

<div class="zag__form_wrapper form_booking" >
					<form  class="zag__form" id="form_booking">
						<h1 class="form__title"><span class="italic-text"><?=$mes['Забронировать квартиру']?></h1>
						<input name="name" onkeyup="javascript:countme('form_booking');" required type="text" placeholder="<?=$mes['Имя:']?>*" >
						<input class="inputemeilmask" name="email" required type="email" placeholder="<?=$mes['E-mail:']?>*" >
						<input class="inputtelmask" name="tel" required type="tel" placeholder="<?=$mes['Телефон:']?>*">
						<input name="kv" value='<?=$kv?>' type="hidden" type="text">
						
		<input  name="typ" class="webad" type="hidden" value="2" >
		<input  name="webad" class="webad" type="hidden" value="<?=$webAd;?>"/>
        <input  name="metka" class="metka" type="hidden" value="Забронировать квартиру - kandinskiy"/>
        <input  name="inn" class="userInn" type="hidden" value="Kandinskiy"/>
		
						<input  class='submit' data-id='form_booking' type="submit" value="<?=$mes['Отправить']?>">
	<div class="succses__form_info">
		<p class="succses__form_text"></p>
	</div>
					</form>
</div>*/?>