<?php

/**
 * BuddyPress - Users Messages
 * User Profile-> Messages
 */

?>

<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
	<ul class="clearfix">
		<?php bp_get_options_nav(); ?>
	</ul>
</div><!-- .item-list-tabs -->

<?php
switch ( bp_current_action() ) :

	// Inbox/Sentbox
	case 'inbox'   :
	case 'sentbox' :

		/**
		 * Fires before the member messages content for inbox and sentbox.
		 *
		 */
		do_action( 'bp_before_member_messages_content' );
	?>

		<div class="messages">
			<?php bp_get_template_part( 'members/single/messages/messages-loop' ); ?>
		</div><!-- .messages -->

		<?php

		/**
		 * Fires after the member messages content for inbox and sentbox.
		 *
		 */
		do_action( 'bp_after_member_messages_content' );
		break;

	// Single Message View
	case 'view' :
		bp_get_template_part( 'members/single/messages/single' );
		break;

	// Compose
	case 'compose' :
		bp_get_template_part( 'members/single/messages/compose' );
		break;

	// Sitewide Notices
	case 'notices' :

		/**
		 * Fires before the member messages content for notices.
		 *
		 */
		do_action( 'bp_before_member_messages_content' );
		?>

		<div class="messages">
			<?php bp_get_template_part( 'members/single/messages/notices-loop' ); ?>
		</div><!-- .messages -->

		<?php

		/**
		 * Fires after the member messages content for inbox and sentbox.
		 *
		 */
		do_action( 'bp_after_member_messages_content' );
		break;

	// Any other
	default :
		bp_get_template_part( 'members/single/plugins' );
		break;
endswitch;
