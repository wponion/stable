<?php
/**
 *
 * @author Varun Sridharan <varunsridharan23@gmail.com>
 * @version 1.0
 * @since 1.0
 * @link
 * @copyright 2019 Varun Sridharan
 * @license GPLV3 Or Greater (https://www.gnu.org/licenses/gpl-3.0.txt)
 */

namespace WPO;

if ( ! class_exists( 'WPO\Button_Set' ) ) {
	/**
	 * Class Button_Set
	 *
	 * @package WPO
	 * @author Varun Sridharan <varunsridharan23@gmail.com>
	 * @since 1.0
	 *
	 * @method multiple()
	 * @method get_size()
	 * @method get_active()
	 * @method get_inactive()
	 */
	class Button_Set extends Checkbox_Radio {
		/**
		 * @var string
		 * @access
		 */
		protected $type = 'button_set';

		/**
		 * @param $size
		 *
		 * @return $this
		 */
		public function size( $size ) {
			$this['size'] = $size;
			return $this;
		}

		/**
		 * @param string $active
		 *
		 * @return $this
		 */
		public function active( $active = 'button-primary' ) {
			$this['active'] = $active;
			return $this;
		}

		/**
		 * @param string $inactive
		 *
		 * @return $this
		 */
		public function inactive( $inactive = 'button-secondary' ) {
			$this['inactive'] = $inactive;
			return $this;
		}

		/**
		 * Sets To Small Size Button.
		 *
		 * @return \WPO\Button_Set
		 */
		public function large() {
			return $this->size( 'large' );
		}

		/**
		 * Sets To Small Size Button.
		 *
		 * @return \WPO\Button_Set
		 */
		public function small() {
			return $this->size( 'small' );
		}

		/**
		 * Sets To Normal Size Button.
		 *
		 * @return \WPO\Button_Set
		 */
		public function normal() {
			return $this->size( false );
		}
	}
}
