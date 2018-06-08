$(function () {

    // 'use strict'

    var DOM = {}
    DOM.menu = document.querySelector('.menu')
    DOM.intro = document.querySelector('.menu__inner')
    DOM.shape = DOM.intro.querySelector('svg.shape')
    DOM.path = DOM.shape.querySelector('path')
    DOM.enter = document.querySelector('#menu-btn')
    DOM.close = document.querySelector('.btn-close')

// Set the SVG transform origin.
    DOM.shape.style.transformOrigin = '50% 0%'

    var init = function init() {
        //imagesLoaded(document.body, {background: true} , () => document.body.classList.remove('loading'));
        DOM.enter.addEventListener('click', navigate)
        DOM.close.addEventListener('click', menuClose)
        DOM.enter.addEventListener('touchenter', navigate)
    }

	var loaded = void 0
	var path = DOM.path.getAttribute('d')
	var pathdata = DOM.path.getAttribute('pathdata:id')
	var navigate = function navigate () {

		loaded = true
		DOM.menu.style.display = 'block'
		anime({
			targets: DOM.intro,
			duration: 1200,
			easing: 'easeInOutSine',
			translateY: '130%'
		})

		anime({
			targets: DOM.shape,
			scaleY: [{value: [0.8, 1.8], duration: 650, easing: 'easeInQuad'}, {
				value: 1,
				duration: 650,
				easing: 'easeOutQuad'
			}]
		})

		anime({
			targets: DOM.path,
			duration: 1200,
			easing: 'easeOutQuad',
			d: pathdata
		})

	}
	var menuClose = function navigate () {

		setTimeout(function () {
			DOM.menu.style.display = 'none'
		}, 1300)
		anime({
			targets: DOM.intro,
			duration: 1200,
			easing: 'easeInOutSine',
			translateY: '0'
		})

		anime({
			targets: DOM.shape,
			scaleY: [{value: [0.8, 1.8], duration: 550, easing: 'easeInQuad'}, {
				value: 1,
				duration: 550,
				easing: 'easeOutQuad'
			}]
		})

		anime({
			targets: DOM.path,
			duration: 1200,
			easing: 'easeOutQuad',
			d: path
		})

		loaded = false

	}

	init()
	//================/END

	//========= for map js
	if ($('#map').length > 0) {

		blockMap()
	}

	function blockMap () {
		var locations = {lat: 50.434682, lng: 30.508282},
			mapLocation = {lat: 50.434682, lng: 30.508282},
			// mapLocation2 = {lat: 50.453684, lng: 30.483745},
			// mapLocation3 = {lat: 50.447367, lng: 30.494291},
			// mapLocation4 = {lat: 50.447094, lng: 30.488583},
			// mapLocation5 = {lat: 50.446370, lng: 30.491995},
			// mapLocation6 = {lat: 50.443568, lng: 30.510175},

			// popupContent2 = '<p class="content">Київський професійно-педагогічний коледж ім. А. Макаренка</p>',
			// popupContent4 = '<p class="content">Сушія</p>',
			// popupContent5 = '<p class="content">ТРЦ Україна</p>',
			// popupContent3 = '<p class="content">Сільпо</p>',
			// popupContent6 = '<p class="content">Київська міська клінічна лікарня №18</p>',

			markerImage = '/img/location/logo_icon.png',
			// markerImage2 = 'img/location/icon7.png',
			// markerImage3 = 'img/location/icon6.png',
			// markerImage4 = 'img/location/icon9.png',
			// markerImage5 = 'img/location/icon.png',
			// markerImage6 = 'img/location/icon3.png',

			map = new google.maps.Map(document.getElementById('map'), {
				center: locations,
				zoom: 15,
				disableDefaultUI: true,
				scrollwheel: false
			}),
			marker = new google.maps.Marker({
				position: mapLocation,
				map: map,
				icon: markerImage,
				animation: google.maps.Animation.BOUNCE
			})
		// ,
		// marker2 = new google.maps.Marker({
		// 	position: mapLocation2,
		// 	map: map,
		// 	icon: markerImage2,
		// 	animation: google.maps.Animation.DROP
		// }),
		// marker3 = new google.maps.Marker({
		// 	position: mapLocation3,
		// 	map: map,
		// 	icon: markerImage3,
		// 	animation: google.maps.Animation.DROP
		// }),
		// marker4 = new google.maps.Marker({
		// 	position: mapLocation4,
		// 	map: map,
		// 	icon: markerImage4,
		// 	animation: google.maps.Animation.DROP
		// }),
		// marker5 = new google.maps.Marker({
		// 	position: mapLocation5,
		// 	map: map,
		// 	icon: markerImage5,
		// 	animation: google.maps.Animation.DROP
		// }),
		// marker6 = new google.maps.Marker({
		// 	position: mapLocation6,
		// 	map: map,
		// 	icon: markerImage6,
		// 	animation: google.maps.Animation.DROP
		// })

		// infowindow2 = new google.maps.InfoWindow({content: popupContent2})
		// infowindow3 = new google.maps.InfoWindow({content: popupContent3})
		// infowindow4 = new google.maps.InfoWindow({content: popupContent4})
		// infowindow5 = new google.maps.InfoWindow({content: popupContent5})
		// infowindow6 = new google.maps.InfoWindow({content: popupContent6})

		// marker2.addListener('click', function () {
		// 	infowindow2.open(map, marker2)
		// })
		// marker3.addListener('click', function () {
		// 	infowindow3.open(map, marker3)
		// })
		// marker4.addListener('click', function () {
		// 	infowindow4.open(map, marker4)
		// })
		// marker5.addListener('click', function () {
		// 	infowindow5.open(map, marker5)
		// })
		// marker6.addListener('click', function () {
		// 	infowindow6.open(map, marker6)
		// })

		$.getJSON('/js/map-style.json', function (data) {
			map.setOptions({styles: data})
		})

		// marker.addListener('click', function () {
		// 	$('#lacation-page-wrap').fadeIn()
		// })
		// $('#lacation-page-wrap__closeBtn').click(function () {
		// 	$('#lacation-page-wrap').fadeOut()
		// })
	}

//========= / END
//========= START slider on advantage page
	$('.advantage__list').slick({
		infinite: true,
		slidesToShow: 4,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1

				}
			},
			{
				breakpoint: 725,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1

				}
			},
			{
				breakpoint: 650,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1

				}
			}
		]
	})
