<div class="zag__form_wrapper form_zag" >
	<form  class="zag__form" id="form_zag">
		<h1 class="form__title"><span class="italic-text"><?=$mes['Заказать звонок']?></h1>
		<input name="name" onkeyup="javascript:countme('form_zag');" required type="text" placeholder="<?=$mes['Имя:']?>*" >
		<input class="inputemeilmask" name="email" required type="email" placeholder="<?=$mes['E-mail:']?>*" >
		<input class="inputtelmask" name="tel" required type="tel" placeholder="<?=$mes['Телефон:']?>*" >
						
		<input  name="typ" class="webad" type="hidden" value="0" >
		<input  name="webad" class="webad" type="hidden" value="<?=$webAd;?>"/>
        <input  name="metka" class="metka" type="hidden" value="Заказать звонок - kandinskiy"/>
        <input  name="inn" class="userInn" type="hidden" value="Kandinskiy"/>
		<input  class='submit' data-id='form_zag' type="submit" value="<?=$mes['Отправить']?>">
		<div class="succses__form_info">
			<p class="succses__form_text"></p>
		</div>
	</form>
</div>
