<div class="main-form">
		<form id="main__form">
			<p class="main-form__title"><?=$mes['Замовити дзвінок']?></p>
			<label class="form-required"><input onkeyup="javascript:countme('main__form');"  name="name" class="form__field"  type="text" placeholder="<?=$mes['Імя:']?>" class="vissible"></label>
			<label class="form-required"><input class="form__field inputtelmask" name="tel" type="tel" placeholder="<?=$mes['Телефон:']?>"></label>
			<label class="form-required"><input class="form__field" name="email" type="email" placeholder="<?=$mes['E-mail:']?>"></label>
			<p class='succses__form_text-error'><?=$mes['Заповніть E-mail']?></p>
	

	
				<input  name="typ" class="webad" type="hidden" value="0" >
				<input  name="webad" class="webad" type="hidden" value="<?=$webAd;?>"/>
				<input  name="metka" class="metka" type="hidden" value="Замовити дзвінок - resident.house"/>
				<input  name="inn" class="userInn" type="hidden" value="Resident"/>
		
	<div class="succses__form_info">
		<p class="succses__form_text"></p>
	</div>
			<input class="submit vissible" data-id='main__form' type="submit" value="<?=$mes['Надіслати']?>">
		</form>
	</div>