//========= /END  slider on advantage page

//========= START preloader =========
	$(function () {

// $(".param__list");
		if (!sessionStorage.getItem('preloader')) {
			var preloaderBG = document.querySelector('.preloader')
			var hole = document.querySelector('.preloader__inner')
			var logo = document.querySelector('.preload__target_elem') || false
			var preloadParts = document.querySelectorAll('.preload-parts')
			var windowWidth = window.innerWidth
			var windowHeight = window.innerHeight
			var circleSet = Array.prototype.slice.call(document.getElementsByClassName('preloader__circle'), 0)
			var activeCircle = document.querySelector('.moving__circle')
			var circleSetLength = circleSet.length
			var lastCircle = circleSet[circleSetLength - 1]
			var lastCircleLeft = lastCircle.getBoundingClientRect().left
			var delay = 600
			var delayStep = 950
			var delayFadeOut = 800

			var trackingCircle = setInterval(function () {
				var leftCoord = activeCircle.getBoundingClientRect().left
				circleSet.forEach(function (item, i) {
					var circleLeftCoord = item.getBoundingClientRect().left

					if (leftCoord >= circleLeftCoord) {
						item.classList.add('vissible')
						setTimeout(function () {
							item.classList.remove('vissible')
						}, delayFadeOut)
						circleSet.shift()
						if (item === lastCircle) {
							window.clearInterval(trackingCircle)

							setTimeout(function () {
								hole.classList.add('animate')
								preloaderBG.style.background = 'none'
								setTimeout(function () {

									var logoWidth = activeCircle.style.width
									var logoHeight = activeCircle.style.height
									var logoCoordsLeft = windowWidth / 2
									var logoCoordsTop = windowHeight / 2

									if (logo) {
										logoWidth = logo.clientWidth || '50%'
										logoHeight = logo.clientHeight || '50%'
										var logoCoords = logo.getBoundingClientRect()
										logoCoordsLeft = logoCoords.left
										logoCoordsTop = logoCoords.top
									}
									hole.style.left = logoCoordsLeft + logoWidth / 2 + 'px'
									hole.style.top = logoCoordsTop + logoHeight / 2 + 'px'
									hole.style.width = logoWidth + 'px'
									hole.style.height = logoWidth + 'px'

									hole.classList.add('zoom1')
									setTimeout(function () {
										hole.style.width = windowWidth * 2 + 'px'
										hole.style.height = windowWidth * 2 + 'px'
										setTimeout(function () {
											document.querySelector('.preloader').remove()
										}, 2000)
									}, delayFadeOut * 4)
								}, delayFadeOut * 2)

								activeCircle.classList.add('hide')
							}, delayFadeOut / 2)

						}
						return
					}
				})
			}, 100)

			function refreshSize () {
				windowWidth = window.innerWidth
				windowHeight = window.innerHeight
				preloadParts.forEach(function (item, i) {
					item.style.width = 2 * windowWidth + 'px'
					item.style.height = 2 * windowWidth + 'px'
				})
			}

			function getMiddleCoord (elem) {
				var left = elem.getBoundingClientRect().left
				var halfWidth = elem.offsetWidth / 2
				var res = left + halfWidth
				return res
			}

			function calcMiddleCoord (middleElem, elemForCalc) {
				var left = getMiddleCoord(elemForCalc)
				var halfWidth = middleElem.offsetWidth / 2
				var res = left - halfWidth
				return res
			}

			hole.style.left = calcMiddleCoord(hole, lastCircle) + 'px'

			setTimeout(function () {
				activeCircle.classList.add('move')
				activeCircle.style.left = lastCircleLeft + 'px'
			}, 0)

			preloadParts.forEach(function (item, i) {
				item.style.width = 2 * windowWidth + 'px'
				item.style.height = 2 * windowWidth + 'px'
			})

			window.addEventListener('resize', function () {
				refreshSize()
			})

			sessionStorage.setItem('preloader', 'true')
		}
	})
