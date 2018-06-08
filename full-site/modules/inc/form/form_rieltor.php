<script id="booking-form_rieltor" type="text/template">	<div class="main-form">
		<form id="form_rieltor">
			<p class="main-form__title"><?=$mes['adress-rieltors']?></p>

			<label class="form-required"><input  name="name_an" class="form__field"  type="text" placeholder="<?=$mes['НазваАН:']?>" class="vissible"></label>

			<label class="form-required"><input onkeyup="javascript:countme('form_rieltor');"  name="name" class="form__field"  type="text" placeholder="<?=$mes['Імя:']?>" class="vissible"></label>

			<label class="form-required"><input class="form__field" name="email" type="email" placeholder="<?=$mes['E-mail:']?>"></label>

			<label class="form-required"><input class="form__field inputtelmask" name="tel" type="tel" placeholder="<?=$mes['Телефон:']?>"></label>

			<label ><input class="form__field" name="text" type="text" placeholder="<?=$mes['Повідомлення:']?>"></label>
		
			<p class='succses__form_text-error'><?=$mes['Заповніть E-mail']?></p>
	

	
				<input  name="typ" class="webad" type="hidden" value="8" >
				<input  name="webad" class="webad" type="hidden" value="<?=$webAd;?>"/>
			  <input  name="metka" class="metka" type="hidden" value="Сотрудничество для риелторов - Resident House"/>
				<input  name="inn" class="userInn" type="hidden" value="Resident"/>
		
	<div class="succses__form_info">
		<p class="succses__form_text"></p>
	</div>
			<input class="submit vissible" data-id='form_rieltor' type="submit" value="<?=$mes['Надіслати']?>">
		</form>
	</div>			
	</script>		