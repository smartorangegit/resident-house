var form = $($('#main-form-tamplate').html());
var priceFormTemplate = $($('#price-form-tamplate').html());
var bookingFormTemplate = $($('#booking-form-tamplate').html());

$(function () {

    //================ START page preloading

    $(function () {

        $('.page-preload-wrap').fadeOut('slide', function () {

            arrowAnim();

            if($('.main').length > 0){
                $('.main__inner').addClass('anim');
            }

            if($('.house').length > 0){
                $('.house__left-inner').addClass('anim');
                $('.house__description-wrap').addClass('anim');
            }

            if($(".values").length > 0){
                $('.values__left-inner').addClass('anim');
                $('.values__list-wrap').addClass('anim');
            }
            if($(".contact").length > 0){
                $('.contact__inner').addClass('anim');
            }
            if($(".advantage").length > 0){
                $('.advantage__inner').addClass('anim');
            }
            if($(".rooms").length > 0){
                $('.rooms__left-inner').addClass('anim');
            }
            if($(".architecture").length > 0){
                $('.architecture__left-inner').addClass('anim');
            }
            if($(".location").length > 0){
                $('.location__left-inner').addClass('anim');
            }
            if($(".manager").length > 0){
                $('.manager__left').addClass('anim');
                $('.manager__right').addClass('anim');
            }
            if($(".news").length > 0){
                $('.news__inner').addClass('anim');
            }
            if($(".news").length > 0){
                $('.news__inner').addClass('anim');
            }
            if($(".documents").length > 0){
                $('.documents__inner').addClass('anim');
            }
            if($(".news-page").length > 0){
                $('.news-page__inner').addClass('anim');
            }


        });

        function arrowAnim() {
            if($(".page--current > .advantage").length > 0 || $(".page--current > .documents").length > 0 || $(".page--current > .contact").length > 0 || $(".page--current > .web-cam").length > 0 || $(".page--current > .news").length > 0 || $(".page--current > .news-page").length > 0 || $(".page--current > .construction").length > 0){
                $(".pagenav__button--bottom").css('opacity', '0');
                $(".pagenav__button--bottom").css('visibility', 'hidden');
            } else {
                $('.center-btm-link').css({
                    'bottom': '75px',
                    'opacity': '1',
                    'visibility': 'visible'
                });
            }

            $('.right-btm-link').css({
                'right': '10px',
                'opacity': '1',
                'visibility': 'visible'
            });
            $('.left-btm-link').css({
                'left': '10px',
                'opacity': '1',
                'visibility': 'visible'
            });
        }
    });

    //================/END page preloading

    //================ START

    var DOM = {};
    DOM.menu = document.querySelector('.menu');
    DOM.intro = document.querySelector('.menu__inner');
    //DOM.shape = DOM.intro.querySelector('svg.shape');
    //DOM.path = DOM.shape.querySelector('path');
    DOM.enter = document.querySelector('#menu-btn');
    DOM.close = document.querySelector('.btn-close');

// Set the SVG transform origin.
    //DOM.shape.style.transformOrigin = '50% 0%';

    var init = function init() {
        DOM.enter.addEventListener('click', navigate)
        DOM.close.addEventListener('click', menuClose)
        DOM.enter.addEventListener('touchenter', navigate)
    };

    var loaded = void 0;
   /* var path = DOM.path.getAttribute('d');
    var pathdata = DOM.path.getAttribute('pathdata:id');*/
    var navigate = function navigate() {

        loaded = true
        document.querySelector('body').style.overflow = 'hidden';
        DOM.menu.style.display = 'block'
        anime({
            targets: DOM.intro,
            duration: 1200,
            easing: 'easeInOutSine',
            translateY: '130%'
        })

       /* anime({
            targets: DOM.shape,
            scaleY: [{value: [0.8, 1.8], duration: 650, easing: 'easeInQuad'}, {
                value: 1,
                duration: 650,
                easing: 'easeOutQuad'
            }]
        })*/

       /* anime({
            targets: DOM.path,
            duration: 1200,
            easing: 'easeOutQuad',
            d: pathdata
        })*/

    };
    var menuClose = function navigate() {

        setTimeout(function () {
            DOM.menu.style.display = 'none'
            document.querySelector('body').style.overflow = 'visible';
        }, 1300)
        anime({
            targets: DOM.intro,
            duration: 1200,
            easing: 'easeInOutSine',
            translateY: '0'
        })

       /* anime({
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
        })*/

        loaded = false

    };

    init();
//================/END

//========= FOR Location page =map=

        if ($('#map').length > 0) {
            blockMap();
        }

        function blockMap() {

            var t = $('.location').data('text');

            var locations = {lat: 50.434682, lng: 30.508282},
                mapLocation = {lat: 50.434682, lng: 30.508282},
                mapLocation2 = {lat: 50.433468, lng: 30.513202},

                popupContent = '<p><span class="info-name">' + t.marker1[0] + '</span> <br> <span class="info-address">' + t.marker1[1] + '</span></p>',
                popupContent1 = '<p><span class="info-name">' + t.marker2[0] + '</span> <br> <span class="info-address">' + t.marker2[1] + '</span></p>',

                markerImage = '/img/location/logo_icon.png',
                markerImage2 = '/img/location/logo-v-prod.png',

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
                }),
                marker2 = new google.maps.Marker({
                    position: mapLocation2,
                    map: map,
                    icon: markerImage2,
                    animation: google.maps.Animation.BOUNCE
                }),

                infowindow = new google.maps.InfoWindow({content: popupContent}),
                infowindow2 = new google.maps.InfoWindow({content: popupContent1});

            infowindow.open(map, marker);

            marker.addListener('click', function () {
                infowindow.open(map, marker)
            });

            infowindow2.open(map, marker2);

            marker2.addListener('click', function () {
                infowindow2.open(map, marker2)
            });


            $.getJSON('/js/map-style.json', function (data) {
                map.setOptions({styles: data})
            })

        }