//========= /END preloader =========

//========= START POPUP =========
	var form = $($('#main-form-tamplate').html())

	$('#form-call').magnificPopup({
		removalDelay: 300,
		mainClass: 'mfp-fade',
		items: {
			src: form,
			type: 'inline',

		}
	});
	
	$('.form-call').magnificPopup({
		removalDelay: 300,
		mainClass: 'mfp-fade',
		items: {
			src: form,
			type: 'inline',

		}
	});
	

	
	form.find('.submit').on('click', function(e){

		sendForm($(this).data('id'));
	
	  return false; 
});
	
	
//========= /END POPUP =========

//========= START BUTTON LINK_ARRROW =========
	(function () {
		var pages = [].slice.call(document.querySelectorAll('.pages > .page')),
			btns = [].slice.call(document.querySelectorAll('.nav-btn')),
			currentPage = 0,

			revealerOpts = {
				// the layers are the elements that move from the sides
				nmbLayers: 3,
				// bg color of each layer
				bgcolor: ['#d6bba7', '#b7967b', '#7c614a'],
				// effect classname
				effect: 'anim--effect-3',
				onStart: function (direction) {
					// next page gets class page--animate-[direction]
					/*var nextPage = pages[ 0];
					classie.add(nextPage, 'page--animate-' + direction);*/

				},
				onEnd: function (direction) {
					// remove class page--animate-[direction] from next page
					/*var nextPage = pages[ 0];
					nextPage.className = 'page';*/
				}
			}
		revealer = new Revealer(revealerOpts)

		btns.forEach(function (btn) {
			var direction = btn.getAttribute('data-position')
			var delay = 400
			btn.defaultLink = btn.getAttribute('data-page')
			btn.defaultNext = btn.getAttribute('data-next')
			btn.addEventListener('click', function (e) {

				e.preventDefault();
				reveal(direction);
				var page = btn.getAttribute('data-page')
				var that = this;
				var priviousPage = document.querySelector('.page--current')
				var currentPage = document.querySelector('.' + page)
				var revealer = document.querySelector('.revealer--animate')

				setTimeout(function () {
					priviousPage.classList.remove('page--current')
					currentPage.classList.add('page--current')
					switchLink(that);
					
				}, delay)
			})
		})
		function switchLink(btn){
			setToDefault();
			var currentLink =  btn.getAttribute('data-page');
			var nextLink =  btn.getAttribute('data-next');
			btn.setAttribute('data-page',nextLink);
			btn.setAttribute('data-next',currentLink);
			$(btn).find('.content__link_curent').toggle();
			$(btn).find('.content__link_next').toggle();
		}
		function setToDefault() {
			btns.forEach(function (btn) {
				btn.setAttribute('data-page',btn.defaultLink);
				//console.log(btn.defaultLink);
				btn.setAttribute('data-next',btn.defaultNext);
				$(btn).find('.content__link_curent').show();
				$(btn).find('.content__link_next').hide();
			});
		}

		// clicking the page nav buttons
		/*document.querySelector('button.pagenav__button--top').addEventListener('click', function() { reveal('top'); });*/
		document.querySelector('.pagenav__button--left').addEventListener('click', function () { reveal('left') })
		document.querySelector('.pagenav__button--right').addEventListener('click', function () { reveal('right') })
		document.querySelector('.pagenav__button--bottom').addEventListener('click', function () {
			reveal('bottom')
			var content = document.querySelector('.content')
			content.setAttribute('data-content','bg')
		})
		/*document.querySelector('#popi').addEventListener('click', function() { reveal('left'); });*/

		// triggers the effect by calling instance.reveal(direction, callbackTime, callbackFn)
		function reveal (direction) {
			var callbackTime = 750,
				callbackFn = function () {
					/*classie.remove(pages[currentPage], 'page--current');
					currentPage = currentPage === 0 ? 1 : 0;
					classie.add(pages[currentPage], 'page--current');*/
				}

			revealer.reveal(direction, callbackTime, callbackFn)
		}

		// changing the effect..
		/*var effectCtrl = document.getElementById('select-effect');
		effectCtrl.addEventListener('change', changeEffect);
		// force it to be the first opt as default
		effectCtrl.value = 'effect-3';*/

		/*function changeEffect() {
			revealer.destroy();
			var revealerOpts = {
				// the layers are the elements that move from the sides
				nmbLayers : Number(this.options[this.selectedIndex].getAttribute('data-layers')),
				// bg color of each layer
				bgcolor : this.options[this.selectedIndex].getAttribute('data-colors').split(','),
				// effect classname
				effect : 'anim--' + this.value,
				onStart : function(direction) {
					// next page gets class page--animate-[direction]
					var nextPage = pages[currentPage === 0 ? 1 : 0];
					classie.add(nextPage, 'page--animate-' + direction);
				},
				onEnd : function(direction) {
					// remove class page--animate-[direction] from next page
					var nextPage = pages[currentPage === 0 ? 1 : 0];
					nextPage.className = 'page';
				}
			};

			revealer = new Revealer(revealerOpts);
		}*/
	})()
