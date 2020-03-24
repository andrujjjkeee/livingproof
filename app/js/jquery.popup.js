$( function() {

    $( '.popup' ).each(function(){
        new Popup($(this));
    } );

} );

var Popup = function( obj ){
    //private properties
    var _self = this,
        _btnShow =  $( '.popup__open' ),
        _obj = obj,
        _popupWrap = _obj.find( '.popup__wrap' ),
        _popupContents = _obj.find( '.popup__content' ),
        _btnClose = _obj.find( '.popup__close, .popup__cancel' ),
        _siteHeader = $( '.site__header-layout' ),
        _videoFile, _textFrame,
        _scrollConteiner = $( 'html' ),
        _body = $( 'body' ),
        _site = _body.find( '.site' ),
        _url = _obj.data( 'action' ),
        _position = 0,
        _window = $( window ),
        _request = new XMLHttpRequest();

    //private methods
    var _getScrollWidth = function (){
            var scrollDiv = document.createElement( 'div'),
                scrollBarWidth;

            scrollDiv.className = 'popup__scrollbar-measure';

            document.body.appendChild( scrollDiv );

            scrollBarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth;

            document.body.removeChild(scrollDiv);

            return scrollBarWidth;

        },
        _hidePopup = function(){

            _obj.addClass( 'is-hide' ).removeClass( 'is-opened' );

            _obj.on( 'webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function() {

                _scrollConteiner.removeAttr( 'style' );
                _body.removeAttr( 'style' );
                _site.removeAttr( 'style' );
                _siteHeader.removeAttr( 'style' );
                _obj.removeAttr( 'style' );

                _window.scrollTop( _position );
                _position = 0;

                _obj.removeClass( 'is-hide' );

                if ( _videoFile != null ) {
                    _videoFile.remove();
                    _videoFile = null;
                }

                if ( _textFrame != null ) {
                    _request.abort();
                    _textFrame.empty();
                    _textFrame = null;
                }

                _obj.addClass( 'is-loading' );

                _obj.off( 'webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend' );

            } );

        },
        _onEvents = function(){

            _obj.on( 'click', function ( e ) {

                if ( $( e.target ).closest( _popupContents ).length === 0 ){
                    _hidePopup();
                }

            } );

            _btnShow.on( 'click', function() {

                var curBtn = $( this );

                _showPopup( curBtn );
                return false;
            } );

            _btnClose.on( 'click', function(){
                _hidePopup();
                return false;
            } );

        },
        _showPopup = function( btn ){

            _setPopupContent( btn );

            if ( _window.scrollTop() !== 0 ){
                _position = _window.scrollTop();
            }

            _scrollConteiner.css( {
                overflowY: 'hidden',
                paddingRight: _getScrollWidth()
            } );

            _body.css( 'overflow-y', 'hidden' );

            _site.css( {
                'position': 'relative',
                'top': _position * -1
            } );

            if ( _popupWrap.outerHeight() <= _window.outerHeight() ) {
                _obj.css( {
                    paddingRight: _getScrollWidth()
                } );
            }

            _obj.addClass( 'is-opened' );

        },
        _setPopupContent = function( btn ){

            var curBtn = btn,
                className = curBtn.data( 'popup' ),
                curContent = _popupContents.filter( '.popup_' + className );

            _popupContents.css( { display: 'none' } );
            curContent.css( { display: 'block' } );

            if ( className === 'biography' ) { _setAJAXRequest( curBtn.data( 'id' ) ) }
            if ( className === 'video' ) { _setVideoFile( curBtn.data( 'video' ), curContent ) }
            if ( className === 'schedule' ) { _setScheduleService( curBtn.data( 'service' ) ) }
            if ( className === 'schedule-frame' ) { _setScheduleFrame( curContent ) }
            if ( className === 'success-newsletter' || className === 'success' ) { _obj.removeClass( 'is-loading' ) }

        },
        _setVideoFile = function ( id, obj ) {

            var curContent = obj;

            curContent.append( '<iframe src="https://www.youtube.com/embed/'+ id +'?rel=0&amp;showinfo=0&amp;autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>' );

            _videoFile = curContent.find( 'iframe' );

            _videoFile.on( 'load', function () {
                _setVideoSize();
                _obj.removeClass( 'is-loading' );
            } );

            _window.on( 'resize', function () {
                _setVideoSize();
            } );

        },
        _setVideoSize = function () {

            var videoWidth = _videoFile.outerWidth();

            _videoFile.css( 'height', videoWidth / 1.7777 + 'px' );

        },
        _setAJAXRequest = function ( id ) {

            _request = $.ajax( {
                url: _url,
                data: {
                    action: 'person_bio',
                    loadPostId: id
                },
                dataType: 'JSON',
                timeout: 20000,
                type: 'POST',
                success: function ( data ) {
                    _setTextPopup( data, id );
                },
                error: function ( XMLHttpRequest ) {
                    if ( XMLHttpRequest.statusText != "abort" ) {
                        console.error( 'err' );
                    }
                }
            } );

        },
        _setTextPopup = function ( data, id ) {

            var title = data.title,
                img = data.img,
                position = data.position,
                text = data.text;

            _textFrame = obj.find( '.popup__biography-content' );

            _textFrame.append( '<div class="popup__biography-photo"><img src="'+ img +'" alt="'+ title +'"/></div>' +
                '<div class="popup__biography-name">'+ title +'</div>' +
                '<div class="popup__biography-position">'+ position +'</div>' +
                '<div class="popup__biography-text">'+ text +'</div>' );

            if ( id === 183 ){
                _textFrame.append( '<a href="#" class="btn btn_1 popup__open" data-popup="schedule-frame"><span>SCHEDULE NOW</span></a>' );
            } else {
                _textFrame.append( '<a href="#" class="btn btn_1 popup__open" data-popup="schedule" data-service="'+ title +'"><span>SCHEDULE NOW</span></a>' );
            }

            var photo = _textFrame.find( 'img' ),
                scheduleBtn = _textFrame.find( '.popup__open' );

            photo.on( 'load', function () {
                _obj.removeClass( 'is-loading' );
            } );

            scheduleBtn.on( 'click', function () {
                _showPopup( scheduleBtn );
                return false;
            } );

        },
        _setScheduleService = function ( id ) {

            var serviceField = obj.find( '.service-field' );

            serviceField.val( id );

        },
        _setScheduleFrame = function ( obj ) {

            _obj.removeClass( 'is-loading' );

        },
        _construct = function(){

            _onEvents();
            _obj[ 0 ].obj = _self;

        };

    //public properties

    //public methods
    _self.openPopup = function ( obj,  val ) {

        var curBtn = obj,
            amountInput = val;

        _showPopup( curBtn, amountInput );

    };
    _self.closePopup = function () {
        _hidePopup();
    };

    _construct();

};