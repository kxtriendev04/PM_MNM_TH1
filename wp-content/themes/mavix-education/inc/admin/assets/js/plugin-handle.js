/**
 * Get Started button on dashboard notice.
 *
 * @package Mavix Education
 */

jQuery(document).ready(function($) {
    var WpAjaxurl       = ogAdminObject.ajax_url;
    var _wpnonce        = ogAdminObject._wpnonce;
    var buttonStatus    = ogAdminObject.buttonStatus;

    /**
     * Popup on click demo import if creativ demo importer plugin is not activated.
     */
    if( buttonStatus === 'disable' ) $( '.mavix-education-demo-import' ).addClass( 'disabled' );

    switch( buttonStatus ) {
        case 'activate' :
            $( '.mavix-education-get-started' ).on( 'click', function() {
                var _this = $( this );
                mavix_education_do_plugin( 'mavix_education_activate_plugin', _this );
            });
            $( '.mavix-education-activate-demo-import-plugin' ).on( 'click', function() {
                var _this = $( this );
                mavix_education_do_plugin( 'mavix_education_activate_plugin', _this );
            });
            break;
        case 'install' :
            $( '.mavix-education-get-started' ).on( 'click', function() {
                var _this = $( this );
                mavix_education_do_plugin( 'mavix_education_install_plugin', _this );
            });
            $( '.mavix-education-install-demo-import-plugin' ).on( 'click', function() {
                var _this = $( this );
                mavix_education_do_plugin( 'mavix_education_install_plugin', _this );
            });
            break;
        case 'redirect' :
            $( '.mavix-education-get-started' ).on( 'click', function() {
                var _this = $( this );
                location.href = _this.data( 'redirect' );
            });
            break;
    }
    
    mavix_education_do_plugin = function ( ajax_action, _this ) {
        $.ajax({
            method : "POST",
            url : WpAjaxurl,
            data : ({
                'action' : ajax_action,
                '_wpnonce' : _wpnonce
            }),
            beforeSend: function() {
                var loadingTxt = _this.data( 'process' );
                _this.addClass( 'updating-message' ).text( loadingTxt );
            },
            success: function( response ) {
                if( response.success ) {
                    var loadedTxt = _this.data( 'done' );
                    _this.removeClass( 'updating-message' ).text( loadedTxt );
                }
                location.href = _this.data( 'redirect' );
            }
        });
    }

    $('.mt-action-btn').click(function(){
        var _this = $(this), actionBtnStatus = _this.data('status'), pluginSlug = _this.data('slug');
        console.log(actionBtnStatus);
        switch(actionBtnStatus){
            case 'install':
                mavix_education_do_free_plugin( 'mavix_education_install_free_plugin', pluginSlug, _this );
                break;

            case 'active':
                mavix_education_do_free_plugin( 'mavix_education_activate_free_plugin', pluginSlug, _this );
                break;
        }

    });

    mavix_education_do_free_plugin = function ( ajax_action, pluginSlug, _this ) {
        $.ajax({
            method : "POST",
            url : WpAjaxurl,
            data : ({
                'action' : ajax_action,
                'plugin_slug': pluginSlug,
                '_wpnonce' : _wpnonce
            }),
            beforeSend: function() {
                var loadingTxt = _this.data( 'process' );
                _this.addClass( 'updating-message' ).text( loadingTxt );
            },
            success: function( response ) {
                if( response.success ) {
                    var loadedTxt = _this.data( 'done' );
                    _this.removeClass( 'updating-message' ).text( loadedTxt );
                }
                location.href = _this.data( 'redirect' );
            }
        });
    }

});