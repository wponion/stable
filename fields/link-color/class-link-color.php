<?php
/**
 *
 * Initial version created 28-05-2018 / 10:57 AM
 *
 * @author Varun Sridharan <varunsridharan23@gmail.com>
 * @version 1.0
 * @since 1.0
 * @package
 * @link
 * @copyright 2018 Varun Sridharan
 * @license GPLV3 Or Greater (https://www.gnu.org/licenses/gpl-3.0.txt)
 */

namespace WPOnion\Field;

use WPOnion\Field;

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( ! class_exists( '\WPOnion\Field\Link_Color' ) ) {
	/**
	 * Class Color_Picker
	 *
	 * @package WPOnion\Field
	 * @author Varun Sridharan <varunsridharan23@gmail.com>
	 * @since 1.0
	 */
	class Link_Color extends Color_Group {
		/**
		 * Returns Custom Field Group Class.
		 *
		 * @return string
		 */
		protected function field_wrap_class() {
			return ' wponion-element-color_group ';
		}

		/**
		 * Final HTML Output
		 */
		protected function output() {
			$options = array();

			foreach ( $this->get_options() as $key => $title ) {
				if ( false !== $this->data( $key ) ) {
					$options[ $key ] = ( true === $this->data( $key ) ) ? $title : $this->data( $key );
				}
			}

			$this->field['options'] = $options;
			echo parent::output();
		}

		protected function get_options() {
			return array(
				'color'   => __( 'Color' ),
				'hover'   => __( 'Hover' ),
				'active'  => __( 'Active' ),
				'visited' => __( 'Visited' ),
				'foucs'   => __( 'Focus' ),
			);
		}

		/**
		 * Returns all fields default.
		 *
		 * @return array|mixed
		 */
		protected function field_default() {
			return $this->parse_args( array( 'rgba' => false, 'options' => array() ), $this->get_options() );
		}
	}
}