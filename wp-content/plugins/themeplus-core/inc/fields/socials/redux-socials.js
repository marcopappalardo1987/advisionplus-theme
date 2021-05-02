/*global redux_change, redux*/

(function( $ ) {
	'use strict';

	redux.field_objects        = redux.field_objects || {};
	redux.field_objects.socials = redux.field_objects.socials || {};

	redux.field_objects.socials.init = function( selector ) {
		selector = $.redux.getSelector( selector, 'socials' );

		$( selector ).each(
			function() {
				var el     = $( this );
				var parent = el;

				redux.field_objects.media.init( el );

				if ( ! el.hasClass( 'redux-field-container' ) ) {
					parent = el.parents( '.redux-field-container:first' );
				}

				if ( parent.is( ':hidden' ) ) {
					return;
				}

				if ( parent.hasClass( 'redux-container-socials' ) ) {
					parent.addClass( 'redux-field-init' );
				}

				if ( parent.hasClass( 'redux-field-init' ) ) {
					parent.removeClass( 'redux-field-init' );
				} else {
					return;
				}

				el.find( '.redux-socials-remove' ).on(
					'click',
					function() {
						var socialCount;
						var contentNewTitle;

						redux_change( $( this ) );

						$( this ).parent().siblings().find( 'input[type="text"]' ).val( '' );
						$( this ).parent().siblings().find( 'textarea' ).val( '' );
						$( this ).parent().siblings().find( 'input[type="hidden"]' ).val( '' );

						socialCount = $( this ).parents( '.redux-container-socials:first' ).find( '.redux-socials-accordion-group' ).length;

						if ( socialCount > 1 ) {
							$( this ).parents( '.redux-socials-accordion-group:first' ).socialUp(
								'medium',
								function() {
									$( this ).remove();
								}
							);
						} else {
							contentNewTitle = $( this ).parent( '.redux-socials-accordion' ).data( 'new-content-title' );

							$( this ).parents( '.redux-socials-accordion-group:first' ).find( '.remove-image' ).click();
							$( this ).parents( '.redux-container-socials:first' ).find( '.redux-socials-accordion-group:last' ).find( '.redux-socials-header' ).text( contentNewTitle );
						}
					}
				);

				el.find( '.redux-socials-add' ).off( 'click' ).click(
					function() {
						var contentNewTitle;

						var newsocial    = $( this ).prev().find( '.redux-socials-accordion-group:last' ).clone( true );
						var socialCount  = $( newsocial ).find( '.social-title' ).attr( 'name' ).match( /[0-9]+(?!.*[0-9])/ );
						var socialCount1 = socialCount * 1 + 1;

						$( newsocial ).find( 'input[type="text"], input[type="hidden"], textarea' ).each(
							function() {
								$( this ).attr( 'name', jQuery( this ).attr( 'name' ).replace( /[0-9]+(?!.*[0-9])/, socialCount1 ) ).attr( 'id', $( this ).attr( 'id' ).replace( /[0-9]+(?!.*[0-9])/, socialCount1 ) );

								$( this ).val( '' );

								if ( $( this ).hasClass( 'social-sort' ) ) {
									$( this ).val( socialCount1 );
								}
							}
						);

						contentNewTitle = $( this ).prev().data( 'new-content-title' );

						$( newsocial ).find( '.screenshot' ).removeAttr( 'style' );
						$( newsocial ).find( '.screenshot' ).addClass( 'hide' );
						$( newsocial ).find( '.screenshot a' ).attr( 'href', '' );
						$( newsocial ).find( '.remove-image' ).addClass( 'hide' );
						$( newsocial ).find( '.redux-socials-image' ).attr( 'src', '' ).removeAttr( 'id' );
						$( newsocial ).find( 'h3' ).text( '' ).append( '<span class="redux-socials-header">' + contentNewTitle + '</span><span class="ui-accordion-header-icon ui-icon ui-icon-plus"></span>' );
						$( this ).prev().append( newsocial );
					}
				);

				el.find( '.social-title' ).keyup(
					function( event ) {
						var newTitle = event.target.value;
						$( this ).parents().eq( 3 ).find( '.redux-socials-header' ).text( newTitle );
					}
				);

				el.find( '.redux-socials-accordion' ).accordion(
					{
						header: '> div > fieldset > h3',
						collapsible: true,
						active: false,
						heightStyle: 'content',
						icons: {
							'header': 'ui-icon-plus',
							'activeHeader': 'ui-icon-minus'
						}
					}
				).sortable(
					{
						axis: 'y',
						handle: 'h3',
						connectWith: '.redux-socials-accordion',
						start: function( e, ui ) {
							e = null;
							ui.placeholder.height( ui.item.height() );
							ui.placeholder.width( ui.item.width() );
						},
						placeholder: 'ui-state-highlight',
						stop: function( event, ui ) {
							var inputs;

							event = null;

							// IE doesn't register the blur when sorting
							// so trigger focusout handlers to remove .ui-state-focus.
							ui.item.children( 'h3' ).triggerHandler( 'focusout' );
							inputs = $( 'input.social-sort' );
							inputs.each(
								function( idx ) {
									$( this ).val( idx );
								}
							);
						}
					}
				);
			}
		);
	};
})( jQuery );