//========= /END BUTTON LINK_ARRROW =========

//========= SLIDER for news-list =========
	$('.news__list').slick({
		infinite: false,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					infinite: true
				}
			},
			{
				breakpoint: 700,
				settings: {
					slidesToShow: 2,
					vertical: true,
					verticalSwiping: true,
					infinite: true,
					slidesToScroll: 1
				}
			}
		]
	});
//=========/ END SLIDER for news-list =========

//========= SLIDER for news-page =========
    $('.news-page__top-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.news-page__bot-slider'
    });
    $('.news-page__bot-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.news-page__top-slider',
        dots: false,
        arrows: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    vertical: true,
                    verticalSwiping: true,
                    infinite: true,
                    slidesToScroll: 1
                }
            }
        ]

    });
//=========/ END SLIDER for news-page =========

//========= SLIDER for construction page =========

    $('.construction__slider').slick({
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        arrows: true,
        vertical: true,
        verticalSwiping: true,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true
                }
            }
        ]
    });

    // нужно проверить

	// $('.construction__right-inner').slick({
	// 	infinite: false,
	// 	speed: 300,
	// 	slidesToShow: 3,
	// 	arrows: true,
	// 	vertical: true,
	// 	verticalSwiping: true,
	// 	slidesToScroll: 1,
	// 	responsive: [
	// 		{
	// 			breakpoint: 992,
	// 			settings: {
	// 				slidesToShow: 2,
	// 				slidesToScroll: 1,
	// 				infinite: true
	// 			}
	// 		},
	// 		{
	// 			breakpoint: 700,
	// 			settings: {
	// 				slidesToShow: 2,
	// 				vertical: true,
	// 				verticalSwiping: true,
	// 				infinite: true,
	// 				slidesToScroll: 1
	// 			}
	// 		}
	// 	]
	// });

