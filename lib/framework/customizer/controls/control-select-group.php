<?php
//Do not allow direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit(0);
}

/**
 * Original Work of Justin Tadlock for Hybrid theme
 * Modified for SocialPortal( Mostly renamed classes )
 * 
 */

/**
 * The group select customize control extends the WP_Customize_Control class.  This class allows
 * developers to create a `<select>` form field with the `<optgroup>` elements mixed in.  They
 * can also utilize regular `<option>` choices.
 *
 * @author     Justin Tadlock <justin@justintadlock.com>
 * @copyright  Copyright (c) 2008 - 2015, Justin Tadlock
 * @link       http://themehybrid.com/hybrid-core
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * Multiple select customize control class.
 *
 * @since  1.0.0
 * @access public
 */
class CB_Customize_Control_Select_Group extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'select-group';

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'cb-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		$choices = $group = array();

		foreach ( $this->choices as $choice => $maybe_group ) {

			if ( is_array( $maybe_group ) )
				$group[ $choice ] = $maybe_group;
			else
				$choices[ $choice ] = $maybe_group;
		}

		$this->json['choices'] = $choices;
		$this->json['group']   = $group;
		$this->json['link']    = $this->get_link();
		$this->json['value']   = $this->value();
		$this->json['id']      = $this->id;
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( ! data.choices && ! data.group ) {
			return;
		} #>

		<label>

			<# if ( data.label ) { #>
				<span class="customize-control-title">{{ data.label }}</span>
			<# } #>

			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>

			<select {{{ data.link }}}>

				<# _.each( data.choices, function( label, choice ) { #>

					<option value="{{ choice }}" <# if ( choice === data.value ) { #> selected="selected" <# } #>>{{ label }}</option>

				<# } ) #>

				<# _.each( data.group, function( group ) { #>

					<optgroup label="{{ group.label }}">

						<# _.each( group.choices, function( label, choice ) { #>

							<option value="{{ choice }}" <# if ( choice === data.value ) { #> selected="selected" <# } #>>{{ label }}</option>

						<# } ) #>

					</optgroup>
				<# } ) #>
			</select>
		</label>
	<?php }
}
