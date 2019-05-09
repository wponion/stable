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

namespace WPO\Fields;

if ( ! class_exists( 'WPO\Fields\Divider' ) ) {
	/**
	 * Class Divider
	 *
	 * @package WPO\Fields
	 * @author Varun Sridharan <varunsridharan23@gmail.com>
	 * @since 1.0
	 */
	class Divider extends \WPO\Field {
		/**
		 * Divider constructor.
		 *
		 * @param $text
		 */
		public function __construct( $text ) {
			parent::__construct( 'divider', false, false, array(
				'text' => $text,
			) );
		}

		/**
		 * @param $text
		 *
		 * @return $this
		 */
		public function text( $text ) {
			$this['text'] = $text;
			return $this;
		}
	}
}
