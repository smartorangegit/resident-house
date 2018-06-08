<?php  HeadAdd();?>
<div class="all_wrapper">

	<?php HeaderInclude();?>

	<main class="content" role="main">
		<div class="content__inner pages">

			<!-- NAVIGATION LINK on page-->
			<?/* include "includes/inc_nav-link.php"*/?>
			<!-- /END NAVIGATION LINK on page-->

			<!-- START page content code-->
			<div class="page page--current page-main">
				<? include "includes/inc_manager.php"?>
			</div>
			<?/*
			<div class="page page-bottom">
				<? include "includes/inc_advantage.php"?>
			</div>
				<div class="page page-left">
				<? include "includes/inc_location.php"?>
			</div>
			<div class="page page-right">
				<? include "includes/inc_rooms-page.php"?>
			</div>*/?>
			<!--/END page content code-->



		</div>
		<!--/END content__inner-->
	</main>
	<!--/END content-->

<!-- ======section video======= -->
    <div class="video_container">
      <div class="video__box">
        <video class="video_desk" autoplay loop muted class="main-video-bg">
          <source src="/video/SAGA_FULL.mp4" type="video/mp4">
        </video>
        <video  class="is__mobile" src="/video/SAGA_FULL_mob.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"' playsinline loop muted autoplay controls></video>
      </div>
      <div class="sound">
        <img id="sound_on" onclick="sound_off ()" src="/img/sound_on.svg" style="display:none;">
        <img id="sound_off" onclick="sound_on ()" src="/img/sound_off.svg" style="display:block;">
      </div>
    <!--  <div class="arrow_dance">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" fill="#D6BBA7" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
        <g><path d="M500,755.9L14.7,270.6c-6.2-6.2-6.2-15.6,0-21.8c6.2-6.2,15.6-6.2,21.8,0L500,712.3l463.6-463.6c6.2-6.2,15.6-6.2,21.8,0c6.2,6.2,6.2,15.6,0,21.8L500,755.9z"/></g>
        </svg>

      </div>-->
      <style media="screen">
  .header { background: rgba(255, 0, 11, 1);}
	.video_container{position: relative;}
	.is__mobile{display: none;}
	video{
		width: 100%;
		margin-bottom: -3px;
    }
	.sound{
		position: absolute;
		left: 30px;
		top: 90%;
		margin-top: -100px;
	}
	.sound img{  width: 40px;}
	.arrow_dance{
		width: 60px;
		position: absolute;
		left: 50%;
		top: 90%;
		margin-top: -100px;
		margin-left: -30px;
		-webkit-animation: bounce 2s infinite;
		animation: bounce 2s infinite;
	}
	@-webkit-keyframes bounce {
		 0%, 20%, 50%, 80%, 100% {-webkit-transform: translateY(0);
			 transform: translateX(0);}
		 40% {-webkit-transform: translateY(-30px);
			 transform: translateY(-30px);}
		 60% {-webkit-transform: translateY(-15px);
			 transform: translateY(-15px);}
	 }
	 @-moz-keyframes bounce {
		 0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
		 40% {transform: translateY(-30px);}
		 60% {transform: translateY(-15px);}
	 }
	 @keyframes bounce {
		 0%, 20%, 50%, 80%, 100% {-ms-transform: translateY(0);
			 transform: translateY(0);}
		 40% {-ms-transform: translateY(-30px);
			 transform: translateY(-30px);}
		 60% {-ms-transform: translateY(-15px);
			 transform: translateY(-15px);}
	 }
 @media only screen and (min-width: 1368px) {
		 video{width: 100%;}
	 }
@media only screen and (max-width: 768px) {
		.video_container{
			/* margin-top: 350px; */
			height: auto;
		}
		.is__mobile{
			display: block;
			width: 100%;
			height: auto;
		}
		.video_desk{display: none;}
		.sound{display: none;}
		.arrow_dance{display: none;}
		video{margin: 0;}
	}
      </style>
      <script>

      function sound_on () {
        var video = document.querySelector("video");
        var sound_on = document.getElementById("sound_on");
        var sound_off = document.getElementById("sound_off");
        video.removeAttribute("muted");
        video.muted = false;
        sound_on.setAttribute("style", "display:block;");
        sound_off.setAttribute("style", "display:none;");
        }
      function sound_off () {
        var video = document.querySelector("video");
        var sound_on = document.getElementById("sound_on");
        var sound_off = document.getElementById("sound_off");
        video.muted = true;
        sound_on.setAttribute("style", "display:none;");
        sound_off.setAttribute("style", "display:block;");
        }



      </script>

    </div>

    <!-- ======end section video======= -->
<?php	 FooterAdd();		?>
