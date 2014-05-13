[].slice.call( document.querySelectorAll( 'button.progress-button' ) ).forEach( function( button ) {
    new ProgressButton( button, {
        callback : function( instance ) {
            var progress = 0,
                interval = setInterval( function() {
                    progress += 0.5;
                    instance._setProgress( progress );

                    if( progress >= 1 ) {
                        instance._stop(1);
                        clearInterval( interval );
                    }
                }, 200 );
        }
    } );
} );