//=========/END FOR Location page =map=

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
    });
//========= /END  slider on advantage page

//========= START preloader =========

    // $(function () {

    //     var limit = 72 * 3600 * 1000; // 24 часа
    //     var localStorageInitTime = localStorage.getItem('localStorageInitTime');


    //     if (+new Date() - localStorageInitTime > limit) {




    //         var preloaderBG = document.querySelector('.preloader');
    //         var hole = document.querySelector('.preloader__inner');
    //         var logo = document.querySelector('.preload__target_elem') || false;
    //         var preloadParts = document.querySelectorAll('.preload-parts');
    //         var windowWidth = window.innerWidth;
    //         var windowHeight = window.innerHeight;
    //         var circleSet = Array.prototype.slice.call(document.getElementsByClassName('preloader__circle'), 0);
    //         var activeCircle = document.querySelector('.moving__circle');
    //         var circleSetLength = circleSet.length;
    //         var lastCircle = circleSet[circleSetLength - 1];
    //         var lastCircleLeft = lastCircle.getBoundingClientRect().left;
    //         var delay = 600;
    //         var delayStep = 950;
    //         var delayFadeOut = 800;

    //         var trackingCircle = setInterval(function () {
    //             var leftCoord = activeCircle.getBoundingClientRect().left;
    //             circleSet.forEach(function (item, i) {
    //                 var circleLeftCoord = item.getBoundingClientRect().left;

    //                 if (leftCoord >= circleLeftCoord) {
    //                     item.classList.add('vissible');
    //                     setTimeout(function () {
    //                         item.classList.remove('vissible')
    //                     }, delayFadeOut);
    //                     circleSet.shift();
    //                     if (item === lastCircle) {
    //                         window.clearInterval(trackingCircle);

    //                         setTimeout(function () {
    //                             hole.classList.add('animate');
    //                             preloaderBG.style.background = 'none';
    //                             setTimeout(function () {

    //                                 var logoWidth = activeCircle.style.width;
    //                                 var logoHeight = activeCircle.style.height;
    //                                 var logoCoordsLeft = windowWidth / 2;
    //                                 var logoCoordsTop = windowHeight / 2;

    //                                 if (logo) {
    //                                     logoWidth = logo.clientWidth || '50%';
    //                                     logoHeight = logo.clientHeight || '50%';
    //                                     var logoCoords = logo.getBoundingClientRect();
    //                                     logoCoordsLeft = logoCoords.left;
    //                                     logoCoordsTop = logoCoords.top
    //                                 }
    //                                 hole.style.left = logoCoordsLeft + logoWidth / 2 + 'px';
    //                                 hole.style.top = logoCoordsTop + logoHeight / 2 + 'px';
    //                                 hole.style.width = logoWidth + 'px';
    //                                 hole.style.height = logoWidth + 'px';

    //                                 hole.classList.add('zoom1');
    //                                 setTimeout(function () {
    //                                     hole.style.width = windowWidth * 3 + 'px';
    //                                     hole.style.height = windowWidth * 3 + 'px';
    //                                     setTimeout(function () {
    //                                         document.querySelector('.preloader').remove()
    //                                     }, 300)
    //                                 }, delayFadeOut * 4)
    //                             }, delayFadeOut * 2);

    //                             activeCircle.classList.add('hide')
    //                         }, delayFadeOut / 2)

    //                     }
    //                     return;
    //                 }
    //             })
    //         }, 100);

    //         function refreshSize() {
    //             windowWidth = window.innerWidth
    //             windowHeight = window.innerHeight
    //             preloadParts.forEach(function (item, i) {
    //                 item.style.width = 4 * windowWidth + 'px'
    //                 item.style.height = 4 * windowWidth + 'px'
    //             })
    //         }

    //         function getMiddleCoord(elem) {
    //             var left = elem.getBoundingClientRect().left
    //             var halfWidth = elem.offsetWidth / 2
    //             var res = left + halfWidth
    //             return res
    //         }

    //         function calcMiddleCoord(middleElem, elemForCalc) {
    //             var left = getMiddleCoord(elemForCalc)
    //             var halfWidth = middleElem.offsetWidth / 2
    //             var res = left - halfWidth
    //             return res
    //         }

    //         hole.style.left = calcMiddleCoord(hole, lastCircle) + 'px';

    //         setTimeout(function () {
    //             activeCircle.classList.add('move')
    //             activeCircle.style.left = lastCircleLeft + 'px'
    //         }, 0);

    //         preloadParts.forEach(function (item, i) {
    //             item.style.width = 2 * windowWidth + 'px'
    //             item.style.height = 2 * windowWidth + 'px'
    //         });

    //         window.addEventListener('resize', function () {
    //             refreshSize()
    //         });



    //         localStorage.setItem('localStorageInitTime', +new Date());





    //     }
    // });
    //========= /END preloader =========