//=========/END  SLIDER for construction page =========

//========= POPUP for construction page =========

  /*  $('.construction__info').magnificPopup({
        items: [
            {
                src: '../img/construction/ex-1.jpg'
            },
            {
                src: '../img/construction/ex-2.jpg'
            },
            {
                src: '../img/construction/ex-3.jpg'
            }
        ],
        gallery: {
            enabled: true
        },
        type: 'image' // this is default type
    });
	*/
	
	// construction gallery

$('.construction__info-left').on('click', function(e){
  e.preventDefault();
  var data = $(this).attr('data-img');
  $.ajax({
    method: 'POST',
    url: "/modules/some.php",
    data: data,
    success: function(data){
      var dataImg = $.parseJSON(data);
	 
	  
      $.magnificPopup.open({
        items: dataImg,
        type: 'image',
        gallery:{
          enabled:true
        }
      });
    },
    error: function(){
      alert(Error);
    },
  });
})
	
//=========/END POPUP for construction page =========

// END all function
})

//Для форм
var ct = 0;
var addCount = document.createElement('input');
addCount.type = "hidden";
addCount.id = "count";
addCount.name = "count";
addCount.value = "0";
function countme(form) { var form;
    document.getElementById(form).appendChild(addCount);
    document.getElementById('count').value = ++ct;
}

/*

function countme2(input) { var input;
  alert( input);
}*/


function sendForm(b){

var b;
  // var id=$(this).data('id');
   var id=b;
   var elem = $('#'+id);
   var data = elem.serialize();

    var inputs = [ "name", "email", "tel"];
    var r = /^[\w\.\d-_]+@[\w\.\d-_]+\.\w{2,4}$/i;
    var error=0;
    	
    for (var key in inputs) {
    
        var el=elem[0].elements[inputs[key]]
        var clas=''
        el.classList.value=el.classList.value.replace(" error","")
    
        if (el.value.length<2){ 
        
            clas=' error'; error++;
            }
        if (key==1 && !r.test(el.value)){
            
             clas=' error'; error++;
            }

el.classList.value=el.classList.value+clas
    }
 	
    if (error) {    return false;    }
	
    
       $.ajax({
           method: 'POST',
           url: '/modules/application.php',
           data: data,
           success: function(dat){
			   
			  // console.log(dat);
			  $('#'+id)[0].reset();
            // $.magnificPopup.close();
             $('.succses__form_text').html(dat);
            $('.succses__form_info').fadeIn();
			setTimeout(function(){
               $('.succses__form_info').fadeOut();
            },4000)
          },
           error: function(dat){
               console.log(dat);
           },
       });            
   
	
}

$('.contact__form-btn').on('click', function(e){
	
	sendForm($(this).data('id'));
	
	 return false; 
});
