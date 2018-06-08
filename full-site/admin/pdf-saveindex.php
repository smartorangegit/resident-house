<?php  require_once('bd.php');
	$result = $DB->prepare("SELECT floor, 	sec, 	type, id FROM `apartments` ORDER BY id");
	
	$result->execute();
	$result->store_result();	$num=$result->num_rows;
 ?>
 
 <html>
  <head>
    <title></title>
		<script src="/js/jquery-2.1.3.min.js"></script>
  </head>
  <body>

  
    <div class="form">
	
      <input id="url" value='0 из <?=$num?>' name="url" readonly>
      <input id="offset" name="offset" value="0" type="hidden">

      <div class="progress" style="display: none;">
        <div class="bar" style="width: 0%;"></div>
      </div>

      <a href="#" id="runScript"  class="btn" data-action="run">Сгенерировать</a>
      <?/*<a href="#" id="refreshScript" class="btn" style="display: none;">Заново</a>*/?>
    </div>
  </body>
  <script>

   var Step=15;
   var Count=<?=$num?>;

   if (Step>Count) { 	Step=Count;	}
   
  function setCookie (url, offset){
    	var ws=new Date();
		if (!offset && !url) {
				ws.setMinutes(10-ws.getMinutes());
			} else {
				ws.setMinutes(10+ws.getMinutes());
			}
		document.cookie="scriptOffsetUrl="+url+";expires="+ws.toGMTString();
		document.cookie="scriptOffsetOffset="+offset+";expires="+ws.toGMTString();
	}
	
function getCookie(name) {
		var cookie = " " + document.cookie;
		var search = " " + name + "=";
		var setStr = null;
		var offset = 0;
		var end = 0;
		if (cookie.length > 0) {
			offset = cookie.indexOf(search);
			if (offset != -1) {
				offset += search.length;
				end = cookie.indexOf(";", offset)
				if (end == -1) {
					end = cookie.length;
				}
				setStr = unescape(cookie.substring(offset, end));
			}
		}
		return(setStr);
	}

function showProcess (url, sucsess, offset, action) {
		$('#url, #refreshScript').hide();
		$('.progress').show();
		//$('#runScript').text('Стоп!');
		$('.bar').text(url);
		$('.bar').css('width', sucsess * 100 + '%');
		setCookie(url, offset);

		$('#runScript').click(function(){
				document.location.href=document.location.href
			});
		
		scriptOffset(url, offset, action);
	}

function scriptOffset (url, offset, action) {
	

		$.ajax({
			url: "/modules/pdf-save/pdf-save-application.php",
			type: "POST",
			data: {
			    "action":action
			  , "url":url
			  , "offset":offset
			  , "count":Count
			  , "step":Step
			  
			 // ,"data":Data
			},
			success: function(data){
				
			
				data = $.parseJSON(data);
				if(data.sucsess < 1) {
					
					showProcess(data.post, data.sucsess, data.offset, action);
					} else {
					setCookie();
					$('.bar').css('width','100%');
					$('.bar').html('<a href="/pdf/'+data.title+'">Скачать</a>');
					$('#runScript').text('Еще');
					
					}
			}
		});
	}
	
$(document).ready(function() {
	
	var url = getCookie("scriptOffsetUrl");
	var offset = getCookie("scriptOffsetOffset");
	
	if (url && url != 'undefined') {		
			$('#refreshScript').show();
		//	$('#runScript').text('Продолжить');
			$('#url').val(url);
			$('#offset').val(offset);
		}

	
	$('#runScript').click(function() {
		
			var action = $('#runScript').data('action');
			var offset = $('#offset').val();
			var url = $('#url').val();

			$('#runScript').hide();
			
			if ($('#url').val() != getCookie("scriptOffsetUrl")) {
					setCookie();
					scriptOffset(url, 0, action);
				} else {
					scriptOffset(url, offset, action);
				}
			return false;
		});
		
	$('#refreshScript').click(function() {
		
			var action = $('#runScript').data('action');
			var url = $('#url').val();
		
			setCookie();
			scriptOffset(url, 0, action);
			return false;
		});
		
});
  
  </script>
  
  
  <style>
  input {
    font-size: 13px;
    margin: 0;
    padding: 0 3px;
    vertical-align: middle;
    border: 1px solid #CCCCCC;
    border-radius: 3px 3px 3px 3px;
    color: #808080;
    display: inline-block;
    font-size: 13px;
    height: 26px;
    line-height: 18px;
    width: 243px;
    -moz-transition: border 0.2s linear 0s, box-shadow 0.2s linear 0s;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) inset;
}

.btn {
    font-size: 13px;
    padding: 5px 8px;
    background-color: #0064CD;
    background-image: -moz-linear-gradient(center top , #049CDB, #0064CD);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    color: #FFFFFF;
    display: inline-block;
    vertical-align: middle;
    border-radius: 3px 3px 3px 3px;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
    text-decoration: none;
}

.btn:hover {
    background-position: 0 -15px;
}

.btn:active {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.25) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
}

.progress {
    font-size: 13px;
    margin: 0;
    vertical-align: middle;
    background-color: #F7F7F7;
    background-image: -moz-linear-gradient(center top , #F5F5F5, #F9F9F9);
    background-repeat: repeat-x;
    border-radius: 4px 4px 4px 4px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset;
    height: 28px;
    width: 250px;
    overflow: hidden;
    display: inline-block;
}

.progress .bar {
    background-color: #0E90D2;
    background-image: -moz-linear-gradient(center top , #149BDF, #0480BE);
    background-size: 40px 40px;
    -moz-box-sizing: border-box;
    -moz-transition: width 0.6s ease 0s;
    background-repeat: repeat-x;
    box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.15) inset;
    color: #FFFFFF;
    float: left;
    font-size: 12px;
    height: 100%;
    text-align: left;
    padding: 5px 8px;
    font-size: 13px;
    text-shadow: 1px 1px #333;
    white-space: nowrap;
}

div.form {
    margin: 150px auto 0;
    width: 500px;
}
.bar a{
    color: #fff;
    text-decoration: none;
}
  </style>
</html>