//========= START POPUP =========

    $('#form-call').on('click', initiaiseTelMask)
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

    var formPrice = $($('#price-form-tamplate').html());

    $('.room_info__btn').magnificPopup({
        removalDelay: 300,
        mainClass: 'mfp-fade',
        items: {
            src: formPrice,
            type: 'inline',

        },
        callbacks: {
            open: initiaiseTelMask
        }
    });

    var formBooking = $($('#booking-form-tamplate').html());

    $('#booking').magnificPopup({
        removalDelay: 300,
        mainClass: 'mfp-fade',
        items: {
            src: formBooking,
            type: 'inline',

        },
        callbacks: {
            open: initiaiseTelMask
        }
    });

    $('body').on('click', '.submit', function (e) {

        sendForm($(this).data('id'));

        return false;
    });

    /*    formPrice.find('.submit').on('click', function(e){

     sendForm($(this).data('id'));

     return false;
     });

     formBooking.find('.submit').on('click', function(e){

     sendForm($(this).data('id'));

     return false;
     });*/
//========= /END POPUP =========
    if ($('.pagenav__button--left').length > 0) {
    var curentBtn = {};
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
            revealer = new Revealer(revealerOpts);

            btns.forEach(function (btn) {
                var direction = btn.getAttribute('data-position');
                var delay = 400;
                btn.defaultLink = btn.getAttribute('data-page');
                btn.defaultNext = btn.getAttribute('data-next');
                btn.addEventListener('click', function (e) {

                    e.preventDefault();
                    //curentBtn = $(this);
                    reveal(direction);
                    var page = btn.getAttribute('data-page');
                    var that = this;
                    var priviousPage = document.querySelector('.page--current');
                    var currentPage = document.querySelector('.' + page);
                    var revealer = document.querySelector('.revealer--animate');

                    setTimeout(function () {

                        priviousPage.classList.remove('page--current')
                        currentPage.classList.add('page--current')

                        linksHide();

                        switchLink(that);

                    }, delay)
                })
            })

            function switchLink(btn) {
                setToDefault(btn);
                var currentLink = btn.getAttribute('data-page');
                var nextLink = btn.getAttribute('data-next');



                btn.defaultLink = btn.getAttribute('data-page');
                btn.defaultNext = btn.getAttribute('data-next');

                btn.setAttribute('data-page', nextLink);
                btn.setAttribute('data-next', currentLink);
                $(btn).find('.content__link_curent').toggle();

                $(btn).find('.content__link_next').toggle();

                var newurl='#'+btn.getAttribute('data-url');
                window.history.pushState(null, null, newurl);

                ga('send', { 'hitType': 'pageview', 'page': location.pathname+newurl});

            }

            function setToDefault(activeBtn) {
                btns.forEach(function (btn) {
                    if(activeBtn !== btn) {
                        btn.setAttribute('data-page', btn.defaultLink);
                        btn.setAttribute('data-next', btn.defaultNext);
                        $(btn).find('.content__link_curent').show();
                        $(btn).find('.content__link_next').hide();
                    }
                });
            }

            // clicking the page nav buttons
            /*document.querySelector('button.pagenav__button--top').addEventListener('click', function() { reveal('top'); });*/
            document.querySelector('.pagenav__button--left').addEventListener('click', function () {
                reveal('left')
            });
            document.querySelector('.pagenav__button--right').addEventListener('click', function () {
                reveal('right')
            });
            document.querySelector('.pagenav__button--bottom').addEventListener('click', function () {
                reveal('bottom')
                var content = document.querySelector('.content')
                content.setAttribute('data-content', 'bg')
            });
            /*document.querySelector('#popi').addEventListener('click', function() { reveal('left'); });*/

            // triggers the effect by calling instance.reveal(direction, callbackTime, callbackFn)
            function reveal(direction) {
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
    }
//========= /END BUTTON LINK_ARRROW =========

//========= SLIDER for news-list =========
//     $('.news__list').slick({
//         infinite: false,
//         speed: 300,
//         slidesToShow: 3,
//         slidesToScroll: 1,
//         responsive: [
//             {
//                 breakpoint: 992,
//                 settings: {
//                     slidesToShow: 2,
//                     slidesToScroll: 1,
//                     infinite: true
//                 }
//             },
//             {
//                 breakpoint: 700,
//                 settings: {
//                     slidesToShow: 2,
//                     vertical: true,
//                     verticalSwiping: true,
//                     infinite: true,
//                     slidesToScroll: 1
//                 }
//             }
//         ]
//     });
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
         slidesToShow: 2,
         arrows: true,
         vertical: false,
         verticalSwiping: false,
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
//=========/END SLIDER for construction page =========

//========= POPUP for construction page =========
    // construction gallery

    $('.construction__info-left').on('click', function (e) {
        e.preventDefault();
        var data = $(this).attr('data-img');
        $.ajax({
            method: 'POST',
            url: "/modules/some.php",
            data: data,
            success: function (data) {
                var dataImg = $.parseJSON(data);


                $.magnificPopup.open({
                    items: dataImg,
                    type: 'image',
                    gallery: {
                        enabled: true
                    }
                });
            },
            error: function () {
                alert(Error);
            },
        });
    });
//=========/END POPUP for construction page =========

//========= STATUS bar for construction =========
    if ($('.status-bar__status').length > 0) {

        (function persentPoint() {




            var rend = $('.status-page__render-inner');
            var statBar = $('.statBar');
            var point = $('.point');

            var heightParsent = 85 / 100
            var result = 0
            var allRend = 0

            function setHeight(elem, height) {
                elem.css('height', height + '%')
            }

            for (var i = 0; i < point.length; i++) {
                var sum = parseFloat(point.eq(i).html())
                setHeight(statBar.eq(i), sum)
                result = result + sum
            }

            result = (result / 4).toFixed(9)

            allRend = (100 - result * heightParsent)

            setHeight(rend, allRend - 3)

        })()
    }
//=========/END STATUS bar for construction =========

//========= SCROLL bar for ROOMS_PAGE =========
    if ($(".rooms__description").length > 0) {
        $('.rooms__description').jScrollPane({
            verticalDragMinHeight: 13,
            verticalDragMaxHeight: 13,
            verticalGutter: 2
        })
    }
//=========/END SCROLL bar for ROOMS_PAGE =========
//========= SCROLL bar for LOCATION_PAGE =========

   /* if ($(".location__description").length > 0){
        $('.location__description').jScrollPane({
            verticalDragMinHeight: 13,
            verticalDragMaxHeight: 13,
            verticalGutter: 2
        })
    }*/

//=========/END SCROLL bar for LOCATION_PAGE =========

//========= SCROLL bar for HOUSE_PAGE =========
    /*if ($(".house__description").length > 0) {
        $('.house__description').jScrollPane({
            verticalDragMinHeight: 13,
            verticalDragMaxHeight: 13,
            verticalGutter: 2
        })
    }*/
//=========/END SCROLL bar for HOUSE_PAGE =========

//========= SCROLL bar for ARCHITECTURE_PAGE =========
    /*if ($('.architecture__description').length > 0) {
        $('.architecture__description').jScrollPane({
            verticalDragMinHeight: 13,
            verticalDragMaxHeight: 13,
            verticalGutter: 2
        });
    }*/
//=========/END SCROLL bar for ARCHITECTURE_PAGE =========
//========= SCROLL bar for VALUES_PAGE =========
    /*if ($('.values__description').length > 0) {
        $('.values__description').jScrollPane({
            verticalDragMinHeight: 13,
            verticalDragMaxHeight: 13,
            verticalGutter: 2
        });
    }*/
//=========/END SCROLL bar for VALUES_PAGE =========

//========= SCROLL bar for VALUES_PAGE =========
    jQuery(function () {

        if ($(window).width() < 600) {
            $(".values__list-wrap").addClass('values-scroll');
        } else {
            $(".values__list-wrap").removeClass('values-scroll');
        }
        if ($('.values-scroll').length > 0) {
            $('.values-scroll').jScrollPane({
                verticalDragMinHeight: 13,
                verticalDragMaxHeight: 13,
                verticalGutter: 2
            });
        }


    });
//=========/END SCROLL bar for VALUES_PAGE =========

//========= SCROLL bar for NEWS-PAGE =========
    if ($(".news-page__description-wrap").length > 0) {
        $('.news-page__description-wrap').jScrollPane({
            verticalDragMinHeight: 13,
            verticalDragMaxHeight: 13,
            verticalGutter: 2
        });
    }
//=========/END  SCROLL bar for NEWS-PAGE =========

//========= SCROLL bar for OPTIONS_PAGE =========
    if ($('.options__list-wrap').length > 0) {
        $('.options__list-wrap').jScrollPane({
            verticalDragMinHeight: 13,
            verticalDragMaxHeight: 13,
            verticalGutter: 2
        });


        function showTableImg(sTableID, sTable, sImgID) {//sTableID - table row, sTable - table that has overflow, sImgID - img for hover
            var tabelElem = $(sTableID);
            // if(tabelElem.length > 0 && $(window).width() >= 1180) {}
            tabelElem.on('mouseover', function () {
                var tableTop = $(sTable).offset().top;
                var elem = $(this);
                var coords = elem.offset();
                var pict = elem.find(sImgID);
                var pictHeight = pict.height();
                if ((coords.top - tableTop) > pictHeight + 50) {
                    pict.addClass('table__img_top');
                } else {
                    pict.addClass('table__img_bottom');
                }
            });

            tabelElem.on('mouseout', function () {
                var lol = $(this).find(sImgID);
                lol.removeClass('table__img_top');
                lol.removeClass('table__img_bottom');
            });
        }

        showTableImg('.options__item-link', '.options__list-wrap', '.options__item-right');


        $('.options__params-btn').on('click', function (e) {
            e.preventDefault();
            $('.options__params-right').toggleClass('tog');

            $('.options__params-left').toggleClass('tog');
        });
    }

//=========/END SCROLL bar for OPTIONS_PAGE =========

//========= SLIDER for ROOM_PAGE =========
    var slickOption = {
        infinite: true,
        vertical: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        verticalSwiping: true,
        responsive: [
            {
                breakpoint: 700,
                settings: 'unslick'
            }
        ]
    };

    $(document).ready(function () {

        $('.room-options__list').slick(slickOption)
    });
//=========/END SLIDER for ROOM_PAGE =========

//========= POPUP for room-options =========

    $(window).on('resize', function () {
        var width = $(window).width();
        var listSlid = $('.room-options__list');
        if (width > 700 && listSlid.length <= 0) {
            
            $('#room-options__list').slick(slickOption);
            $('#room-options__list').addClass('room-options__list');
        } else if (width < 700) {
            $("#room-options__list").removeClass('room-options__list');
            $('.room-options__list').slick('destroy');
        }
    });

    $("#options-open-btn").on('click', function () {
        $(".room__description-right").addClass('open');
        $('body').addClass('fixed');
    });

    $("#options-close-btn").on('click', function () {
        $(".room__description-right").removeClass('open');
        $('body').removeClass('fixed');
    });
//=========/END POPUP for room-options =========

//========= Range Slider for OPTIONS_PAGE =========
    if ($('#floor').length > 0) {
        rangSlider();
    }

    function rangSlider() {
        $('#floor').ionRangeSlider(
            {
                min: 1,
                max: 1000,
                from: 1,
                to: 100,
                type: 'double',
                onChange: function (data) {
                    $('.options__filter-inner').addClass('blured');
                },
                onFinish: function (data) {
                    $('.options__filter-inner').removeClass('blured');
                    updateInputs(data, 1)
                }
            }
        );
        $('#room').ionRangeSlider(
            {
                min: 1,
                max: 1000,
                from: 1,
                to: 1000,
                type: 'double',
                onChange: function (data) {
                    $('.options__filter-inner').addClass('blured');
                },
                onFinish: function (data) {
                    $('.options__filter-inner').removeClass('blured');
                    updateInputs(data, 0)
                }
            }
        );
        $('#size').ionRangeSlider(
            {
                min: 1,
                max: 1000,
                from: 1,
                to: 1000,
                type: 'double',
                onChange: function (data) {
                    $('.options__filter-inner').addClass('blured');
                },
                onFinish: function (data) {
                    $('.options__filter-inner').removeClass('blured');
                    updateInputs(data, 2)
                }
            }
        );

        var slider = [
            $("#room").data("ionRangeSlider"),
            $("#floor").data("ionRangeSlider"),
            $("#size").data("ionRangeSlider")
        ]

        tmas = ['room', 'floor', 'size'];

        function updateInputs(data, id) {

            function update() {
                data[i].style.display = '';

                for (m = 0; m < tmas.length; m++) {
                    if (minmax[tmas[m]][0] > parseFloat(data[i].dataset[tmas[m]])) {
                        minmax[tmas[m]][0] = data[i].dataset[tmas[m]]
                    }
                    if (minmax[tmas[m]][1] < parseFloat(data[i].dataset[tmas[m]])) {
                        minmax[tmas[m]][1] = data[i].dataset[tmas[m]]
                    }
                }
            }

            var minmax = {
                room: [1000, 0],
                floor: [1000, 0],
                size: [1000, 0]
            }

            var vals = [];
            for (var ii = 0; ii < tmas.length; ii++) {
                vals[ii] = $("#" + tmas[ii]).data("ionRangeSlider");
            }     

            data = $('.filter');
            var n = 0;

            for (i = 0; i < data.length; i++) {

                if (id == 0 && data[i].dataset.room >= vals[0].old_from && data[i].dataset.room <= vals[0].old_to &&
                    data[i].dataset.floor >= vals[1].old_from && data[i].dataset.floor <= vals[1].old_to
                ) {

                    update()
                }

                else if (id == 1 && data[i].dataset.floor >= vals[1].old_from && data[i].dataset.floor <= vals[1].old_to

                    && data[i].dataset.size >= vals[2].old_from && data[i].dataset.size <= vals[2].old_to
                    && data[i].dataset.room >= vals[0].old_from && data[i].dataset.room <= vals[0].old_to


                ) {

                    update()
                }
                else if (id == 2 && data[i].dataset.size >= vals[2].old_from && data[i].dataset.size <= vals[2].old_to &&
                    data[i].dataset.floor >= vals[1].old_from && data[i].dataset.floor <= vals[1].old_to
                ) {

                    update()
                }
                else {
                    data[i].style.display = 'none';
                    n++;
                }

            }

            for (var i = 0; i < tmas.length; i++) {

                if (i == 1) {
                    continue;
                }
                if (id == 1) {
                    continue;
                }
                if (id != i) {
                    slider[i].update({
                        from: Math.floor(minmax[tmas[i]][0]),
                        to: Math.ceil(minmax[tmas[i]][1]),
                    });

                    //console.log(minmax[tmas[i]][0]);
                }
            }

            if (n == data.length) {
                $('.not_found').show();
            }
            else {
                $('.not_found').hide();
            }

        }
    }

//=========/END Range Slider for OPTIONS_PAGE =========

//========= script for FLOOR_page =========
    if ($(".svg_polygon").length > 0) {

        $(document).ready(function () {
            isReady();
        });

        function isReady() {

            var L6 = getCoords(document.querySelector('#L6'));
            var L6Text = $(".svg_polygon").find('#L6_text').html();

            $(".floor-page__left-arrow").css('top', L6.top);

            $(".floor-page__left-arrow-num").html(L6Text);

            $("#L6").parent().addClass('visible');

        }

        $(".svg_polygon").on('mouseover', function () {

            $("#L6").parent().removeClass('visible');

            var polygon = getCoords(this.querySelector('.polygon'));
            var elem = $(this).find('text').eq(0).html();

            $(".svg_polygon + #L6").removeClass('visible');

            $(".floor-page__left-arrow-num").html(elem);

            $(".floor-page__left-arrow").css('top', polygon.top);

            $('svg .visible').removeClass('visible');
            $(this).addClass('visible');

        });

        function getCoords(elem) { // кроме IE8-
            var box = elem.getBoundingClientRect()

            return {
                top: box.top + pageYOffset,
                left: box.left + pageXOffset
            }

        }
    }
//=========/END script for FLOOR_page =========

//========= script for LINKS-HIDE =========

    linksHide();

    function linksHide() {

        if ($(".page--current > .apartments").length > 0) {

            $(".pagenav__button--right").css('opacity', '0');
            $(".pagenav__button--left").css('opacity', '0');
            $(".pagenav__button--bottom").css('opacity', '0');
            $(".pagenav__button--right").css('visibility', 'hidden');
            $(".pagenav__button--left").css('visibility', 'hidden');
            $(".pagenav__button--bottom").css('visibility', 'hidden');

        } else if ($(".page--current > .advantage").length > 0 || $(".page--current > .documents").length > 0 || $(".page--current > .contact").length > 0 || $(".page--current > .web-cam").length > 0 || $(".page--current > .news").length > 0 || $(".page--current > .news-page").length > 0 || $(".page--current > .construction").length > 0) {
            
            $(".pagenav__button--bottom").css('opacity', '0');
            $(".pagenav__button--bottom").css('visibility', 'hidden');

        } else {
            $(".pagenav__button--right").css('opacity', '1');
            $(".pagenav__button--left").css('opacity', '1');
            $(".pagenav__button--bottom").css('opacity', '1');
            $(".pagenav__button--left").css('visibility', 'visible');
            $(".pagenav__button--right").css('visibility', 'visible');
            $(".pagenav__button--bottom").css('visibility', 'visible');
        }
    }

//=========/END script for LINKS-HIDE =========


// END all function
});

