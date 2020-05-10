<?php

namespace WPOnion\Traits\Internal;

defined( 'ABSPATH' ) || exit;

if ( ! trait_exists( '\WPOnion\Traits\Internal\Fields_Handler' ) ) {
	/**
	 * Trait Fields
	 *
	 * @package WPOnion\Traits\Internal
	 * @author Varun Sridharan <varunsridharan23@gmail.com>
	 * @since {NEWVERSION}
	 */
	trait Fields_Handler {
		/**
		 * Raw options
		 *
		 * @var array
		 */
		protected $raw_fields = array();

		/**
		 * Fields
		 *
		 * @var string|array|\WPO\Builder
		 */
		protected $fields = array();

		/**
		 * Returns Fields.
		 *
		 * @return array|\WPO\Builder
		 */
		public function fields() {
			return $this->fields;
		}

		/**
		 * Handles Field's Default Value For Each Module.
		 */
		protected function get_defaults() {
			/**
			 * @var $options \WPO\Container
			 */
			foreach ( $this->fields->get() as $options ) {
				if ( $this->valid_field( $options ) ) {
					$this->get_fields_defaults_value( $options );
				} elseif ( false !== $this->valid_option( $options ) ) {
					if ( $options->has_fields() ) {
						foreach ( $options->fields() as $field ) {
							$this->get_fields_defaults_value( $field );
						}
					} elseif ( $options->has_containers() ) {
						foreach ( $options->containers() as $containers ) {
							/* @var $containers \WPO\Container */
							if ( ! $containers->has_fields() ) {
								continue;
							}
							if ( false !== $this->valid_option( $containers ) ) {
								foreach ( $containers->fields() as $field ) {
									$this->get_fields_defaults_value( $field );
								}
							}
						}
					}
				}
			}
		}

	}
}