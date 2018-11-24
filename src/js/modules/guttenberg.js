import $wponion from '../core/core';

class WPOnion_Guttenberg {
	constructor( $id = '', $args = {} ) {
		this.id   = $id;
		this.args = $wponion.js_func( $args );

		if( typeof this.args.save === 'undefined' ) {
			this.args.save = ( block ) => {
				return this.save_handler( block );
			};
		}

		if( typeof this.args.edit === 'undefined' ) {
			this.args.edit = ( block ) => {
				return this.edit_handler( block );
			};
		}

		window.wp.blocks.registerBlockType( this.id, this.args );
	}

	save_handler( block ) {
	}

	edit_handler( block ) {
		let el = wp.element.createElement;

		let $_postids            = JSON.stringify( parseInt( jQuery( 'input#post_ID' ).val() ) );
		block.attributes.post_id = $_postids;
		let block_id             = block.attributes.block_id = block.attributes.block_id || block.clientId;
		let $remote = el( 'form', {
			className: 'wponion-block-group-content',
			'data-block-id': block_id,
		}, [
			el( window.wp.components.ServerSideRender, {
				block: this.id,
				attributes: {
					post_id: $_postids,
					block_id: block_id,
				}
			} )
		] );


		let children = [];

		if( typeof this.args.style !== 'undefined' ) {
			if( this.args.style === 'default' ) {
				children.push( el( 'div', {
					className: 'acf-block-group-heading',
				}, [
					el( 'span', {
						className: 'dashicons dashicons-' + this.args.icon
					} ),
					' ',
					this.args.title,
				] ) );
			}
		}

		let selector = 'form[data-block-id="' + block_id + '"]';

		if( jQuery( selector ).length < 1 ) {

		}


		/*if( $( selector ).length < 1 ) {
			$( document ).on( 'acb_save_fields', function() {
				var tryUpdate = function() {
					if( block.isSelected || $( selector ).is( ':hover' ) ) {
						clearTimeout( block.updateTimeout );
						block.updateTimeout = setTimeout( tryUpdate, 500 );
						return;
					}

					block.setAttributes( {
						acf_fields: acf.serialize( $( selector ) )[ 'acf' ],
					} );
				};

				setTimeout( tryUpdate, 250 );
			} );
		}*/
		// setTimeout(function () {
		//   acf.do_action('ready', $('[data-block-id="' + block_id + '"]'));
		// }, 500);

		children.push( $remote );

		return el( 'div', { className: 'wponion-block-group-wrapper' }, children );

	}
}


export default ( ( window, document, $, wp ) => {
	$( function() {
		if( !window.wp || !window.wp.blocks || !window.wp.editor ) {
			return;
		}

		$( window ).on( 'load', () => {
			let $blocks     = window.wp.blocks;
			let $wpo_blocks = $wponion.windowArgs( 'wponion_guttenberg_blocks' );
			if( false === $wponion_helper.is_undefined( $wpo_blocks ) && $wponion_helper.is_array( $wpo_blocks ) ) {
				for( let $key in $wpo_blocks ) {
					new WPOnion_Guttenberg( $key, $wpo_blocks[ $key ] );
				}
			}
		} );
	} );
} )( window, document, jQuery, wp );
