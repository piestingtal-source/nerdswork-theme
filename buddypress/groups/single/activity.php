<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
	<ul>
		<li class="feed"><a href="<?php bp_group_activity_feed_link(); ?>" title="<?php esc_attr_e( 'RSS Feed', 'social-portal' ); ?>"><?php _e( 'RSS', 'social-portal' ); ?></a></li>

		<?php

		/**
		 * Fires inside the syndication options list, after the RSS option.
		 *
		 */
		do_action( 'bp_group_activity_syndication_options' );
		?>

		<li id="activity-filter-select" class="last">
			<label for="activity-filter-by"><?php _e( 'Zeige:', 'social-portal' ); ?></label>
			<select id="activity-filter-by">
				<option value="-1"><?php _e( '&mdash; Alles &mdash;', 'social-portal' ); ?></option>

				<?php bp_activity_show_filters( 'group' ); ?>

				<?php

				/**
				 * Fires inside the select input for group activity filter options.
				 *
				 */
				do_action( 'bp_group_activity_filter_options' );
				?>
			</select>
		</li>
	</ul>
</div><!-- .item-list-tabs -->

<?php

/**
 * Fires before the display of the group activity post form.
 *
 */
do_action( 'bp_before_group_activity_post_form' ); ?>

<?php if ( is_user_logged_in() && bp_group_is_member() ) : ?>

	<?php bp_get_template_part( 'activity/post-form' ); ?>

<?php endif; ?>

<?php

/**
 * Fires after the display of the group activity post form.
 *
 */
do_action( 'bp_after_group_activity_post_form' );
?>
<?php

/**
 * Fires before the display of the group activities list.
 *
 */
do_action( 'bp_before_group_activity_content' );
?>

<div class="activity single-group">

	<?php bp_get_template_part( 'activity/activity-loop' ); ?>

</div><!-- .activity.single-group -->

<?php

/**
 * Fires after the display of the group activities list.
 *
 */
do_action( 'bp_after_group_activity_content' );
?>