//=========/START SVG floor loading =========
var OpenFloor = [];

function LoadSvg(id) {
    var id;
    if (typeof OpenFloor[id] !== "undefined") {
        addimg.innerHTML = OpenFloor[id];
    } else {

        $.ajax({
            method: 'POST',
            url: '/modules/ajax.php',
            data: {floor: id, lang: $('.top-head').data('lang')},
            success: function (dat) {

                OpenFloor[id] = dat;
                addimg.innerHTML = dat;

            },
            error: function (dat) {
            },

        });

    }
}

//=========/END SVG floor loading =========

//Для форм
var ct = 0;
var addCount = document.createElement('input');
addCount.type = "hidden";
addCount.id = "count";
addCount.name = "count";
addCount.value = "0";

function countme(form) {
    var form;
    document.getElementById(form).appendChild(addCount);
    document.getElementById('count').value = ++ct;
}

/*

 function countme2(input) { var input;
 alert( input);
 }*/


function sendForm(b) {

    var b;
    // var id=$(this).data('id');
    var id = b;
    var elem = $('#' + id);
    var data = elem.serialize();

    var inputs = ["name", "email", "tel"];
    var r = /^[\w\.\d-_]+@[\w\.\d-_]+\.\w{2,4}$/i;
    var error = 0;

    for (var key in inputs) {

        var el = elem[0].elements[inputs[key]];
        var clas = '';
        el.classList.value = el.classList.value.replace(" error", "");

        if (el.value.length < 2) {
            clas = ' error';
            error++;
        }
        if (key == 1 && !r.test(el.value)) {
            clas = ' error';
            error++;
        }

        el.classList.value = el.classList.value + clas
    }

    if (error) {
        return false;
    }


    $.ajax({
        method: 'POST',
        url: '/modules/application.php',
        data: data,
        success: function (dat) {

            window.location.href = $('.top-head').data('lang') + "thanks-page/";

            $('#' + id)[0].reset();


        },
        error: function (dat) {
            console.log(dat);
        },
    });

}

