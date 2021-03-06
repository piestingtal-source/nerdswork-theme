<?php
/**
 * BuddyPress - Users Plugins Template
 *
 * 3rd-party plugins should use this template to easily add template
 * support to their plugins for the members component.
 *
 */
?>
<?php
/**
 * Fires at the start of the member plugin template.
 *
 */
do_action( 'bp_before_member_plugin_template' );
?>

<?php if ( ! bp_is_current_component_core() ) : ?>

	<div class="item-list-tabs no-ajax" id="subnav">
		<ul>
			<?php bp_get_options_nav(); ?>

			<?php
			/**
			 * Fires inside the member plugin template nav <ul> tag.
			 *
			 */
			do_action( 'bp_member_plugin_options_nav' );
			?>
		</ul>
	</div><!-- .item-list-tabs -->

<?php endif; ?>

<h3><?php
	/**
	 * Fires inside the member plugin template <h3> tag.
	 *
	 */
	do_action( 'bp_template_title' );
	?></h3>

<?php
/**
 * Fires and displays the member plugin template content.
 *
 */
do_action( 'bp_template_content' );
?>

<?php
/**
 * Fires at the end of the member plugin template.
 *
 */
do_action( 'bp_after_member_plugin_template' );
