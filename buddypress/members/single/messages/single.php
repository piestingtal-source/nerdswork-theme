<div id="message-thread">

	<?php

	/**
	 * Fires before the display of a single member message thread content.
	 *
	 */
	do_action( 'bp_before_message_thread_content' );
	?>

	<?php if ( bp_thread_has_messages() ) : ?>

		<h3 id="message-subject"><?php bp_the_thread_subject(); ?></h3>

		<p id="message-recipients" class="clearfix">
			<span class="highlight">

				<?php if ( bp_get_thread_recipients_count() <= 1 ) : ?>
					<?php _e( 'Du bist allein in diesem Gespräch.', 'social-portal' ); ?>
				<?php elseif ( bp_get_max_thread_recipients_to_list() <= bp_get_thread_recipients_count() ) : ?>
					<?php printf( __( 'Unterhaltung zwischen %s Teilnehmern.', 'social-portal' ), number_format_i18n( bp_get_thread_recipients_count() ) ); ?>
				<?php else : ?>
					<?php printf( __( 'Unterhaltung zwischen %s und dir.', 'social-portal' ), bp_get_thread_recipients_list() ); ?>
				<?php endif; ?>

			</span>

			<a class="message-delete-button confirm" href="<?php bp_the_thread_delete_link(); ?>" title="<?php esc_attr_e( "Konversation löschen", "social-portal" ); ?>"><i class="fa fa-trash"></i></a>
		</p>

		<?php

		/**
		 * Fires before the display of the message thread list.
		 *
		 */
		do_action( 'bp_before_message_thread_list' ); ?>

		<?php while ( bp_thread_messages() ) : bp_thread_the_message(); ?>

			<div class="message-box <?php bp_the_thread_message_css_class(); ?>">

				<div class="message-metadata">

					<?php

					/** This action is documented in bp-templates/bp-legacy/buddypress-functions.php */
					do_action( 'bp_before_message_meta' ); ?>

					<?php bp_the_thread_message_sender_avatar( 'type=thumb&width=50&height=50' ); ?>

					<?php if ( bp_get_the_thread_message_sender_link() ) : ?>
						<strong><a href="<?php bp_the_thread_message_sender_link(); ?>" title="<?php bp_the_thread_message_sender_name(); ?>"><?php bp_the_thread_message_sender_name(); ?></a></strong>
					<?php else : ?>
						<strong><?php bp_the_thread_message_sender_name(); ?></strong>
					<?php endif; ?>

					<span class="activity"><?php bp_the_thread_message_time_since(); ?></span>

					<?php if ( bp_is_active( 'messages', 'star' ) ) : ?>
						<div class="message-star-actions">
							<?php bp_the_message_star_action_link(); ?>
						</div>
					<?php endif; ?>

					<?php

					/** This action is documented in bp-templates/bp-legacy/buddypress-functions.php */
					do_action( 'bp_after_message_meta' ); ?>

				</div><!-- .message-metadata -->

				<?php

				/** This action is documented in bp-templates/bp-legacy/buddypress-functions.php */
				do_action( 'bp_before_message_content' ); ?>

				<div class="message-content">
					<?php bp_the_thread_message_content(); ?>
				</div><!-- .message-content -->

				<?php do_action( 'bp_after_message_content' ); ?>

				<div class="clear"></div>

			</div><!-- .message-box -->

		<?php endwhile; ?>

		<?php

		/**
		 * Fires after the display of the message thread list.
		 *
		 */
		do_action( 'bp_after_message_thread_list' );
		?>

		<?php

		/**
		 * Fires before the display of the message thread reply form.
		 *
		 */
		do_action( 'bp_before_message_thread_reply' );
		?>

		<form id="send-reply" action="<?php bp_messages_form_action(); ?>" method="post" class="standard-form">

			<div class="message-box">

				<div class="message-metadata">

					<?php

					/** This action is documented in bp-templates/bp-legacy/buddypress-functions.php */
					do_action( 'bp_before_message_meta' ); ?>

					<div class="avatar-box">
						<?php bp_loggedin_user_avatar( 'type=thumb&height=30&width=30' ); ?>
						<strong><?php _e( 'Sende eine Antwort', 'social-portal' ); ?></strong>
					</div>

					<?php do_action( 'bp_after_message_meta' ); ?>

				</div><!-- .message-metadata -->

				<div class="message-content">

					<?php

					/**
					 * Fires before the display of the message reply box.
					 *
					 */
					do_action( 'bp_before_message_reply_box' );
					?>

					<textarea name="content" id="message_content" rows="3" cols="40"></textarea>

					<?php

					/**
					 * Fires after the display of the message reply box.
					 *
					 */
					do_action( 'bp_after_message_reply_box' );
					?>

					<div class="submit">
						<input type="submit" name="send" value="<?php esc_attr_e( 'Antwort senden', 'social-portal' ); ?>" id="send_reply_button"/>
					</div>

					<input type="hidden" id="thread_id" name="thread_id" value="<?php bp_the_thread_id(); ?>" />
					<input type="hidden" id="messages_order" name="messages_order" value="<?php bp_thread_messages_order(); ?>" />
					<?php wp_nonce_field( 'messages_send_message', 'send_message_nonce' ); ?>

				</div><!-- .message-content -->

			</div><!-- .message-box -->

		</form><!-- #send-reply -->

		<?php

		/**
		 * Fires after the display of the message thread reply form.
		 *
		 */
		do_action( 'bp_after_message_thread_reply' );
		?>

	<?php endif; ?>

	<?php

	/**
	 * Fires after the display of a single member message thread content.
	 *
	 */
	do_action( 'bp_after_message_thread_content' );
	?>

</div>