$('.contact__form-btn').on('click', function (e) {

    sendForm($(this).data('id'));

    return false;
});

//========= maska
$(document).on('change', '.error', function (e) {
    $(this).removeClass('error')
});
//=========/END maska
//============= Mask and international number start ========
;function initiaiseTelMask(){
    var telInput1 = form.find(".inputtelmask");
    var telInput2 = $('.inputtelmask');
    var telInput3 = priceFormTemplate.find(".inputtelmask");
    var telInput4 = bookingFormTemplate.find(".inputtelmask");

    function createMask(telInput) {

        jQuery(function($){
            $.mask.definitions['#']='[0-9]';
            $.mask.definitions['9'] = '';
            telInput.mask("+(38) ### ###-##-?##",{placeholder:"_"});
        });
        
        telInput.intlTelInput({
            initialCountry: 'ua',
            preferredCountries: ['ua' ,'ru'],
            nationalMode: false
        });
        
        $(telInput).on("countrychange", function(e, countryData) {
            $(this).intlTelInput("setNumber", "");    
            $(this).trigger('blur');
            $(this).mask( '+(' + countryData.dialCode + ')' + ' ### ###-##-?##',{placeholder:"_"});
        });

    }
    createMask(telInput1);
    createMask(telInput2);
    createMask(telInput3);
    createMask(telInput4);
  
  };
  initiaiseTelMask();
  //============= Mask and international number start ========
  
  //==========Slick slider for managers page start===========
    $('.manager__list').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        arrows: true,
        prevArrow: $('.manager__carousel_prev'),
        nextArrow: $('.manager__carousel_next'),
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 4,
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
              }
            }
          ]
    });
  //==========Slick slider for managers page end===========

  //==========Slick slider for one day page start===========
    $('.day-slider1').slick({
        autoplay: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 1200,
        autoplaySpeed: 500,
        arrows: true,
        prevArrow: $('.day-slider1__button_prev'),
        nextArrow: $('.day-slider1__button_next'),
    });
    $('.day-slider2').slick({
        autoplay: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 1200,
        autoplaySpeed: 500,
        arrows: true,
        prevArrow: $('.day-slider2__button_prev'),
        nextArrow: $('.day-slider2__button_next'),
    });
    $('.day-slider3').slick({
        autoplay: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 1200,
        autoplaySpeed: 500,
        arrows: true,
        prevArrow: $('.day-slider3__button_prev'),
        nextArrow: $('.day-slider3__button_next'),
    });
    $('.day-slider4').slick({
        autoplay: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 1200,
        autoplaySpeed: 500,
        arrows: true,
        prevArrow: $('.day-slider4__button_prev'),
        nextArrow: $('.day-slider4__button_next'),
    });
  //==========Slick slider for one day page end===========


  //(function(){
  //    $('.construction__temp').magnificPopup({delegate: 'a', type: 'image' });
  //})();