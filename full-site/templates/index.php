<?php  HeadAdd();?>        
<div class="all_wrapper">
                            
<?php HeaderInclude();?>     

	<main class="content" role="main">
		<div class="content__inner pages">
			<!-- NAVIGATION LINK on page--> 
			<?/* include "includes/inc_nav-link.php"*/?>
			<!-- /END NAVIGATION LINK on page--> 

			<!-- START page content code-->
			<div class="page page-main page--current">

				<? include "includes/inc_index.php"?> 

			</div>
			<!--<div class="page page-bottom">-->

				<?/* include "includes/inc_advantage.php"?>

			</div>
			<div class="page page-left">

				<? include "includes/inc_location.php" ?>

			</div>
			<div class="page page-right" id='apartments'>

			<? include "includes/inc_rooms-page.php"*/?>

			<!--</div>-->
			<!--/END page content code-->

		</div>
		<!--/END content__inner-->
	</main>
	<!--/END content-->
	
	
	
<?php	 FooterAdd();		?>
<!-- timer -->
 <div class="modal_window__container" style="display:none;">
			<div class="modal_window">
			<div class="modal_window__main-content">
					<span class="modal__close">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="40" height="40">
							<path d="M37.304 11.282l1.414 1.414-26.022 26.02-1.414-1.413z" fill="#E0A46B"/><path d="M12.696 11.282l26.022 26.02-1.414 1.415-26.022-26.02z" fill="#E0A46B"/>
						</svg>
					</span>
				<div id="clock" class="clearfix"><p class="text_timer"><?=$mes['text_timer']?></p>
					<div><?=$mes['timer-days']?><span class="days">00</span></div>
					<div><?=$mes['timer-hours']?><span class="hours">00</span></div>
					<div><?=$mes['timer-minutes']?><span class="minutes">00</span></div>
					<div><?=$mes['timer-seconds']?><span class="seconds">00</span></div>
				</div>
				<div class="modal_window__link"></div>
			</div>
    </div>
	<style>
  .modal_window__container{
    position: fixed;
    background: rgba(0,0,0,0.5);
    width: 100%;
    height: 100%;
    z-index: 5555;
  }
  .modal_window {
      max-width: 432px;
      width: 100%;
      position: fixed;
      background: #ded4d3;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
  }
#clock {
    margin:0px auto;
    width:100%;
    padding:20px 20px 20px 10px;
    position:relative;
   	padding: 20px;
		font-family: inherit;
		box-sizing:border-box;
		font-size: 20px;
		pointer-events: none;
    text-align: center;
	}
#clock div {
  margin: 5px;
  display: inline-block;
  width:20%;
	text-align:center;
}
#clock div span {
    display:block;
    width: 100%;
    background:#000;
    border:#E0A46B 2px solid;
    color:#eee;
    text-align: center;
    font-size: 40px;
    line-height: 60px;
    letter-spacing: 2pt;
	margin-top: 2px;
}
.modal__close {
  position: absolute;
  right: 0;
  top: 0px;
  color: #aaa;
  font-weight: bold;
	cursor: pointer;
}
.modal_window {
	max-width: 432px;
}
.text_timer {
	text-align: center;
	font-size: 24px;
	padding: 10px 0px;
}
	</style>
		<script type="text/javascript">
		        var deadline = 'April 19 2018';
				var t = getTimeRemaining(deadline);
		        function getTimeRemaining(endtime){
		      var t = Date.parse(endtime) - Date.parse(new Date());
		      var seconds = Math.floor( (t/1000) % 60 );
		      var minutes = Math.floor( (t/1000/60) % 60 );
		      var hours = Math.floor( (t/(1000*60*60)) % 24 );
		      var days = Math.floor( t/(1000*60*60*24) );
		      return {
		       'total': t,
		       'days': days,
		       'hours': hours,
		       'minutes': minutes,
		       'seconds': seconds
		      };
		    }
		function initializeClock(id, endtime){
		 var clock = document.getElementById(id);
		  var daysSpan = clock.querySelector('.days');
		  var hoursSpan = clock.querySelector('.hours');
		  var minutesSpan = clock.querySelector('.minutes');
		  var secondsSpan = clock.querySelector('.seconds');
		 var timeinterval = setInterval(function(){
			 t = getTimeRemaining(deadline);
			daysSpan.innerHTML = t.days;
		  hoursSpan.innerHTML = t.hours;
		  minutesSpan.innerHTML = t.minutes;
		  secondsSpan.innerHTML = t.seconds;

		  
		 },1000);
		 if(t.total<=0){
			  clearInterval(timeinterval);
		  }else{ 
				var elem = document.getElementsByClassName("modal_window__container")[0];
				elem.style.cssText = 'display:block;';

		  } 
		}
initializeClock('clock', deadline);


</script>
</div>
		<!-- end timer -->
<script type="text/javascript">
$('.modal__close').click(function(){
  $('.modal_window__container').fadeOut(1000)
})

</script>