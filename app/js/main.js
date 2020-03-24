( function(){

    "use strict";

    var _instagramFeed,
        _facilitySection,
        _mapFrame;

    ( _instagramFeed = document.querySelector( '.instagram-feed' ) ) && InitInstagramFeedSlider();
    ( _facilitySection = document.querySelector( '.about-facility' ) ) && InitFacilitySlider();
    ( _mapFrame = document.querySelector( '.map' ) ) && InitMap();

    Preloader();
    Site();

    function InitInstagramFeedSlider () {

        var swiper,
            swiperSliser = _instagramFeed.querySelector( '.instagram-feed__swiper' );

        // OnEvents

        // Functions
        function InitSwiper () {

            swiper = new Swiper( swiperSliser, {
                spaceBetween: 15,
                effect: 'slide',
                autoplay: {
                    delay: 10000
                },
                speed: 500,
                loop: true,
                slidesPerView: 'auto',
                centeredSlides: true
            } );

        }

        // init
        InitSwiper();

    }

    function InitFacilitySlider () {

        var swiper,
            swiperSliser = _facilitySection.querySelector( '.about-facility__swiper' ),
            swiperNextBtn = _facilitySection.querySelector( '.about-facility__swiper-next' ),
            swiperPrevBtn = _facilitySection.querySelector( '.about-facility__swiper-prev' ),
            swiperPagination = _facilitySection.querySelector( '.about-facility__swiper-pagination' );

        // OnEvents
        swiperNextBtn.addEventListener( 'mouseover', function(){
            swiperSliser.classList.add( 'is-left' );
        } );
        swiperNextBtn.addEventListener( 'mouseout', function(){
            swiperSliser.classList.remove( 'is-left' );
        } );
        swiperPrevBtn.addEventListener( 'mouseover', function(){
            swiperSliser.classList.add( 'is-right' );
        } );
        swiperPrevBtn.addEventListener( 'mouseout', function(){
            swiperSliser.classList.remove( 'is-right' );
        } );

        // Functions
        function InitSwiper () {

            swiper = new Swiper( swiperSliser, {
                effect: 'slide',
                autoplay: {
                    delay: 10000
                },
                speed: 500,
                loop: true,
                slidesPerView: 1,
                pagination: {
                    el: swiperPagination,
                    clickable: true
                },
                navigation: {
                    nextEl: swiperNextBtn,
                    prevEl: swiperPrevBtn
                }
            } );

        }

        // init
        InitSwiper();

    }

    function InitMap() {

        var mapData = JSON.parse( _mapFrame.dataset.map ),
            uluru = {lat: mapData.center[0], lng: mapData.center[1]},
            point = {lat: mapData.points[0], lng: mapData.points[1]};

        // init
        var contentString = '<div id="map__baloon">'+ mapData.address +'</div>';

        var map = new google.maps.Map( _mapFrame, {
            zoom: mapData.zoom,
            center: uluru,
            scrollwheel: false,
            draggable: true,
            zoomControl: false,
            mapTypeControl: false,
            scaleControl: false,
            streetViewControl: false,
            rotateControl: false,
            fullscreenControl: false
        } );

        var infowindow = new google.maps.InfoWindow( {
            content: contentString
        } );

        var marker = new google.maps.Marker( {
            position: point,
            map: map
        } );

        var styles = {
            default: null,
            silver: [
                {
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#f5f5f5"
                        }
                    ]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#616161"
                        }
                    ]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "color": "#f5f5f5"
                        }
                    ]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#bdbdbd"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#eeeeee"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#757575"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e5e5e5"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#9e9e9e"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#757575"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#dadada"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#616161"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#9e9e9e"
                        }
                    ]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#e5e5e5"
                        }
                    ]
                },
                {
                    "featureType": "transit.station",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#eeeeee"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#c9c9c9"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#9e9e9e"
                        }
                    ]
                }
            ]
        };

        map.setOptions( {styles: styles[ 'silver' ] } );

        // OnEvent
        infowindow.open( map, marker );

        var baloon = document.getElementById( 'map__baloon' );

        var findBaloon = setInterval( function() {
            if ( baloon === undefined || baloon === null ){
                baloon = document.getElementById( 'map__baloon' )
            } else {
               clearInterval( findBaloon );

               baloon.parentElement.parentElement.parentElement.parentElement.classList.add( 'map__baloon-custom' );

            }
        }, 300 );

    }

    function Preloader () {

        var _preloader = document.querySelector( '.preload' );

        // OnEvents
        window.addEventListener( 'load', ShowSite );

        // Functions
        function ShowSite () {

            _preloader.classList.add( 'preload_loaded' );

            _preloader.addEventListener( 'transitionend', function( e ) {
                ( e.propertyName === 'opacity' ) && _preloader.remove();
            } );

        }

    }

    function Site () {

        var documentHeight = document.documentElement.clientHeight,
            aboutHero, appointmentOnly, heroPricing, heroBlog, start,
            heroMedia, heroContactUs, aboutPlace, facility, heroStrength, offersHero,
            heroPilates, ourStudio, heroNutrition, healthyMetabolism, nutritionPrograms;

        // OnEvents
        window.addEventListener( 'scroll', moveElementsOnScroll );

        // Functions
        function moveElementsOnScroll () {

            var documentTop = document.documentElement.scrollTop;

            if ( aboutHero = document.querySelector( '.hero__background img' ) ){

                aboutHero.style.transform = 'translateY('+ documentTop * .4 +'px )';

            }

            if ( offersHero = document.querySelector( '.hero-offers__background img' ) ){

                offersHero.style.transform = 'translateY('+ documentTop * .4 +'px )';

            }

            if ( appointmentOnly = document.querySelector( '.appointment-only__background' ) ){

                var appointmentOnlyImg = appointmentOnly.querySelector( 'img' );

                if ( appointmentOnly.getBoundingClientRect().top <= documentHeight ) {
                    appointmentOnlyImg.style.transform = 'translateY('+ ( documentTop * appointmentOnly.getBoundingClientRect().top / 10000 * -1 ) +'px )';
                }

            }

            if ( start = document.querySelector( '.start__background' ) ){

                var startImg = start.querySelector( 'img' );

                if ( start.getBoundingClientRect().top <= documentHeight ) {
                    startImg.style.transform = 'translateY('+ ( documentTop * start.getBoundingClientRect().top / 10000 * -1 ) +'px )';
                }

            }

            if ( heroPricing = document.querySelector( '.hero-pricing__background img' ) ){

                heroPricing.style.transform = 'translateY('+ documentTop * .2 +'px )';

            }

            if ( heroBlog = document.querySelector( '.hero-inside__background img' ) ){

                heroBlog.style.transform = 'translateY('+ documentTop * .2 +'px )';

            }

            if ( heroStrength = document.querySelector( '.hero-strength__background img' ) ){

                heroStrength.style.transform = 'translateY('+ documentTop * .2 +'px )';

            }

            if ( heroPilates = document.querySelector( '.hero-pilates__background img' ) ){

                heroPilates.style.transform = 'translateY('+ documentTop * .1 +'px )';

            }

            if ( heroNutrition = document.querySelector( '.hero-nutrition__background img' ) ){

                heroNutrition.style.transform = 'translateY('+ documentTop * .2 +'px )';

            }

            if ( heroMedia = document.querySelector( '.hero-media__background img' ) ){

                heroMedia.style.transform = 'translateY('+ documentTop * .4 +'px )';

            }

            if ( aboutPlace = document.querySelector( '.about-place__background' ) ){

                var aboutPlaceImg = aboutPlace.querySelector( 'img' );

                if ( aboutPlace.getBoundingClientRect().top <= documentHeight ) {
                    aboutPlaceImg.style.transform = 'translateY('+ ( documentTop * aboutPlace.getBoundingClientRect().top / 10000 * -1 ) +'px )';
                }

            }

            if ( facility = document.querySelector( '.facility__background' ) ){

                var facilityImg = facility.querySelector( 'img' );

                if ( facility.getBoundingClientRect().top <= documentHeight ) {
                    facilityImg.style.transform = 'translateY('+ ( documentTop * facility.getBoundingClientRect().top / 10000 * -1 ) +'px )';
                }

            }

            if ( ourStudio = document.querySelector( '.our-studio__background' ) ){

                var ourStudioImg = ourStudio.querySelector( 'img' );

                if ( ourStudio.getBoundingClientRect().top <= documentHeight ) {
                    ourStudioImg.style.transform = 'translateY('+ ( documentTop * ourStudio.getBoundingClientRect().top / 10000 * -1 ) +'px )';
                }

            }

            if ( heroContactUs = document.querySelector( '.contact-us__background img' ) ){

                heroContactUs.style.transform = 'translateY('+ documentTop * .1 +'px )';

            }

            if ( healthyMetabolism = document.querySelector( '.healthy-metabolism__background ' ) ){

                var healthyMetabolismImg = healthyMetabolism.querySelector( 'img' );

                if ( healthyMetabolism.getBoundingClientRect().top <= documentHeight ) {
                    healthyMetabolismImg.style.transform = 'translateY('+ ( documentTop * healthyMetabolism.getBoundingClientRect().top / 10000 * -.6 ) +'px )';
                }

            }

            if ( nutritionPrograms = document.querySelector( '.nutrition-programs' ) ){

                var nutritionProgramsImg = nutritionPrograms.querySelector( 'img' );

                if ( nutritionPrograms.getBoundingClientRect().top <= documentHeight ) {
                    nutritionProgramsImg.style.transform = 'translateY('+ ( documentTop * nutritionPrograms.getBoundingClientRect().top / 10000 * -1 ) +'px )';
                }

            }

        }

        // init

    }

} )();