( function(){

    "use strict";

    $( function () {

        $.each( $( '.benefits__tabs' ), function() {
            new  Tabs( {
                obj: $( this ),
                optionType: 1
            } );
        } );

        $.each( $( '.facility__tabs' ), function() {
            new  Tabs( {
                obj: $( this ),
                optionType: 2
            } );
        } );

        $.each( $( '.js-resize-section' ), function () {
            new ProportionalElementsWidth( $(this) );
        } );

        $.each( $('.wpcf7'), function () {
            new ContactForm7Checker( $(this) );
        } );

        $.each( $( '.anchor' ), function() {
            new Anchor ( $( this ) );
        } );

        $.each( $( '.social-share' ), function() {
            new InitSocialShare( $( this ) );
        } );

        $.each( $( '.timer' ), function() {
            new OfferTimer( $( this ) );
        } );

        $.each( $( '.video-content iframe' ), function() {
            new SetSizeIframe ( $( this ) );
        } );

        $.each( $( '.review' ), function() {
            new InitReviewSlider ( $( this ) );
        } );

        new  MobileMenu( $( '#mobile-menu' )  );

    } );

    var Anchor = function ( obj ) {

        var _obj = obj,
            _body = $( 'html, body' );

        var _onEvents = function() {

                _obj.on( {
                    click: function() {

                        $( '#mobile-menu' )[0].obj.closeMenu();

                        var curBtn = $( this ),
                            curSection = $( curBtn.attr( 'href' ) ),
                            curMargin = curBtn.data( 'margin' );

                        if ( !curMargin ){
                            curMargin = 100
                        }

                        _body.animate( {
                            scrollTop: curSection.offset().top - curMargin
                        }, 600);

                        curSection.addClass( 'is-active' );

                        setTimeout( function () {
                            curSection.removeClass( 'is-active' );
                        }, 1200 );

                        return false;
                    }
                } );

            },
            _construct = function() {
                _onEvents();
            };

        _construct()
    };

    var ContactForm7Checker = function( obj ) {

        //private properties
        var _obj = obj,
            _preload = _obj.next( '.preload-wrap' ),
            _form = _obj.find( 'form' ),
            _btn = _obj.find( 'button' ),
            _popup = $( '.popup' );

        //private methods
        var _onEvent = function() {

                _form.on( 'submit', function () {
                    _showPreload();
                } );

                _obj.on( {
                    'wpcf7:invalid': function(){

                        var firstField = _obj.find( ' .wpcf7-not-valid' ).first();

                        $( 'html, body' ).animate( {
                            scrollTop: firstField.offset().top - 25
                        }, 600);

                        firstField.focus();

                        _hidePreload();
                    },
                    'wpcf7:spam': function(){
                        _hidePreload();
                    },
                    'wpcf7:mailsent': function(){
                        _showSuccessMessage();
                    },
                    'wpcf7:mailfailed': function(){
                        _hidePreload();
                    }
                } );

            },
            _showPreload = function () {

                _preload.addClass( 'is-show' );

            },
            _hidePreload = function () {

                _preload.removeClass( 'is-show' );

            },
            _showSuccessMessage = function () {

                _popup[0].obj.openPopup( _btn );

                _hidePreload();

                setTimeout( function () {
                    _popup[0].obj.closePopup();
                }, 5000 );

            },
            _construct = function() {
                _onEvent();
            };

        //public properties

        //public methods

        _construct();
    };

    var InitSocialShare = function ( obj ) {

        //private properties
        var socialWrap = obj,
            socialItem = socialWrap.find( '.social__item' ),
            socialData = socialItem.data( 'social' );

        //private methods
        var _initScroll = function () {

                socialItem.ShareLink( {
                    title: socialData[ 'title' ],
                    text: socialData[ 'text' ],
                    image: socialData[ 'image' ],
                    url: socialData[ 'url' ],
                    width: 640,
                    height: 480
                } );

            },
            _construct = function() {
                _initScroll();
            };

        //public properties

        //public methods

        _construct();

    };

    var InitReviewSlider = function( obj ) {

        //private properties
        var _obj = obj,
            _sliderWrap = _obj.find( '.review__wrap' ),
            _swiperSlider = _obj.find( '.review__swiper' ),
            _swiperSlide = _swiperSlider.find( '.review__item' ),
            _swiper = null,
            _isInitBtn = false,
            _window = $( window );

        //private methods
        var _onEvent = function() {

                _window.on( 'resize', function () {
                    _checkSlider();
                } );

            },
            _checkSlider = function () {

                var totalSlides = _swiperSlide.length;

                if ( _window.outerWidth() >= 1200 && totalSlides > 3 ) {

                    _initSlider( 3 );

                } else if ( _window.outerWidth() >= 992 && _window.outerWidth() < 1200 && totalSlides > 2 ) {

                    _initSlider( 2 );

                } else if ( _window.outerWidth() < 992 && totalSlides > 1 ) {

                    _initSlider( 1 );

                } else if ( _swiper !== null ) {
                    _swiper.destroy( true, true );
                    _swiper = null;

                    _sliderWrap.find( '.review__btn' ).remove();
                    _isInitBtn = false;

                }

            },
            _initSlider = function( int ) {

                var slidesPerView = int;

                if ( !_isInitBtn ){

                    var btnPrev = $( '<a href="#" class="review__btn review__btn-prev"><svg viewBox="0 0 51 51">' +
                        '<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-70.000000, -3864.000000)"><g transform="translate(71.000000, 3865.000000)">' +
                        '<path d="M27.6762355,32.763461 C28.1079215,33.1834291 28.1079215,33.8807345 27.6762355,34.3007026 C27.2525436,34.7285946 26.5490552,34.7285946 26.1253634,34.3007026 L17.3237645,25.5843841 C16.8920785,25.1564921 16.8920785,24.4671105 17.3237645,24.0392185 L26.1253634,15.3149761 C26.5490552,14.895008 27.2525436,14.895008 27.6762355,15.3149761 C28.1079215,15.7428681 28.1079215,16.4322496 27.6762355,16.8601416 L19.6580669,24.8078393 L27.6762355,32.763461 Z"></path>' +
                        '</g></g></g></svg></a>' ),
                        btnNext = $( ' <a href="#" class="review__btn review__btn-next"><svg viewBox="0 0 51 51">' +
                            '<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-1319.000000, -3864.000000)"><g transform="translate(1344.500000, 3889.500000) rotate(-180.000000) translate(-1344.500000, -3889.500000) translate(1320.000000, 3865.000000)">' +
                            '<path d="M27.6762355,32.763461 C28.1079215,33.1834291 28.1079215,33.8807345 27.6762355,34.3007026 C27.2525436,34.7285946 26.5490552,34.7285946 26.1253634,34.3007026 L17.3237645,25.5843841 C16.8920785,25.1564921 16.8920785,24.4671105 17.3237645,24.0392185 L26.1253634,15.3149761 C26.5490552,14.895008 27.2525436,14.895008 27.6762355,15.3149761 C28.1079215,15.7428681 28.1079215,16.4322496 27.6762355,16.8601416 L19.6580669,24.8078393 L27.6762355,32.763461 Z"></path>' +
                            '</g></g></g></svg></a>' );

                    _sliderWrap.append( btnPrev ).append( btnNext );

                    btnPrev = _sliderWrap.find( btnPrev );
                    btnNext = _sliderWrap.find( btnNext );

                    _isInitBtn = true;

                }

                _swiper = new Swiper( _swiperSlider, {
                    effect: 'slide',
                    autoplay: {
                        delay: 10000
                    },
                    speed: 500,
                    spaceBetween: 30,
                    autoHeight: true,
                    grabCursor: true,
                    loop: true,
                    slidesPerView: slidesPerView,
                    navigation: {
                        nextEl: btnNext,
                        prevEl: btnPrev
                    }
                } );

            },
            _construct = function() {
                _checkSlider();
                _onEvent();
            };

        //public properties

        //public methods

        _construct();
    };

    var MobileMenu = function( obj ) {

        //private properties
        var _self = this,
            _obj = obj,
            _mobileBtn = $( '#mobile-menu-btn' ),
            _html = $( 'html' ),
            _body = $( 'body' ),
            _site = _body.find( '.site' ),
            _window = $( window ),
            _position = 0;

        //private methods
        var _onEvent = function() {

                _mobileBtn.on( 'click', function () {

                    if ( $( this ).hasClass( 'is-active' ) ){
                        _hideMobileMenu();
                    } else {
                        _showMobileMenu();
                    }

                    return false;
                } );

            },
            _hideMobileMenu = function () {

                _mobileBtn.removeClass( 'is-active' );

                _obj.removeClass( 'is-show' );

                _html.css( 'overflow-y', 'visible' );
                _body.removeAttr( 'style' );
                _site.removeAttr( 'style' );

                _window.scrollTop( _position );

            },
            _showMobileMenu = function () {

                _mobileBtn.addClass( 'is-active' );

                _obj.addClass( 'is-show' );

                _position = _window.scrollTop();

                _html.css( 'overflow-y', 'hidden' );
                _body.css( 'overflow-y', 'hidden' );

                _site.css( {
                    'position': 'relative',
                    'top': _position * -1
                } );

            },
            _construct = function() {
                _onEvent();

                _obj[ 0 ].obj = _self;

            };

        //public properties
        _self.opened = false;

        //public methods
        _self.closeMenu = function(){
            _hideMobileMenu();
        };

        _construct();
    };

    var OfferTimer = function ( obj ) {

        //private properties
        var _obj = obj,
            // _callback = callback || function(){},
            _millisecondsInSecond = 1000,
            _millisecondsInMinute = _millisecondsInSecond * 60,
            _millisecondsInHour = _millisecondsInMinute * 60,
            _stopped = false,
            _timeOut, _lastMoment;

        //private methods
        var _onEvent = function () {

            },
            _setTimeOut = function () {

                var storageTimeOut = localStorage.getItem( 'offer-time' );

                if ( storageTimeOut !== null ) {

                    _lastMoment = storageTimeOut;


                } else {

                    _timeOut = _obj.data( 'time-out' );

                    var now = new Date();

                    _lastMoment = now.setHours( now.getHours() + _timeOut );

                    localStorage.setItem( 'offer-time', _lastMoment );

                }

                _loop();

            },
            _setTimer = function () {

                var difference = _lastMoment - new Date(),
                    hours, minutes, seconds;

                if( difference > 0 ){

                    hours =  Math.floor( difference / _millisecondsInHour );
                    minutes = Math.floor( ( difference - ( hours * _millisecondsInHour ) ) / _millisecondsInMinute );
                    seconds = Math.floor( ( difference - ( ( hours * _millisecondsInHour ) + ( minutes * _millisecondsInMinute ) ) ) / _millisecondsInSecond );

                    _setCalculation( hours, minutes, seconds );

                } else {
                    hours =  0;
                    minutes = 0;
                    seconds = 0;

                    _stopped = true;

                    window.location.replace( '/' );

                }

            },
            _loop = function(){

                _setTimer();

                if( !_stopped ) {
                    requestAnimationFrame( _loop );
                }

            },
            _setCalculation = function ( hours, minutes, seconds ) {

                if ( hours < 10 ){
                    hours = '0' + hours
                }

                if ( minutes < 10 ){
                    minutes = '0' + minutes
                }

                if ( seconds < 10 ){
                    seconds = '0' + seconds
                }

                _obj.text( hours +':'+ minutes +':'+ seconds );

            },
            _construct = function() {
                _onEvent();
                _setTimeOut();
            };

        //public properties

        //public methods

        _construct();

    };

    var ProportionalElementsWidth = function ( obj ) {

        //private properties
        var _obj = obj,
            _window = $( window );

        //private methods
        var _onEvent = function() {

                _window.on( 'resize', function () {
                    _proportionalElements();
                } );

            },
            _proportionalElements = function () {

                ( _window.outerWidth() >= 1200 ) && _obj.css( 'font-size', _window.outerWidth() * 100 / 1440 + 'px' )

            },
            _construct = function() {
                _onEvent();
                _proportionalElements();
            };

        //public properties

        //public methods

        _construct();

    };

    var SetSizeIframe = function (obj) {

        //private properties
        var _obj = obj,
            _window = $( window );

        //private methods
        var _onEvent = function() {

                _window.on( 'resize', function () {
                    _setSize();
                } );

            },
            _setSize = function () {

                var videoWidth = _obj.outerWidth();

                _obj.css( 'height', videoWidth / 1.7777 + 'px' );

            },
            _construct = function() {
                _onEvent();
                _setSize();
            };

        //public properties

        //public methods

        _construct();

    };

    var Tabs = function( params ) {

        //private properties
        var _obj = params.obj,
            _type = params.optionType || 1,
            _tabBtn = _obj.find( '.tabs__item' ),
            _tabWrap = _obj.find( 'dd' ),
            _window = $( window );

        //private methods
        var _onEvent = function() {

                _tabBtn.on( 'click', function () {

                    var curBtn = $( this ),
                        curBtnWrap = curBtn.parent( 'dl' ),
                        curBtnIndex = curBtnWrap.index();

                    _tabBtn.removeClass( 'active' );

                    _showTabWrap( curBtnIndex );

                    return false;
                } );

                _window.on( 'resize', function () {
                    _setContentHeight();
                } );

            },
            _showTabWrap = function ( num ) {

                var curTabIndex = num,
                    curTabBtn = _tabBtn.eq( curTabIndex ),
                    curTabWrap = curTabBtn.next( 'dd' );

                curTabBtn.addClass( 'active' );

                if ( _type === 2 ){
                    _obj.css( 'padding-bottom', curTabWrap.outerHeight() );
                }

            },
            _setContentHeight = function () {

                if ( _type === 1 ){

                    var heightsArr = [];

                    _tabWrap.each( function () {

                        heightsArr.push( $( this ).outerHeight() );

                    } );

                    var maxHeight = Math.max.apply(null, heightsArr );

                    _obj.css( 'padding-bottom', maxHeight );

                } else if ( _type === 2 ){

                    var activeContent = _tabBtn.filter( '.active' ).next( 'dd' );

                    _obj.css( 'padding-bottom', activeContent.outerHeight() );

                }

            },
            _construct = function() {
                _onEvent();
                _showTabWrap( 0 );

                if ( _type === 1 ){
                    _setContentHeight();
                }

            };

        //public properties

        //public methods

        _construct();
    };

} )();