<form action="" class="contact__form" id='contact__form'>
				<input class="contact__form-input" onkeyup="javascript:countme('contact__form');" name="name" type="text" placeholder="<?=$mes['Імя:']?>">
				<input class="contact__form-input" name="tel" type="tel" placeholder="<?=$mes['Телефон:']?>">
				<input class="contact__form-input"  name="email" type="email" placeholder="<?=$mes['E-mail:']?>">
				<textarea style='margin-bottom: 25px;' class="contact__message" name="text"  placeholder="<?=$mes['Повідомлення:']?>"></textarea>
							<p class='succses__form_text-error'><?=$mes['Заповніть E-mail']?></p>
				
					<input  name="typ" class="webad" type="hidden" value="1" >
					<input  name="webad" class="webad" type="hidden" value="<?=$webAd;?>"/>
					<input  name="metka" class="metka" type="hidden" value="Форма зворотнього зв'язку  - resident.house"/>
					<input  name="inn" class="userInn" type="hidden" value="Resident"/>
								
	<div class="succses__form_info">
		<p class="succses__form_text"></p>
	</div>
					<input class="contact__form-btn"  data-id='contact__form' type="submit" value="<?=$mes['Надіслати']?>">
			</form>